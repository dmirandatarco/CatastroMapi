<?php

namespace App\Services\Certificados;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;

class CertificadoPdf
{
    private const FILAS_POR_HOJA = 10;

    public function content(Model $certificado): string
    {
        $documento = $certificado->documento;
        abort_unless(($documento['version'] ?? null) === 1, 422);
        $tipo = $documento['tipo'];
        abort_unless(in_array($tipo, ['numeracion', 'catastral'], true), 422);
        $imagenes = [];
        foreach ($documento['imagenes'] as $key => $path) {
            abort_unless(preg_match('/^certificados\/[a-f0-9-]+\.(png|jpg)$/', $path), 422);
            abort_unless(Storage::disk('local')->exists($path), 404, 'No se encuentra una imagen archivada del certificado.');
            $imagenes[$key] = Storage::disk('local')->path($path);
        }
        $pdf = new Mpdf([
            'format' => 'A4', 'margin_left' => 18, 'margin_right' => 18,
            'margin_top' => 8, 'margin_bottom' => 33,
            'margin_footer' => 2, 'default_font' => 'arial',
            'tempDir' => storage_path('app/mpdf'),
        ]);
        $pdf->SetTitle(($tipo === 'numeracion' ? 'Certificado de numeración ' : 'Certificado catastral ').$certificado->numero_documento);
        $pie = $tipo === 'catastral' ? 'pie-catastral.jpg' : 'pie.png';
        $pdf->SetWatermarkImage(public_path('img/certificados/marca.png'), 0.45, [155, 155], [28, 66]);
        $pdf->watermarkImgBehind = true;
        $pdf->showWatermarkImage = true;
        $pdf->SetHTMLFooter('<img src="'.public_path('img/certificados/'.$pie).'" style="width:174mm;">');
        $filas = preg_split('/\r\n|\r|\n/', trim($documento['datos']['coordenadas'] ?? ''), -1, PREG_SPLIT_NO_EMPTY);
        $paginasCoordenadas = array_chunk($filas, self::FILAS_POR_HOJA) ?: [[]];
        $pdf->WriteHTML(view('pages.pdf.certificados.'.$tipo, [
            'datos' => $documento['datos'], 'imagenes' => $imagenes, 'tipo' => $tipo,
            'paginasCoordenadas' => $paginasCoordenadas,
        ])->render());
        return $pdf->Output('', 'S');
    }

    public function response(Model $certificado)
    {
        return response($this->content($certificado), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="certificado-'.$certificado->id.'.pdf"',
        ]);
    }
}
