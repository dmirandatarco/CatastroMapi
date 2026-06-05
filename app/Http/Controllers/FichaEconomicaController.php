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
use App\Models\FichaEconomica;
use App\Models\Lindero;
use App\Models\ServicioBasico;
use App\Models\Construccion;
use App\Models\Instalacion;
use App\Models\DocumentoAdjunto;
use App\Models\RegistroLegal;
use App\Models\Sunarp;
use App\Models\Litigante;
use App\Models\Lote;
use App\Models\Conductor;
use App\Models\Edificaciones;
use App\Models\Via;
use App\Models\HabUrbana;
use Carbon\Carbon;
use DB;

class FichaEconomicaController extends Controller
{


    public function __construct()
    {

            $this->middleware('can:ficha.createeconomica') ->only('createeconomica');
            $this->middleware('can:ficha.indexeconomica') ->only('indexeconomica');
            $this->middleware('can:ficha.editeconomica') ->only('editeconomica');
            $this->middleware('can:ficha.destroyeconomica') ->only('destroyeconomica');
    }


    public function createeconomica(Ficha $fichaanterior)
    {
        $usos=Uso::all();
        $tecnicos=Persona::where('tipo_funcion',3)->get();
        $supervisores=Persona::where('tipo_funcion',2)->get();
        $verificadores=Persona::where('tipo_funcion',4)->get();
        return view('pages.fichas.createeconomica',compact('usos','tecnicos','supervisores','verificadores','fichaanterior'));
    }

    public function editeconomica(Request $request)
    {
        $fichaanterior=Ficha::where('id_ficha',$request->fichaanterior)->first();
        return view('pages.fichas.editeconomica',compact('fichaanterior'));
    }

    public function destroyeconomica(Ficha $fichaanterior)
    {

        if($fichaanterior?->conductor!=""){
            $fichaanterior?->conductor?->delete();
        }
        if($fichaanterior->domiciliotitulares!=""){
            foreach($fichaanterior->domiciliotitulares as $domicilio){
                $domicilio->delete();
            }
        }
        if($fichaanterior?->fichaeconomica!=""){
            $fichaanterior?->fichaeconomica?->delete();
        }
        foreach($fichaanterior?->autorizacion_anuncios as $autorizaciones){
            $autorizaciones?->delete();
        }
        foreach($fichaanterior?->actividades as $actividad){
            $actividad?->fichas()->detach($fichaanterior?->id_ficha);
        }
        $fechaanterior=$fichaanterior?->fecha_grabado;
        $usuario=$fichaanterior?->id_usuario;
        $fichaanterior?->delete();

        return redirect()->back()->with('success','Ficha Eliminado Correctamente!');
    }

    public function indexeconomica(Request $request)
    {
        $sectores=Sectore::orderby('codi_sector')->get();
        $manzanas=Manzana::orderby('codi_mzna')->get();

        $sector2=$request->buscarSector;
        $manzana2=$request->buscarManzana;
        if($request->buscarFicha!=""){
            $ficha2=str_pad($request->buscarFicha,7,'0',STR_PAD_LEFT);
        }else{
            $ficha2=$request->buscarFicha;
        }
        $ficha=Ficha::where('tipo_ficha','=','01');
        if($request->buscarSector!='0'){
            $ficha=$ficha->whereHas('lote.manzana', function($query) use ($sector2) {
                $query->where('id_sector','=', $sector2);
            });
        }
        if($request->buscarManzana!=0 ){
            $ficha=$ficha->whereHas('lote', function($query) use ($manzana2) {
                $query->where('id_mzna','=', $manzana2);
            });
        }
        if($request->buscarFicha!=""){
            $ficha=$ficha->where('nume_ficha','=',$ficha2);
        }
        $ficha=$ficha->get();
        $total=0;

        if($request->buscarSector==''&&$request->buscarManzana==''&&$request->buscarFicha=='')
        {
            $ficha=[];
        }

        return view('pages.fichas.indexeconomica',compact('sectores','manzanas','ficha2','ficha','sector2','manzana2'));
    }

