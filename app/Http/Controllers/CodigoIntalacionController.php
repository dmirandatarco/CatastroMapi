<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CodigoInstalacion;
use DB;



class CodigoIntalacionController extends Controller
{
    //
    public function index(Request $request)
    {
        $tablas = CodigoInstalacion::all(); 
        $i = 0;

        return view('pages.codigoinstalacion.index', compact('tablas', 'i'));
    }
   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codi_instalacion'  => 'required|max:2',
            'desc_instalacion'  => 'required|max:50',
            'material'          => 'required|max:50',
            'unidad'            => 'required|max:30',
        ]);
        CodigoInstalacion::create($validatedData);

        return redirect()->back()->with('success', 'Instalación guardada exitosamente');
    }

    public function update(Request $request)
    {
        $request->validate([
            'codi_instalacion'  => 'required|max:2',
            'desc_instalacion'  => 'required|max:50',
            'material'          => 'required|max:50',
            'unidad'            => 'required|max:30',
        ], [
            'codi_instalacion.required' => 'El campo Codigo es obligatorio.',
            'desc_instalacion.required' => 'El campo Descripcion es obligatorio.',
            'material.required'         => 'El campo Material es obligatorio.',
            'unidad.required'           => 'El campo Unidad es obligatorio.',
        ]);
        DB::table('tf_codigos_instalaciones')
        ->where('codi_instalacion', $request->codi_instalacion)
        ->update([
            'codi_instalacion'  => $request->codi_instalacion,
            'desc_instalacion'  => $request->desc_instalacion,
            'material'          => $request->material,
            'unidad'            => $request->unidad,
        ]);

        return redirect()->route('codigoinstalacion.index')
        ->with('success', 'Código Actualizado Correctamente.');
    }

    public function destroy(Request $request)
    {
        DB::table('tf_tablas_codigos')
        ->where('id_tabla', $request->id_tabla_id_2)
        ->where('codigo', $request->id_tablacodigos_2)
        ->delete();

        return redirect()->route('tablacodigo.index')
        ->with('success', 'Código Eliminado Correctamente.');
    }
}
