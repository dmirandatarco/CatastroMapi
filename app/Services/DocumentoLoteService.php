<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class DocumentoLoteService
{
    public function nombreDisponible(string $idLote, string $campo): ?string
    {
        if (!in_array($campo, ['rentas', 'sunarp'], true)) {
            return null;
        }
        $id = trim($idLote);
        $nombres = [$id.'-'.$campo.'.pdf'];
        $ubigeo = (string) config('rentas.ubigeo_archivos', '081304');
        if (preg_match('/^[0-9]{14}$/D', $id) && strlen($ubigeo) === 6 && str_starts_with($id, $ubigeo)) {
            $nombres[] = substr($id, 6).'-'.$campo.'.pdf';
        }
        foreach ($nombres as $nombre) {
            if ($this->rutaDisponible($nombre) !== null) {
                return $nombre;
            }
        }
        return null;
    }

    public function rutaDisponible(?string $nombre): ?string
    {
        if (!filled($nombre) || str_contains($nombre, "\0")
            || in_array($nombre, ['.', '..'], true)
            || basename(str_replace('\\', '/', $nombre)) !== $nombre) {
            return null;
        }
        $ruta = 'img/archivos/'.$nombre;
        return Storage::disk()->fileExists($ruta) ? $ruta : null;
    }
}
