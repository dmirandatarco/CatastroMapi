<?php

namespace App\Console\Commands;

use App\Services\FotoVisorService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PrepararFotosVisor extends Command
{
    protected $signature = 'visor:preparar-fotos {--aplicar : Crear los JPG; sin esta opción solo revisar} {--disco= : Disco de origen; por defecto el configurado}';
    protected $description = 'Genera fotos JPG por lote sin ubigeo, conservando los originales y la base de datos.';

    public function handle(FotoVisorService $fotos): int
    {
        if (!extension_loaded('gd')) {
            $this->error('Habilita la extensión GD de PHP para convertir las imágenes.');
            return self::FAILURE;
        }
        $ubigeo = (string) config('rentas.ubigeo_archivos', '081304');
        if (!preg_match('/^[0-9]{6}$/D', $ubigeo)) {
            $this->error('El ubigeo configurado debe tener seis dígitos.');
            return self::FAILURE;
        }
        $disco = $this->option('disco') ?: config('filesystems.default');
        if (!config('filesystems.disks.'.$disco)) {
            $this->error('El disco de origen no está configurado.');
            return self::FAILURE;
        }
        // Orden estable: primera ficha por código, y primera imagen que realmente pueda convertirse.
        $query = DB::table('tf_fichas as f')->join('tf_fichas_individuales as i', 'i.id_ficha', '=', 'f.id_ficha')
            ->where('f.id_lote', 'like', $ubigeo.'%')->whereRaw('TRIM(f.tipo_ficha) = ?', ['01'])
            ->where('f.activo', '1')->whereNotNull('i.imagen_lote')->where('i.imagen_lote', '<>', '')
            ->select('f.id_lote', 'f.id_ficha', 'i.imagen_lote')->orderBy('f.id_lote')->orderBy('f.id_ficha');
        if (!(clone $query)->exists()) {
            $this->error("No hay fotos de fichas individuales activas del ubigeo {$ubigeo}. Comprueba la base de datos y el disco; no se modificó nada.");
            return self::FAILURE;
        }
        $lock = fopen(storage_path('app/visor-fotos.lock'), 'c');
        if (!$lock || !flock($lock, LOCK_EX | LOCK_NB)) {
            if ($lock) { fclose($lock); }
            $this->error('Ya hay otra conversión en ejecución.');
            return self::FAILURE;
        }
        $reporte = storage_path('app/visor-fotos-'.now()->format('Ymd-His').'-'.bin2hex(random_bytes(3)).'.csv');
        $csv = fopen($reporte, 'x');
        if (!$csv) {
            flock($lock, LOCK_UN); fclose($lock);
            $this->error('No se pudo crear el reporte.');
            return self::FAILURE;
        }
        fputcsv($csv, ['lote', 'ficha', 'original', 'destino', 'estado', 'detalle']);
        $ultimo = null;
        $resuelto = false;
        $fallos = 0;
        $pendientes = 0;
        $creadas = 0;
        $existentes = 0;
        $destino = Storage::disk('public');
        try {
            foreach ($query->cursor() as $fila) {
                if ($ultimo !== $fila->id_lote) {
                    if ($ultimo !== null && !$resuelto) { $pendientes++; }
                    $ultimo = $fila->id_lote;
                    $resuelto = false;
                }
                if ($resuelto) { continue; }
                $ruta = 'img/imageneslotes/'.substr($fila->id_lote, 6).'.jpg';
                try {
                    if (!preg_match('/^[0-9]{14}$/D', $fila->id_lote)) {
                        throw new \RuntimeException('El código de lote no tiene 14 dígitos.');
                    }
                    if ($destino->exists($ruta)) {
                        if ($destino->size($ruta) > 25 * 1024 * 1024
                            || (@getimagesizefromstring($destino->get($ruta))['mime'] ?? '') !== 'image/jpeg') {
                            throw new \RuntimeException('El destino ya existe pero no es un JPEG válido de hasta 25 MB; se conserva para revisión.');
                        }
                        $estado = 'existente';
                        $existentes++;
                    } else {
                        $jpeg = $fotos->convertir($disco, trim($fila->imagen_lote));
                        $estado = 'preparada';
                        if ($this->option('aplicar')) {
                            $destino->makeDirectory('img/imageneslotes');
                            $temporal = tempnam(dirname($destino->path($ruta)), '.visor-');
                            if ($temporal === false) { throw new \RuntimeException('No se pudo crear el archivo temporal.'); }
                            try {
                                if (file_put_contents($temporal, $jpeg) !== strlen($jpeg)) {
                                    throw new \RuntimeException('No se pudo escribir el JPG completo.');
                                }
                                // Publicación sin sobrescribir: funciona en NTFS y en Linux.
                                if (!@link($temporal, $destino->path($ruta))) {
                                    throw new \RuntimeException('No se pudo publicar el JPG sin sobrescribir. Revisa permisos y soporte de enlaces del disco.');
                                }
                            } finally {
                                unlink($temporal);
                            }
                            $estado = 'creada';
                        }
                        $creadas++;
                    }
                    $resuelto = true;
                    fputcsv($csv, [$fila->id_lote, $fila->id_ficha, $fila->imagen_lote, $ruta, $estado, '']);
                } catch (\RuntimeException $error) {
                    $fallos++;
                    fputcsv($csv, [$fila->id_lote, $fila->id_ficha, $fila->imagen_lote, $ruta, 'omitida', $error->getMessage()]);
                }
            }
            if ($ultimo !== null && !$resuelto) { $pendientes++; }
        } finally {
            fclose($csv);
            flock($lock, LOCK_UN); fclose($lock);
        }
        $this->info(($this->option('aplicar') ? 'JPG creados: ' : 'JPG preparados (sin aplicar): ').$creadas);
        $this->line("Ya existentes: {$existentes}. Fotos omitidas: {$fallos}. Lotes pendientes: {$pendientes}.");
        $this->line('Reporte: '.$reporte);
        $this->line('Los originales y los registros de las fichas se conservan.');
        return $pendientes ? self::FAILURE : self::SUCCESS;
    }
}
