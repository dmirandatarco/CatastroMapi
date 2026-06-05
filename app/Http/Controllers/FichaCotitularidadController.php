<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institucion;
use App\Models\Uso;
use App\Models\Actividades;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Ficha;
use App\Models\UniCat;
use App\Models\Puerta;
use App\Models\Persona;
use App\Models\DomicilioTitular;
use App\Models\AutorizacionAnuncio;
use App\Models\FichaCotitularidad;
use App\Models\Lindero;
use App\Models\ServicioBasico;
use App\Models\Construccion;
use App\Models\Instalacion;
use App\Models\DocumentoAdjunto;
use App\Models\RegistroLegal;
use App\Models\Sunarp;
use App\Models\Litigante;
use App\Models\Lote;
use App\Models\Titular;
use App\Models\Edificaciones;
use App\Models\Via;
use App\Models\HabUrbana;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Redirect;


class FichaCotitularidadController extends Controller
{

    public function __construct()
    {

        $this->middleware('can:ficha.createcotitularidad')->only('createcotitularidad');
        $this->middleware('can:ficha.editcotitularidad')->only('editcotitularidad');
        $this->middleware('can:ficha.createcotitularidad')->only('fichacotitulariadadcreate');
        $this->middleware('can:ficha.indexcotitular')->only('indexcotitular');

        $this->middleware('can:ficha.destroycotitularidad')->only('destroycotitularidad');
    }







    public function createcotitularidad(Request $request)
    {
        $requ = \Validator::make($request->all(), [
            'cantidad_cotitutal' => 'required|min:2|numeric',
        ]);
        if ($requ->fails()) {
            return Redirect::back()->with('error_code', 5)->withErrors($requ->errors())->withInput();
        }

        $fichaanterior = Ficha::where('id_ficha', $request->fichaanterior)->first();
        $total = $request->cantidad_cotitutal;
        return view('pages.fichas.createcotitularidad', compact('fichaanterior', 'total'));
    }

    public function editcotitularidad(Request $request)
    {


        $fichaanterior = Ficha::where('id_ficha', $request->fichaanterior)->first();
        $total = $request->cantidad_cotitutal;
        return view('pages.fichas.editcotitularidad', compact('fichaanterior', 'total'));
    }

    public function destroycotitularidad(Ficha $fichaanterior)
    {
        foreach ($fichaanterior->titulars as $titular) {



            if ($titular->exoneraciontitular != "") {
                $titular->exoneraciontitular->delete();
            }
            $titular->delete();
        }
        foreach ($fichaanterior->domiciliotitulares as $titular) {
            $titular->delete();
        }

        $fichaanterior->fichacotitular->delete();

        $fichaanterior->delete();

        return redirect()->back()->with('success', 'Ficha Eliminado Correctamente!');
    }


    public function fichacotitulariadadcreate(Ficha $ficha)
    {
        return view('pages.fichas.fichacotitulariadadcreate', compact('ficha'));
    }

