<?php

namespace App\Http\Controllers;

use App\Models\GenerarNumeracion;
use Illuminate\Http\Request;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Lote;
use App\Models\Ficha;

class GenerarNumeracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GenerarNumeracion  $generarNumeracion
     * @return \Illuminate\Http\Response
     */
    public function show(GenerarNumeracion $generarNumeracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GenerarNumeracion  $generarNumeracion
     * @return \Illuminate\Http\Response
     */
    public function edit(GenerarNumeracion $generarNumeracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GenerarNumeracion  $generarNumeracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenerarNumeracion $generarNumeracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenerarNumeracion  $generarNumeracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenerarNumeracion $generarNumeracion)
    {
        //
    }

    public function indexgenerarcertificado(Request $request)
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

        return view('pages.fichas.indexgenerarcertificado',compact('sectores','manzanas','ficha2','ficha','sector2','manzana2'));
    }

    public function reportegenerarcertificado(Request $request)
    {
        $sectores=Sectore::orderby('codi_sector')->get();
        $manzanas=Manzana::orderby('codi_mzna')->get();
        $sector2 =$request->buscarSector;
        $manzana2=$request->buscarManzana;
        $fichasNumeracion = GenerarNumeracion::query();

        $fichasNumeracion = GenerarNumeracion::query();

        if ($sector2) {
            $fichasNumeracion->whereHas('ficha.lote.manzana.sectore', function ($query) use ($sector2) {
                $query->where('id_sector', $sector2);
            });
        }

        if ($manzana2) {
            $fichasNumeracion->whereHas('ficha.lote.manzana', function ($query) use ($manzana2) {
                $query->where('id_mzna', $manzana2);
            });
        }

        if (empty($sector2) && empty($manzana2) && empty($request->buscarFicha)) {
            $fichasNumeracion = [];
        } else {
            $fichasNumeracion = $fichasNumeracion->get();
        }



        return view('pages.generarnumeracion.reporte',compact('fichasNumeracion','sectores','manzanas','sector2','manzana2'));
    }

    public function generarnumeracioncreate(Ficha $fichaanterior)
    {
        return view('pages.fichas.generarnumeracioncreate',compact('fichaanterior'));
    }
}
