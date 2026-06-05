<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\CHojaInformativa;
use Carbon\Carbon;
use App\Models\Institucion;

class CHojaInformativaController extends Controller
{
    //
    public function generarHojaInformativa(Ficha $ficha){
        try{
            $mytime = Carbon::now('America/Lima');
            $fileName = $ficha->id_ficha . 'hojainformativa.pdf';
            $rutaPDF = storage_path('app/public/pdf/hojainformativa/');
            $rutaCompleta = $rutaPDF . $fileName;
            $mpdf = new \Mpdf\Mpdf([
                'format' => [210, 297],
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
                'margin_header' => 10,
                'margin_footer' => 10,
            ]);
            $logos = Institucion::first();
            $fecha = date("d/m/Y", strtotime($mytime));
            $hora = date("H:m:s", strtotime($mytime));
            $chojainformativa = new CHojaInformativa();
            $chojainformativa->id_ficha = $ficha->id_ficha;
            $chojainformativa->ubicacion = $rutaPDF;
            $chojainformativa->fecha_generacion = $fecha;
            $chojainformativa->save();
            $html = \View::make('pages.pdf.informativa', compact('ficha', 'logos', 'fecha', 'hora'));
            $html = $html->render();
            $mpdf->setFooter('<div style="background-color: #4646A3;border: solid 1px #fff !important;color:#fff;margin:0;padding:0;line-height:14px;text-align: center">LA INFORMACION CONTENIDA EN EL PRESENTE NO GENERA NI RECONOCE DERECHOS DE PROPIEDAD</div><div style="border: solid 1px #fff !important;text-align: center; font-size:8px;">LA INFORMACION CONTENIDA EN EL PRESENTE NO GENERA NI RECONOCE DERECHOS DE PROPIEDAD</div><div style="border: solid 1px #fff !important;text-align: center; font-size:8px;">MEJORAMIENTO DEL SERVICIO DE INFORMACION PREDIAL URBANA DEL DISTRITO DE  PROVINCIA DE  - CUSCO</div>');
            $mpdf->WriteHTML($html);
            $mpdf->Output($rutaCompleta, 'F');
            return $mpdf->Output($fileName, 'I');

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
