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

    public function indexgenerarcertificado(\App\Http\Requests\FiltroCertificadosRequest $request)
    {
        $datos = app(\App\Services\Certificados\ConsultaCertificados::class)->listado('numeracion', false, $request->validated());
        return view('pages.certificados.listado', $datos);
    }

    public function reportegenerarcertificado(\App\Http\Requests\FiltroCertificadosRequest $request)
    {
        $datos = app(\App\Services\Certificados\ConsultaCertificados::class)->listado('numeracion', true, $request->validated());
        return view('pages.certificados.listado', $datos);
    }

    public function generarnumeracioncreate(Ficha $fichaanterior)
    {
        return view('pages.fichas.generarnumeracioncreate',compact('fichaanterior'));
    }
}
