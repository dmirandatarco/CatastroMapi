<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ficha;
use App\Models\Lote;
use App\Models\Institucion;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;

class LoteEnlacesController extends Controller
{
    private const ARCHIVOS = ['rentas', 'sunarp', 'plano'];

    public function index(Lote $lote)
    {
        $fichas = Ficha::where('id_lote', $lote->id_lote)->where('activo', '1')
            ->whereIn(\DB::raw('TRIM(tipo_ficha)'), ['01', '02', '03'])
            ->whereNotNull('id_uni_cat')->whereRaw("TRIM(id_uni_cat) <> ''")
            ->with('archivos')->orderBy('id_uni_cat')->orderBy('id_ficha')
            ->get(['id_ficha', 'id_uni_cat', 'tipo_ficha']);
        $salida = [];
        $archivosLote = [];
        foreach (self::ARCHIVOS as $campo) {
            if ($this->nombreArchivoLote($lote, $campo) !== null) {
                $archivosLote[$campo] = route('api.rentas.lote.adjunto', ['lote' => $lote->id_lote, 'campo' => $campo]);
            }
        }
        foreach ($fichas->groupBy('id_uni_cat') as $unicat => $grupo) {
            // Solo una individual activa habilita una fila de la tabla.
            if (! $grupo->contains(fn ($ficha) => trim($ficha->tipo_ficha) === '01')) {
                continue;
            }
            $fila = ['unicat' => (string) $unicat, 'ficha_individual' => [], 'cotitulares' => [],
                'economicas' => [], 'archivos' => array_values($archivosLote), 'pu' => []];
            foreach ($grupo as $ficha) {
                $tipo = trim($ficha->tipo_ficha);
                $params = ['lote' => $lote->id_lote, 'ficha' => $ficha->id_ficha];
                if ($tipo === '01') {
                    $fila['ficha_individual'][] = route('api.rentas.ficha.pdf', $params + ['documento' => 'ficha-individual']);
                    $fila['pu'][] = route('api.rentas.ficha.pdf', $params + ['documento' => 'predio-urbano']);
                } else {
                    $fila[$tipo === '02' ? 'cotitulares' : 'economicas'][] = route('api.rentas.ficha.asociada', $params);
                }
                foreach ($ficha->archivos as $archivo) {
                    foreach (self::ARCHIVOS as $campo) {
                        if (!isset($archivosLote[$campo]) && $this->rutaArchivoDisponible($archivo->$campo) !== null) {
                            $fila['archivos'][] = route('api.rentas.ficha.adjunto', $params + ['archivo' => $archivo->id, 'campo' => $campo]);
                        }
                    }
                }
            }
            $salida[] = $fila;
        }
        return response()->json($salida)->header('Cache-Control', 'private, no-store');
    }

    public function ficha(Lote $lote, string $ficha)
    {
        $ficha = Ficha::where('id_lote', $lote->id_lote)->where('id_ficha', $ficha)->where('activo', '1')
            ->whereIn(\DB::raw('TRIM(tipo_ficha)'), ['02', '03'])->firstOrFail();
        $vista = trim($ficha->tipo_ficha) === '02' ? 'cotitularidad' : 'economica';
        $logos = Institucion::first();
        $pdf = new Mpdf(['format' => 'A4', 'margin_left' => 10, 'margin_right' => 10,
            'margin_top' => 10, 'margin_bottom' => 10, 'tempDir' => storage_path('app/mpdf-temp')]);
        $pdf->WriteHTML(view('pages.pdf.'.$vista, compact('ficha', 'logos'))->render());
        return response($pdf->Output('', 'S'), 200, [
            'Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="'.$vista.'.pdf"',
            'Cache-Control' => 'private, no-store', 'X-Content-Type-Options' => 'nosniff',
        ]);
    }

    public function archivo(Lote $lote, string $ficha, string $archivo, string $campo)
    {
        abort_unless(in_array($campo, self::ARCHIVOS, true), 404);
        $ficha = Ficha::where('id_lote', $lote->id_lote)->where('id_ficha', $ficha)->where('activo', '1')
            ->whereIn(\DB::raw('TRIM(tipo_ficha)'), ['01', '02', '03'])->firstOrFail();
        $registro = $ficha->archivos()->where('id', $archivo)->firstOrFail();
        $nombre = $registro->$campo;
        $ruta = $this->rutaArchivoDisponible($nombre);
        abort_if($ruta === null, 404, 'El archivo no se encuentra disponible.');
        return Storage::download($ruta, $nombre, ['Cache-Control' => 'private, no-store', 'X-Content-Type-Options' => 'nosniff']);
    }

    public function archivoLote(Lote $lote, string $campo)
    {
        abort_unless(in_array($campo, self::ARCHIVOS, true), 404);
        $nombre = $this->nombreArchivoLote($lote, $campo);
        $ruta = $this->rutaArchivoDisponible($nombre);
        abort_if($ruta === null, 404, 'El archivo no se encuentra disponible.');

        return Storage::download($ruta, $nombre, ['Cache-Control' => 'private, no-store', 'X-Content-Type-Options' => 'nosniff']);
    }

    private function nombreArchivoLote(Lote $lote, string $campo): ?string
    {
        return app(\App\Services\DocumentoLoteService::class)->nombreDisponible((string) $lote->id_lote, $campo);
    }

    private function rutaArchivoDisponible(?string $nombre): ?string
    {
        return app(\App\Services\DocumentoLoteService::class)->rutaDisponible($nombre);
    }
}