<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Ficha;

use DB;
class ProgresoFichasController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:progresofichas')->only('index');
    }


    public function index(Request $request)
    {
        $sectores=Sectore::all();
        $sector2 = $request->buscarSector;
        $ficha2 = $request->buscarFicha;
        $contadorsector =0;


        $ficha=Ficha::where('tipo_ficha','LIKE','%%');
        $sector=Sectore::where('id_sector','LIKE','%%');

        if($request->buscarSector!='0'){
            $ficha=$ficha->whereHas('lote.manzana', function($query) use ($sector2) {
                $query->where('id_sector','=', $sector2);
            });
            $sector=$sector->where('id_sector',$sector2);

        }
        $sector=$sector->get();
        $ficha=$ficha->get();

        if($request->buscarFicha!="0"){
            $contadorfichas = $ficha->where('tipo_ficha',$ficha2)->count();
            if($ficha2=='01'){
                foreach($sector as $sectores1){
                    $contadorsector = $contadorsector+$sectores1->fichaindividual;
                }
            }
            if($ficha2=='02'){
                foreach($sector as $sectores1){
                    $contadorsector = $contadorsector+$sectores1->fichacotitular;
                }
            }
            if($ficha2=='03'){
                foreach($sector as $sectores1){
                    $contadorsector = $contadorsector+$sectores1->fichaeconomica;
                }
            }
            if($ficha2=='04'){
                foreach($sector as $sectores1){
                    $contadorsector = $contadorsector+$sectores1->fichabiencomun;
                }
            }
            if($ficha2=='05'){
                foreach($sector as $sectores1){
                    $contadorsector = $contadorsector+$sectores1->fichacultural;
                }
            }
            if($ficha2=='06'){
                foreach($sector as $sectores1){
                    $contadorsector = $contadorsector+$sectores1->ficharural;
                }
            }

        }else{
            $contadorfichas = $ficha->count();
            foreach($sector as $sectores1){
                $contadorsector = $contadorsector+$sectores1->fichaindividual+$sectores1->fichacotitular+$sectores1->fichaeconomica+$sectores1->fichabiencomun+$sectores1->fichacultural+$sectores1->ficharural;
            }

        }
        if( $request->buscarSector==""&&$request->buscarFicha==""){
            $ficha=Ficha::where('tipo_ficha','LIKE','%%');
            $ficha=$ficha->get();
            $contadorfichas = $ficha->count();
            $sector=Sectore::where('id_sector','LIKE','%%');
            $sector=$sector->get();
            foreach($sector as $sectores1){
                $contadorsector = $contadorsector+$sectores1->fichaindividual+$sectores1->fichacotitular+$sectores1->fichaeconomica+$sectores1->fichabiencomun+$sectores1->fichacultural+$sectores1->ficharural;
            }
            $valor1 = round(( $contadorfichas /  (($contadorsector == 0) ? 1 : $contadorsector) * 100), 2);
        }else{

            $valor1 = round(( $contadorfichas /  (($contadorsector == 0) ? 1 : $contadorsector) * 100), 2);
        }

        return view('pages.progresofichas.index',compact('contadorfichas','sector2','ficha2','sectores','ficha','contadorsector','valor1'));
    }
}
