<?php

namespace App\Services;

use App\Models\Ficha;
use App\Models\Institucion;
use App\Models\Lote;
use App\Models\TablaCodigo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Mpdf\Mpdf;
use setasign\Fpdi\PdfParser\StreamReader;

class RentasPdfService
{
    public function generar(Lote $lote, string $tipo, ?string $idFicha = null): string
    {
        $fichas = Ficha::where('id_lote', $lote->id_lote)
            ->whereRaw('TRIM(tipo_ficha) = ?', ['01'])->where('activo', '1')
            ->orderBy('id_uni_cat')->orderBy('nume_ficha')->orderBy('id_ficha');
        if ($idFicha !== null) {
            $fichas->where('id_ficha', $idFicha);
        }
        abort_unless((clone $fichas)->exists(), 404, 'El lote no tiene fichas individuales activas.');

        $pdf = $this->documento();
        if ($tipo === 'archivo-rentas') {
            $paginas = 0;
            foreach ($fichas->with('archivos')->lazy(25) as $ficha) {
                foreach ($ficha->archivos as $archivo) {
                    if (!filled($archivo->rentas)) {
                        continue;
                    }
                    $contenido = $this->leerArchivo($archivo->rentas);
                    try {
                        $cantidad = $pdf->setSourceFile(StreamReader::createByString($contenido));
                        for ($pagina = 1; $pagina <= $cantidad; $pagina++) {
                            $plantilla = $pdf->importPage($pagina);
                            $size = $pdf->getTemplateSize($plantilla);
                            $pdf->AddPageByArray([
                                'orientation' => $size['orientation'],
                                'sheet-size' => [min($size['width'], $size['height']), max($size['width'], $size['height'])],
                            ]);
                            $pdf->useTemplate($plantilla, 0, 0, $size['width'], $size['height']);
                            $paginas++;
                        }
                    } catch (\setasign\Fpdi\FpdiException $e) {
                        throw ValidationException::withMessages([
                            'pdf' => 'Un PDF de Rentas está dañado, protegido o tiene un formato incompatible.',
                        ]);
                    }
                }
            }
            abort_if($paginas === 0, 404, 'El lote no tiene archivos PDF de Rentas adjuntos.');
        } else {
            $cotitulares = $tipo === 'predio-urbano'
                ? $this->cotitularesPorUnidad($lote, (clone $fichas)->pluck('id_uni_cat')->all())
                : collect();
            $logos = Institucion::first();
            $catalogos = TablaCodigo::whereIn('id_tabla', ['CDP', 'MEP', 'ECS', 'ECC'])
                ->get()->keyBy(fn ($codigo) => trim($codigo->id_tabla).':'.trim($codigo->codigo));
            $descripcion = static fn ($tabla, $codigo) => $catalogos->get($tabla.':'.trim((string) $codigo))?->desc_codigo ?? '';
            $anio = (int) now('America/Lima')->format('Y');
            $primera = true;
            foreach ($fichas->with([
                'unicat', 'lote.hab_urbana', 'lote.manzana.sectore', 'fichaindividual.uso',
                'titulars.persona', 'titulars.condiciontitular', 'puertas.via',
                'construccions' => fn ($query) => $query->orderBy('nume_piso')->orderBy('codi_construccion'),
            ])->lazy(25) as $ficha) {
                if (!$primera) {
                    $pdf->AddPage();
                }
                $primera = false;
                $vista = $tipo === 'individual' ? 'pages.pdf.individual' : 'pages.pdf.predio-urbano-rentas';
                $titularesPu = $cotitulares->get($ficha->id_uni_cat, collect());
                if ($titularesPu->isEmpty()) {
                    $titularesPu = $ficha->titulars;
                }
                $pdf->WriteHTML(view($vista, compact('ficha', 'logos', 'descripcion', 'anio', 'titularesPu'))->render());
            }
        }

        return $pdf->Output('', 'S');
    }

    public function cotitularesPorUnidad(Lote $lote, array $unidades): Collection
    {
        return Ficha::where('id_lote', $lote->id_lote)
            ->whereIn('id_uni_cat', array_values(array_filter($unidades, fn ($id) => filled($id))))
            ->whereRaw('TRIM(tipo_ficha) = ?', ['02'])->where('activo', '1')
            ->with(['titulars' => fn ($query) => $query->reorder()->orderBy('nume_titular'),
                'titulars.persona', 'titulars.condiciontitular'])->orderBy('id_ficha')
            ->get(['id_ficha', 'id_uni_cat'])->groupBy('id_uni_cat')
            ->map(fn ($fichas) => $fichas->flatMap(fn ($ficha) => $ficha->titulars)->sortBy('nume_titular', SORT_NATURAL)->values());
    }

    private function documento(): Mpdf
    {
        return new Mpdf([
            'format' => 'A4', 'margin_left' => 10, 'margin_right' => 10,
            'margin_top' => 10, 'margin_bottom' => 10,
            'margin_header' => 10, 'margin_footer' => 10,
            'tempDir' => storage_path('app/mpdf-temp'),
        ]);
    }

    private function leerArchivo(string $nombre): string
    {
        if (basename(str_replace('\\', '/', $nombre)) !== $nombre || str_contains($nombre, "\0")) {
            throw ValidationException::withMessages(['pdf' => 'La referencia del archivo de Rentas no es válida.']);
        }

        $ruta = 'img/archivos/'.$nombre;
        $disco = Storage::disk();
        abort_unless($disco->exists($ruta), 404, 'Un archivo PDF de Rentas registrado no se encuentra disponible.');
        $contenido = $disco->get($ruta);
        if (!is_string($contenido) || !str_starts_with($contenido, '%PDF-')) {
            throw ValidationException::withMessages(['pdf' => 'Un archivo de Rentas registrado no es un PDF válido.']);
        }

        return $contenido;
    }
}
