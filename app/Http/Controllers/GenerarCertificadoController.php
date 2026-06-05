<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenerarCertificado;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Lote;
use App\Models\Ficha;

class GenerarCertificadoController extends Controller
{
    //

    public function indexgenerarcatastral(Request $request)
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

        return view('pages.fichas.indexgenerarcatastral',compact('sectores','manzanas','ficha2','ficha','sector2','manzana2'));
    }

    public function reportegenerarcatastral(Request $request)
    {
        $sectores=Sectore::orderby('codi_sector')->get();
        $manzanas=Manzana::orderby('codi_mzna')->get();
        $sector2 =$request->buscarSector;
        $manzana2=$request->buscarManzana;
        $fichasCatastral = GenerarCertificado::query();

        $fichasCatastral = GenerarCertificado::query();

        if ($sector2) {
            $fichasCatastral->whereHas('ficha.lote.manzana.sectore', function ($query) use ($sector2) {
                $query->where('id_sector', $sector2);
            });
        }

        if ($manzana2) {
            $fichasCatastral->whereHas('ficha.lote.manzana', function ($query) use ($manzana2) {
                $query->where('id_mzna', $manzana2);
            });
        }

        if (empty($sector2) && empty($manzana2) && empty($request->buscarFicha)) {
            $fichasCatastral = [];
        } else {
            $fichasCatastral = $fichasCatastral->get();
        }



        return view('pages.generarcatastral.reporte',compact('fichasCatastral','sectores','manzanas','sector2','manzana2'));
    }

    public function generarcatastralcreate(Ficha $fichaanterior)
    {
        return view('pages.fichas.generarcatastralcreate',compact('fichaanterior'));
    }
}