    public function indexcotitular(Request $request)
    {
        $sectores = Sectore::orderby('codi_sector')->get();
        $manzanas = Manzana::orderby('codi_mzna')->get();

        $sector2 = $request->buscarSector;
        $manzana2 = $request->buscarManzana;
        if ($request->buscarFicha != "") {
            $ficha2 = str_pad($request->buscarFicha, 7, '0', STR_PAD_LEFT);
        } else {
            $ficha2 = $request->buscarFicha;
        }

        $ficha = Ficha::where('tipo_ficha', '=', '01');
        if ($request->buscarSector != '0') {
            $ficha = $ficha->whereHas('lote.manzana', function ($query) use ($sector2) {
                $query->where('id_sector', '=', $sector2);
            });
        }
        if ($request->buscarManzana != 0) {
            $ficha = $ficha->whereHas('lote', function ($query) use ($manzana2) {
                $query->where('id_mzna', '=', $manzana2);
            });
        }
        if ($request->buscarFicha != "") {
            $ficha = $ficha->where('nume_ficha', '=', $ficha2);
        }
        $ficha = $ficha->orderby('nume_ficha')->get();
        $total = 0;

        if ($request->buscarSector == '' && $request->buscarManzana == '' && $request->buscarFicha == '') {
            $ficha = [];
        }

        return view('pages.fichas.indexcotitular', compact('sectores', 'manzanas', 'ficha2', 'ficha', 'sector2', 'manzana2'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $ubigeo = Institucion::first();

            $mytime = Carbon::now('America/Lima');

            $date = $mytime->format('Y');
            $fichaanterior = Ficha::where('id_ficha', $request->fichaanterior)->first();

            if ($request->num_documento_declarante != '') {
                $buscarpersona = Persona::where('nume_doc', $request->num_documento_declarante)->where('tipo_funcion', 5)->first();
                if ($buscarpersona != "") {
                    $declarante = $buscarpersona;
                } else {
                    $declarante = new Persona();
                    $declarante->id_persona = $request->num_documento_declarante . '5102';
                    $declarante->nume_doc = $request->num_documento_declarante;
                    $declarante->tipo_doc = "02";
                    $declarante->tipo_persona = 1;
                    $declarante->nombres = strtoupper($request->nombres_declarante);
                    $declarante->ape_paterno = strtoupper($request->apellido_paterno_declarante);
                    $declarante->ape_materno = strtoupper($request->apellido_materno_declarante);
                    $declarante->tipo_persona_juridica = $request->tipo_persona_juridica;/*Vacio*/
                    $declarante->tipo_funcion = 5;
                    $declarante->save();
                }
            } else {
                $declarante = "";
            }

            $ficha = new Ficha();
            $ficha->id_ficha = $date . '' . str_pad($ubigeo->id_institucion, 6, '0', STR_PAD_LEFT) . '02' . str_pad($request->nume_ficha, 7, '0', STR_PAD_LEFT);
            $ficha->tipo_ficha = "02";
            $ficha->nume_ficha = str_pad($request->nume_ficha, 7, '0', STR_PAD_LEFT);
            $ficha->id_lote = $fichaanterior->id_lote;
            $ficha->dc = $fichaanterior->dc;
            $ficha->nume_ficha_lote = $request->nume_ficha_lote . '-' . $request->nume_ficha_lote2;
            if ($declarante == "") {
                $ficha->id_declarante = $request->num_documento_declarante;
            } else {
                $ficha->id_declarante = $declarante->id_persona;
            }
            $ficha->fecha_declarante = $request->fecha_declarante;
            $ficha->id_supervisor = $request->supervisor;
            $ficha->fecha_supervision = $request->fecha_supervision;
            $ficha->id_tecnico = $request->tecnico;
            $ficha->fecha_levantamiento = $request->fecha_levantamiento;
            $ficha->id_verificador = $request->verificador;
            $ficha->fecha_verificacion = $request->fecha_verificacion;
            $ficha->nume_registro = $request->nume_registro;
            $ficha->id_uni_cat = $fichaanterior->id_uni_cat;
            $ficha->id_usuario = \Auth::user()->id_usuario;
            $ficha->fecha_grabado = $mytime->toDateTimeString();
            $ficha->activo = 1;
            $ficha->save();

            $cont = 0;
            $personas = $request->nume_titular;
            while ($cont < count($personas)) {
                if ($request->tipo_persona[$cont] == 1) {
                    $persona = new Persona();
                    if ($request->nume_doc1[$cont] == "") {
                        $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                        $persona->id_persona = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT) . '11' . $request->tipo_doc1[$cont];
                        $persona->nume_doc = str_pad($cantidadpersona, 8, '0', STR_PAD_LEFT);
                    } else {
                        $perr = $request->nume_doc1[$cont];
                        $persona->id_persona = str_pad($perr, 8, '0', STR_PAD_LEFT) . '11' . $request->tipo_doc1[$cont];
                        $persona->nume_doc = str_pad($perr, 8, '0', STR_PAD_LEFT);
                    }
                    $persona->tipo_doc = $request->tipo_doc1[$cont];
                    $persona->tipo_persona = 1;
                    $persona->nombres = strtoupper($request->nombres1[$cont]);
                    $persona->ape_paterno = strtoupper($request->ape_paterno1[$cont]);
                    $persona->ape_materno = strtoupper($request->ape_materno1[$cont]);
                    $persona->tipo_funcion = 1;
                    $persona->save();

                    $titular = new Titular();
                    $titular->id_ficha = $ficha->id_ficha;
                    $titular->id_persona = $persona->id_persona;
                    $titular->form_adquisicion = $request->form_adquisicion[$cont];
                    $titular->fecha_adquisicion = $request->fecha_adquisicion[$cont];
                    $titular->porc_cotitular = $request->porc_cotitular[$cont];
                    $titular->fax = $request->faxconductor[$cont];
                    $titular->telf = $request->telefonoconductor[$cont];
                    $titular->anexo = $request->anexoconductor[$cont];
                    $titular->email = $request->emailconductor[$cont];
                    $titular->nume_titular = $cont + 1;
                    $titular->codi_contribuyente = $request->codi_contribuyente[$cont];
                    $titular->cond_titular = $request->cond_titular[$cont];
                    $titular->save();

                    $exoneracion = new ExoneracionTitular();
                    $exoneracion->if_ficha = $ficha->id_ficha;
                    $exoneracion->id_persona = $persona->id_persona;
                    $exoneracion->$request->condicion[$cont];
                    $exoneracion->$request->nume_resolucion[$cont];
                    $exoneracion->$request->nume_boleta_pension[$cont];
                    $exoneracion->$request->fecha_inicio[$cont];
                    $exoneracion->$request->fecha_vencimiento[$cont];
                    $exoneracion->save();

                    $domicilio = new DomicilioTitular();
                    $domicilio->id_ficha = $ficha->id_ficha;
                    $domicilio->id_persona = $persona->id_persona;
                    $domicilio->codi_via = $request->codigoviaconductor[$cont];
                    $domicilio->tipo_via = strtoupper($request->tipoviaconductor[$cont]);
                    $domicilio->nomb_via = strtoupper($request->nombreviaconductor[$cont]);
                    $domicilio->nume_muni = $request->nmunicipalconductor[$cont];
                    $domicilio->nomb_edificacion = strtoupper($request->nomb_edificacionconductor[$cont]);
                    $domicilio->nume_interior = $request->ninteriorconductor[$cont];
                    $domicilio->codi_hab_urba = $request->codigohurbanoconductor[$cont];
                    $domicilio->nomb_hab_urba = strtoupper($request->nombrehhurbanaconductor[$cont]);
                    $domicilio->sector = $request->zonaconductor[$cont];
                    $domicilio->mzna = $request->manzanaconductor[$cont];
                    $domicilio->lote = $request->loteconductor[$cont];
                    $domicilio->sublote = $request->subloteconductor[$cont];
                    $domicilio->codi_dep = $request->deparamentoconductor[$cont];
                    $domicilio->codi_pro = $request->provinciaconductor[$cont];
                    $domicilio->codi_dis = $request->distritoconductor[$cont];
                    $domicilio->save();
                }
                if ($request->tipo_persona[$cont] == 2) {
                    $persona = new Persona();
                    if ($request->nume_doc3[$cont] == "") {
                        $cantidadpersona = Persona::where('tipo_persona', 1)->count() + 1;
                        $persona->id_persona = str_pad($cantidadpersona, 11, '0', STR_PAD_LEFT) . '12' . $request->tipo_doc1[$cont];
                        $persona->nume_doc = str_pad($cantidadpersona, 11, '0', STR_PAD_LEFT);
                    } else {
                        $rruc = $request->nume_doc3[$cont];
                        $persona->id_persona = str_pad($rruc, 11, '0', STR_PAD_LEFT) . '12' . $request->tipo_doc1[$cont];
                        $persona->nume_doc = str_pad($rruc, 11, '0', STR_PAD_LEFT);
                    }
                    $persona->tipo_doc = $request->tipo_doc1[$cont];
                    $persona->tipo_persona = 2;
                    $persona->tipo_funcion = 1;
                    $persona->razon_social = $request->razon_social[$cont];
                    $persona->save();

                    $titular = new Titular();
                    $titular->id_ficha = $ficha->id_ficha;
                    $titular->id_persona = $persona->id_persona;
                    $titular->form_adquisicion = $request->form_adquisicion[$cont];
                    $titular->fecha_adquisicion = $request->fecha_adquisicion[$cont];
                    $titular->porc_cotitular = $request->porc_cotitular[$cont];
                    $titular->fax = $request->faxconductor[$cont];
                    $titular->telf = $request->telefonoconductor[$cont];
                    $titular->anexo = $request->anexoconductor[$cont];
                    $titular->email = $request->emailconductor[$cont];
                    $titular->nume_titular = $cont + 1;
                    $titular->codi_contribuyente = $request->codi_contribuyente[$cont];
                    $titular->cond_titular = $request->cond_titular[$cont];
                    $titular->save();

                    $exoneracion = new ExoneracionTitular();
                    $exoneracion->if_ficha = $ficha->id_ficha;
                    $exoneracion->id_persona = $persona->id_persona;
                    $exoneracion->$request->condicion[$cont];
                    $exoneracion->$request->nume_resolucion[$cont];
                    $exoneracion->$request->nume_boleta_pension[$cont];
                    $exoneracion->$request->fecha_inicio[$cont];
                    $exoneracion->$request->fecha_vencimiento[$cont];
                    $exoneracion->save();

                    $domicilio = new DomicilioTitular();
                    $domicilio->id_ficha = $ficha->id_ficha;
                    $domicilio->id_persona = $persona->id_persona;
                    $domicilio->codi_via = $request->codigoviaconductor[$cont];
                    $domicilio->tipo_via = strtoupper($request->tipoviaconductor[$cont]);
                    $domicilio->nomb_via = strtoupper($request->nombreviaconductor[$cont]);
                    $domicilio->nume_muni = $request->nmunicipalconductor[$cont];
                    $domicilio->nomb_edificacion = strtoupper($request->nomb_edificacionconductor[$cont]);
                    $domicilio->nume_interior = $request->ninteriorconductor[$cont];
                    $domicilio->codi_hab_urba = $request->codigohurbanoconductor[$cont];
                    $domicilio->nomb_hab_urba = strtoupper($request->nombrehhurbanaconductor[$cont]);
                    $domicilio->sector = $request->zonaconductor[$cont];
                    $domicilio->mzna = $request->manzanaconductor[$cont];
                    $domicilio->lote = $request->loteconductor[$cont];
                    $domicilio->sublote = $request->subloteconductor[$cont];
                    $domicilio->codi_dep = $request->deparamentoconductor[$cont];
                    $domicilio->codi_pro = $request->provinciaconductor[$cont];
                    $domicilio->codi_dis = $request->distritoconductor[$cont];
                    $domicilio->save();
                }
                $cont++;
            }

            $fichaecotitularidad = new FichaCotitularidad();
            $fichaecotitularidad->id_ficha = $ficha->id_ficha;
            $fichaecotitularidad->cond_declarante = $request->cond_declarante;
            $fichaecotitularidad->esta_llenado = $request->esta_llenado;
            $fichaecotitularidad->observaciones = $request->observacion;
            $fichaecotitularidad->nume_ficha = str_pad($request->nume_ficha, 7, '0', STR_PAD_LEFT);
            $fichaecotitularidad->save();


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }




        return redirect()->route('reporte.reportelista')
            ->with('success', 'Ficha Cotitularidad Agregado Correctamente.');
    }
}
