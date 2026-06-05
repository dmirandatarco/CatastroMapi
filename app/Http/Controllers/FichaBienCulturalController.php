<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\Sectore;
use App\Models\Manzana;

class FichaBienCulturalController extends Controller
{

    public function __construct()
    {

            $this->middleware('can:ficha.indexbiencultural') ->only('indexbiencultural');
            $this->middleware('can:ficha.createbiencultural') ->only('createbiencultural');
    }

    public function indexbiencultural(Request $request)
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
            $ficha2=str_pad($request->buscarFicha,7,'0',STR_PAD_LEFT);
        }else{
            $ficha2=$request->buscarFicha;
        }
        $ficha=$ficha->get();
        $total=0;

        if($request->buscarSector==''&&$request->buscarManzana==''&&$request->buscarFicha=='')
        {
            $ficha=[];
        }

        return view('pages.fichas.indexbiencultural',compact('sectores','manzanas','ficha2','ficha','sector2','manzana2'));
    }

    public function createbiencultural(Ficha $fichaanterior = null)
    {
        if (is_null($fichaanterior)) {
            abort(404);
        }
        else
        {
        return view('pages.fichas.createbienesculturales',compact('fichaanterior'));
        }
    }
    public function editbiencultural(Request $request)
    {
        $fichaanterior=Ficha::where('id_ficha',$request->fichaanterior)->first();
        return view('pages.fichas.editbiencultural',compact('fichaanterior'));
    }
}