    public function store(Request $request)
    {
        try
        {
            DB::beginTransaction();

            $ubigeo=Institucion::first();

            $mytime= Carbon::now('America/Lima');

            $date = $mytime->format('Y');
            $fichaanterior=Ficha::where('id_ficha',$request->fichaanterior)->first();

            if($request->num_documento_declarante!=''){
                $buscarpersona=Persona::where('nume_doc',$request->num_documento_declarante)->where('tipo_funcion',5)->first();
                if($buscarpersona!=""){
                    $declarante=$buscarpersona;
                }else{
                    $declarante= new Persona();
                    $declarante->id_persona=$request->num_documento_declarante.'5102';
                    $declarante->nume_doc=$request->num_documento_declarante;
                    $declarante->tipo_doc="02";
                    $declarante->tipo_persona=1;
                    $declarante->nombres=strtoupper($request->nombres_declarante);
                    $declarante->ape_paterno=strtoupper($request->apellido_paterno_declarante);
                    $declarante->ape_materno=strtoupper($request->apellido_materno_declarante);
                    $declarante->tipo_persona_juridica=$request->tipo_persona_juridica;/*Vacio*/
                    $declarante->tipo_funcion=5;
                    $declarante->save();
                }
            }else{
                $declarante="";
            }

            $ficha=new Ficha();
            $ficha->id_ficha=$date.''.str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT).'03'.str_pad($request->nume_ficha,7,'0',STR_PAD_LEFT);
            $ficha->tipo_ficha="03";
            $ficha->nume_ficha=str_pad($request->nume_ficha,7,'0',STR_PAD_LEFT);
            $ficha->id_lote=$fichaanterior->id_lote;
            $ficha->dc=$fichaanterior->dc;
            $ficha->nume_ficha_lote=$request->nume_ficha_lote.'-'.$request->nume_ficha_lote2;
            if($declarante==""){
                $ficha->id_declarante=$request->num_documento_declarante;
            }else{
                $ficha->id_declarante=$declarante->id_persona;
            }
            $ficha->fecha_declarante=$request->fecha_declarante;
            $ficha->id_supervisor=$request->supervisor;
            $ficha->fecha_supervision=$request->fecha_supervision;
            $ficha->id_tecnico=$request->tecnico;
            $ficha->fecha_levantamiento=$request->fecha_levantamiento;
            $ficha->id_verificador=$request->verificador;
            $ficha->fecha_verificacion=$request->fecha_verificacion;
            $ficha->nume_registro=$request->nume_registro;
            $ficha->id_uni_cat=$fichaanterior->id_uni_cat;
            $ficha->id_usuario=\Auth::user()->id_usuario;
            $ficha->fecha_grabado=$mytime->toDateTimeString();
            $ficha->activo=1;
            $ficha->save();

            $ficha->actividades()->sync($request->codi_actividad);


            $buscarpersona2=Persona::where('nume_doc',$request->nume_doc1)->where('tipo_funcion',7)->first();
            if($buscarpersona2!=""){
                $persona=$buscarpersona2;

                $conductor=new Conductor();
                $conductor->id_ficha=$ficha->id_ficha;
                $conductor->id_persona=$persona->id_persona;
                $conductor->fax=$request->faxconductor;
                $conductor->telefono=$request->telefonoconductor;
                $conductor->anexo=$request->anexoconductor;
                $conductor->email=$request->emailconductor;
                $conductor->cond_conductor=$request->cond_conductor;
                $conductor->nume_ruc=$request->nume_doc3;
                $conductor->save();

                $domicilio=new DomicilioTitular();
                $domicilio->id_ficha=$ficha->id_ficha;
                $domicilio->id_persona=$persona->id_persona;
                $domicilio->codi_via=$request->codigoviaconductor;
                $domicilio->tipo_via=strtoupper($request->tipoviaconductor);
                $domicilio->nomb_via=strtoupper($request->nombreviaconductor);
                $domicilio->nume_muni=$request->nmunicipalconductor;
                $domicilio->nomb_edificacion=strtoupper($request->nomb_edificacionconductor);
                $domicilio->nume_interior=$request->ninteriorconductor;
                $domicilio->codi_hab_urba=$request->codigohurbanoconductor;
                $domicilio->nomb_hab_urba=strtoupper($request->nombrehhurbanaconductor);
                $domicilio->sector=$request->zonaconductor;
                $domicilio->mzna=$request->manzanaconductor;
                $domicilio->lote=$request->loteconductor;
                $domicilio->sublote=$request->subloteconductor;
                $domicilio->codi_dep=$request->deparamentoconductor;
                $domicilio->codi_pro=$request->provinciaconductor;
                $domicilio->codi_dis=$request->distritoconductor;
                $domicilio->ubicacion=$request->ubicacionpersona;
                $domicilio->save();
            }else{
                $persona= new Persona();
                if($request->nume_doc1==""){
                    $cantidadpersona=Persona::where('tipo_persona',7)->count()+1;
                    $persona->id_persona=str_pad($cantidadpersona,8,'0',STR_PAD_LEFT).'71'.$request->tipo_doc1;
                    $persona->nume_doc=str_pad($cantidadpersona,8,'0',STR_PAD_LEFT);
                }else{
                    $persona->id_persona=str_pad($request->nume_doc1,8,'0',STR_PAD_LEFT).'71'.$request->tipo_doc1;
                    $persona->nume_doc=str_pad($request->nume_doc1,8,'0',STR_PAD_LEFT);
                }
                $persona->tipo_doc=$request->tipo_doc1;
                $persona->tipo_persona=1;
                $persona->nombres=strtoupper($request->nombres1);
                $persona->ape_paterno=strtoupper($request->ape_paterno1);
                $persona->ape_materno=strtoupper($request->ape_materno1);
                $persona->tipo_persona_juridica=$request->tipo_persona_juridica;
                $persona->tipo_funcion=7;
                $persona->razon_social=strtoupper($request->razon_social);
                $persona->save();

                $conductor=new Conductor();
                $conductor->id_ficha=$ficha->id_ficha;
                $conductor->id_persona=$persona->id_persona;
                $conductor->fax=$request->faxconductor;
                $conductor->telefono=$request->telefonoconductor;
                $conductor->anexo=$request->anexoconductor;
                $conductor->email=$request->emailconductor;
                $conductor->cond_conductor=$request->cond_conductor;
                $conductor->nume_ruc=$request->nume_doc3;
                $conductor->save();

                $domicilio=new DomicilioTitular();
                $domicilio->id_ficha=$ficha->id_ficha;
                $domicilio->id_persona=$persona->id_persona;
                $domicilio->codi_via=$request->codigoviaconductor;
                $domicilio->tipo_via=strtoupper($request->tipoviaconductor);
                $domicilio->nomb_via=strtoupper($request->nombreviaconductor);
                $domicilio->nume_muni=$request->nmunicipalconductor;
                $domicilio->nomb_edificacion=strtoupper($request->nomb_edificacionconductor);
                $domicilio->nume_interior=$request->ninteriorconductor;
                $domicilio->codi_hab_urba=$request->codigohurbanoconductor;
                $domicilio->nomb_hab_urba=strtoupper($request->nombrehhurbanaconductor);
                $domicilio->sector=$request->zonaconductor;
                $domicilio->mzna=$request->manzanaconductor;
                $domicilio->lote=$request->loteconductor;
                $domicilio->sublote=$request->subloteconductor;
                $domicilio->codi_dep=$request->deparamentoconductor;
                $domicilio->codi_pro=$request->provinciaconductor;
                $domicilio->codi_dis=$request->distritoconductor;
                $domicilio->ubicacion=$request->ubicacionpersona;
                $domicilio->save();
            }


            $fichaeconomica=new FichaEconomica();
            $fichaeconomica->id_ficha=$ficha->id_ficha;
            $fichaeconomica->nomb_comercial=strtoupper($request->nomb_comercial);
            $fichaeconomica->pred_area_autor=$request->pred_area_autor;
            $fichaeconomica->viap_area_autor=$request->viap_area_autor;
            $fichaeconomica->viap_area_verif=$request->viap_area_verif;
            $fichaeconomica->bc_area_autor=$request->bc_area_autor;
            $fichaeconomica->bc_area_verif=$request->bc_area_verif;
            $fichaeconomica->nume_expediente=$request->nume_expediente;
            $fichaeconomica->nume_licencia=$request->nume_licencia;
            $fichaeconomica->fecha_expedicion=$request->fecha_expedicion;
            $fichaeconomica->fecha_vencimiento=$request->fecha_vencimiento;
            $fichaeconomica->inic_actividad=$request->inic_actividad;
            $fichaeconomica->cond_declarante=$request->cond_declarante;
            $fichaeconomica->esta_llenado=$request->esta_llenado;
            $fichaeconomica->mantenimiento=$request->mantenimiento;
            $fichaeconomica->docu_presentado=$request->docu_presentado;
            $fichaeconomica->pred_area_verif=$request->pred_area_verif;
            $fichaeconomica->observaciones=$request->observacion;
            $fichaeconomica->nume_ficha=str_pad($request->nume_ficha,7,'0',STR_PAD_LEFT);
            $fichaeconomica->save();

            $contcon=0;
            $autorizaciones=$request->codi_anuncio;
            if($autorizaciones!=""){
                while($contcon < count($autorizaciones)){
                    $anuncio=AutorizacionAnuncio::count()+1;
                    $anuncios=new AutorizacionAnuncio();
                    $anuncios->id_anuncio=$ficha->id_ficha.''.str_pad($request->codi_anuncio[$contcon],3,'0',STR_PAD_LEFT).''.$anuncio;
                    $anuncios->id_ficha=$ficha->id_ficha;
                    $anuncios->codi_autoriza=$anuncio;
                    $anuncios->codi_anuncio=str_pad($request->codi_anuncio[$contcon],3,'0',STR_PAD_LEFT);
                    $anuncios->nume_lados=$request->nume_lados[$contcon];
                    $anuncios->area_autorizada=$request->area_autorizada[$contcon];
                    $anuncios->area_verificada=$request->area_verificada[$contcon];
                    $anuncios->nume_expediente=$request->nume_expediente1[$contcon];
                    $anuncios->nume_licencia=$request->nume_licencia1[$contcon];
                    $anuncios->fecha_expedicion=$request->fecha_expedicion1[$contcon];
                    $anuncios->fecha_vencimiento=$request->fecha_vencimiento1[$contcon];
                    $anuncios->descripcion=$request->descripcion[$contcon];
                    $anuncios->save();
                    $contcon++;
                }
            }

            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
        }

        return redirect()->route('reporte.reportelista')
            ->with('success', 'Ficha Economica Agregado Correctamente.');
    }
}
