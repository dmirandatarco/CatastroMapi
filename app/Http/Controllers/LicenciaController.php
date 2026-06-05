<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use App\Http\Requests\LicenciaRequest;
use App\Models\Institucion;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class LicenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:licenciaedificacion.index')->only('index');
        $this->middleware('can:licenciaedificacion.show')->only('show');
        $this->middleware('can:licenciaedificacion.create')->only('create', 'store');
        $this->middleware('can:licenciaedificacion.edit')->only('edit', 'update');
        $this->middleware('can:licenciaedificacion.destroy')->only('destroy');
        $this->middleware('can:licenciaedificacion.reporte')->only('reporte');
        $this->middleware('can:licenciaedificacion.pdf')->only('pdf');
    }

    public function index()
    {
        $hoy = Carbon::now('America/Lima');
        $licencias = Licencia::whereDate('fecha_emision', $hoy)->get();
        $i = 0;
        return view('pages.licencia.index', compact('licencias', 'i', 'hoy'));
    }

    public function reporte(Request $request)
    {
        $fechainicio = $request->buscarFechaInicio;
        $fechafin = $request->buscarFechaFin;
        $administrado = $request->buscarAdministrado;
        if ($fechainicio == "" && $fechafin == "" && $administrado == "") {
            $licencias = [];
        } else {
            $licencias = Licencia::when($fechainicio, function ($query) use ($fechainicio, $fechafin) {
                $query->whereDate('fecha_emision', '>=', $fechainicio)
                    ->whereDate('fecha_emision', '<=', $fechafin);
            })->where('administrado1', 'LIKE', '%' . $administrado . '%')->orWhere('administrado1', 'LIKE', '%' . $administrado . '%')->get();
        }
        $i = 0;
        $total = count($licencias);
        return view('pages.licencia.reporte', compact('licencias', 'i', 'fechainicio', 'fechafin', 'administrado', 'total'));
    }

    public function create()
    {
        return view('pages.licencia.create');
    }

    public function edit(Licencia $licencia)
    {
        return view('pages.licencia.edit', compact('licencia'));
    }

    public function show(Licencia $licencia)
    {
        return view('pages.licencia.show', compact('licencia'));
    }

    public function store(LicenciaRequest $request)
    {
        if ($request['propietario'] == "") {
            $request['propietario'] = 0;
        } else {
            $request['propietario'] = 1;
        }
        $mytime = Carbon::now('America/Lima');
        $request['fecha_emision'] = $mytime->toDateTimeString();
        $request['fecha_vencimiento'] = carbon::now()->addYear(3);
        $ingresos = Licencia::create($request->all());
        return redirect()->route('licenciaedificacion.index')
            ->with('success', 'Licencia Agregado Correctamente.');
    }

    public function update(LicenciaRequest $request, Licencia $licencia)
    {
        $request['fecha_emision'] = $licencia->fecha_emision;
        $request['fecha_vencimiento'] = $licencia->fecha_vencimiento;
        if ($request['propietario'] == "") {
            $request['propietario'] = 0;
        } else {
            $request['propietario'] = 1;
        }
        $licencia->update($request->all());
        return redirect()->route('licenciaedificacion.index')
            ->with('success', 'Licencia Editado Correctamente.');
    }

    public function destroy(Request $request)
    {
        $licencias = Licencia::findOrFail($request->id_licencia_2);
        if ($licencias->estado == "1") {
            $licencias->estado = '0';
            $licencias->save();
            return redirect()->back()->with('success', 'Licencia Eliminada Correctamente!');
        } else {
            $licencias->estado = '1';
            $licencias->save();
            return redirect()->back()->with('success', 'Licencia Eliminada Correctamente!');
        }
    }

    public function pdf(Licencia $licencia)
    {
        $mytime = Carbon::now('America/Lima');
        $fileName = 'licencia.pdf';
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
        $html = \View::make('pages.pdf.licenciaedificacion', compact('logos', 'fecha', 'hora', 'licencia'));
        $html = $html->render();
        $mpdf->setFooter('<div style="background-color: #4646A3;border: solid 1px #fff !important;color:#fff;margin:0;padding:0;line-height:14px;text-align: center">LA INFORMACION CONTENIDA EN EL PRESENTE NO GENERA NI RECONOCE DERECHOS DE PROPIEDAD</div><div style="border: solid 1px #fff !important;text-align: center; font-size:8px;">LA INFORMACION CONTENIDA EN EL PRESENTE NO GENERA NI RECONOCE DERECHOS DE PROPIEDAD</div><div style="border: solid 1px #fff !important;text-align: center; font-size:8px;">MEJORAMIENTO DEL SERVICIO DE INFORMACION PREDIAL URBANA DEL DISTRITO DE  PROVINCIA DE  - CUSCO</div>');
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }
}
