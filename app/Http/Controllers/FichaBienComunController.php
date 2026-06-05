<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institucion;
use App\Models\Uso;
use App\Models\Ficha;
use App\Models\UniCat;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Puerta;
use App\Models\Persona;
use App\Models\DomicilioTitular;
use App\Models\ExoneracionPredio;
use App\Models\FichaIndividual;
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

class FichaBienComunController extends Controller
{

    public function __construct()
    {

        $this->middleware('can:ficha.createbiencomun') ->only('indexbiencomun');
        $this->middleware('can:ficha.createbiencomun') ->only('createbiencomun');
        $this->middleware('can:ficha.editbiencomun') ->only('editbiencomun');
        $this->middleware('can:ficha.destroybiencomun') ->only('destroybiencomun');

    }


    public function indexbiencomun(Request $request)
    {
        $sectores=Sectore::all();
        $manzanas=Manzana::all();

        $sector2=$request->buscarSector;
        $manzana2=$request->buscarManzana;
        $ficha2=$request->buscarFicha;
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
        
        return view('pages.fichas.indexbiencomun',compact('sectores','manzanas','ficha2','ficha','sector2','manzana2'));
    }

    public function createbiencomun(Ficha $fichaanterior)
    {
        $usos=Uso::all();
        $tecnicos=Persona::where('tipo_funcion',3)->get();
        $supervisores=Persona::where('tipo_funcion',2)->get();
        $verificadores=Persona::where('tipo_funcion',4)->get();
        return view('pages.fichas.createbiencomun',compact('usos','tecnicos','supervisores','verificadores','fichaanterior'));
    }

    public function editbiencomun(Request $request)
    {
        $fichaanterior=Ficha::where('id_ficha',$request->fichaanterior)->first();
        return view('pages.fichas.editbiencomun',compact('fichaanterior'));
    }

    public function destroybiencomun(Ficha $fichaanterior)
    {
        if($fichaanterior->recapbbcc!=""){
            foreach($fichaanterior->recapbbcc as $bbcc){
                $bbcc->delete();
            }
        }
        if($fichaanterior->recapedificio!=""){
            foreach($fichaanterior->recapedificio as $edificio){
                $edificio->delete();
            }
        }
        if($fichaanterior->registrolegal!=""){
            $fichaanterior->registrolegal->delete();
        }
        if($fichaanterior->sunarp!=""){
            $fichaanterior->sunarp->delete();
        }
        foreach($fichaanterior->instalacions as $instalacion){
            $instalacion->delete();
        }
        foreach($fichaanterior->construccions as $construccion){
            $construccion->delete();
        }
        if($fichaanterior->serviciobasico!=""){
            $fichaanterior->serviciobasico->delete();
        }
        if($fichaanterior->lindero!=""){
            $fichaanterior->lindero->delete();
        }
        if($fichaanterior->fichabiencomun!=""){
            $fichaanterior->fichabiencomun->delete();
        }
        foreach($fichaanterior->puertas as $puerta){
            $puerta->fichas()->detach($fichaanterior->id_ficha);
        }
        $usuario=$fichaanterior->id_usuario;
        $fichaanterior->delete();


        return redirect()->back()->with('success','Ficha Eliminado Correctamente!');
    }
}
