<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lote;
use App\Models\Ficha;
use Illuminate\Http\JsonResponse;
use App\Services\RentasPdfService;
use Illuminate\Http\Response;

class RentasPdfController extends Controller
{
    public function enlaces(Lote $lote): JsonResponse
    {
        $fichas = Ficha::where('id_lote', $lote->id_lote)
            ->whereRaw('TRIM(tipo_ficha) = ?', ['01'])->where('activo', '1')
            ->orderBy('id_uni_cat')->orderBy('nume_ficha')->orderBy('id_ficha')
            ->get(['id_ficha', 'id_uni_cat', 'nume_ficha']);

        return response()->json([
            'id_lote' => $lote->id_lote,
            'total' => $fichas->count(),
            'enlaces' => [
                'ficha_individual' => route('api.rentas.individual', ['lote' => $lote->id_lote]),
                'archivo_rentas' => route('api.rentas.archivo', ['lote' => $lote->id_lote]),
                'predio_urbano' => route('api.rentas.predio-urbano', ['lote' => $lote->id_lote]),
            ],
            'fichas' => $fichas->map(function ($ficha) use ($lote) {
                $enlaces = [];
                foreach (['ficha-individual', 'archivo-rentas', 'predio-urbano'] as $documento) {
                    $enlaces[str_replace('-', '_', $documento)] = route('api.rentas.ficha.pdf', [
                        'lote' => $lote->id_lote, 'ficha' => $ficha->id_ficha, 'documento' => $documento,
                    ]);
                }
                return [
                    'id_ficha' => $ficha->id_ficha,
                    'nume_ficha' => $ficha->nume_ficha,
                    'id_uni_cat' => $ficha->id_uni_cat,
                    'enlaces' => $enlaces,
                ];
            })->values(),
        ])->header('Cache-Control', 'private, no-store');
    }

    public function documentoFicha(Lote $lote, string $ficha, string $documento, RentasPdfService $pdf): Response
    {
        abort_unless(Ficha::where('id_lote', $lote->id_lote)->where('id_ficha', $ficha)
            ->whereRaw('TRIM(tipo_ficha) = ?', ['01'])->where('activo', '1')->exists(), 404);

        return $this->responder($lote, $pdf, $documento === 'ficha-individual' ? 'individual' : $documento, $ficha);
    }

    public function individual(Lote $lote, RentasPdfService $pdf): Response
    {
        return $this->responder($lote, $pdf, 'individual');
    }

    public function archivoRentas(Lote $lote, RentasPdfService $pdf): Response
    {
        return $this->responder($lote, $pdf, 'archivo-rentas');
    }

    public function predioUrbano(Lote $lote, RentasPdfService $pdf): Response
    {
        return $this->responder($lote, $pdf, 'predio-urbano');
    }

    private function responder(Lote $lote, RentasPdfService $pdf, string $tipo, ?string $ficha = null): Response
    {
        $nombre = $tipo.'-'.preg_replace('/[^a-zA-Z0-9_-]/', '_', $ficha ?? $lote->id_lote).'.pdf';

        $contenido = $ficha === null ? $pdf->generar($lote, $tipo) : $pdf->generar($lote, $tipo, $ficha);
        return response($contenido, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$nombre.'"',
            'Cache-Control' => 'private, no-store',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }
}
