<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tabla;
use App\Models\TablaCodigo;
use Illuminate\Support\Facades\Redirect;
use DB;

class TablaCodigoController extends Controller
{
    //
    public function index(Request $request)
    {
        $tablas = Tabla::all(); 
        $tabla2 = $request->input('buscarTabla'); 

        
        if (empty($tabla2) || $tabla2 == '0') {
            $tablacodigos = TablaCodigo::all();
        } else {
            $tablacodigos = TablaCodigo::where('id_tabla', $tabla2)->get();
        }

        $i = 0;
        return view('pages.tablacodigo.index', compact('tabla2', 'tablas', 'tablacodigos', 'i'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tablacodigos' => 'required',
            'codigo' => 'required',
            'desc_codigo' => 'required',
        ], [
            'id_tablacodigos.required' => 'El campo Id Tabla es obligatorio.',
            'codigo.required' => 'El campo Código es obligatorio.',
            'desc_codigo.required' => 'El campo Descripción es obligatorio.',
        ]);
        // Verificar la unicidad de la combinación id_tabla y codigo
        $combinacionUnica = TablaCodigo::where('id_tabla', $request->input('id_tablacodigos'))
            ->where('codigo', $request->input('codigo'))
            ->count();
        if ($combinacionUnica > 0) {
            return redirect()->back()->withInput()->withErrors(['id_tablacodigos' => 'La combinación de Id Tabla y Código ya existe.']);
        }
        $tablacodigos=new TablaCodigo();
        $tablacodigos->codigo=$request->codigo;
        $tablacodigos->id_tabla=$request->id_tablacodigos;
        $tablacodigos->desc_codigo=$request->desc_codigo;
        $tablacodigos->save();
        return redirect()->route('tablacodigo.index')
            ->with('success', 'Codigo Agregado Correctamente.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'id_tablacodigos' => 'required',
            'codigo' => 'required',
            'desc_codigo' => 'required',
        ], [
            'id_tablacodigos.required' => 'El campo Id Tabla es obligatorio.',
            'codigo.required' => 'El campo Código es obligatorio.',
            'desc_codigo.required' => 'El campo Descripción es obligatorio.',
        ]);
        DB::table('tf_tablas_codigos')
        ->where('id_tabla', $request->id_tablacodigos)
        ->where('codigo', $request->codigo2)
        ->update([
            'desc_codigo' => $request->desc_codigo,
            'id_tabla' => $request->id_tablacodigos,
            'codigo' => $request->codigo,
        ]);
        return redirect()->route('tablacodigo.index')
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
