<?php

namespace App\Http\Controllers;

use App\Models\HabUrbana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Institucion;
use App\Models\Tabla;
use App\Models\TablaCodigo;
use Illuminate\Validation\Rule;

class HabUrbanaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:haburbana.index')->only('index');
        $this->middleware('can:haburbana.edit')->only('update');
        $this->middleware('can:haburbana.create')->only('store');
        $this->middleware('can:haburbana.destroy')->only('destroy');
    }

    public function index()
    {
        $haburbanas=HabUrbana::all();
        $i=0;
        $codigos = TablaCodigo::where('id_tabla','HUR')->orderBy('desc_codigo','asc')->get();
        return view('pages.haburbana.index',compact('haburbanas','i','codigos'));
    }

    public function store(Request $request)
    {
        $ubigeo=Institucion::first();
        request()->validate(HabUrbana::$rules);
        $haburbana=new HabUrbana();
        $haburbana->id_hab_urba=str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($request->codi_hab_urba,4,'0',STR_PAD_LEFT);
        $haburbana->grup_urba=strtoupper($request->grup_urba);
        $haburbana->tipo_hab_urba=strtoupper($request->tipo_hab_urba);
        $haburbana->nomb_hab_urba=strtoupper($request->nomb_hab_urba);
        $haburbana->codi_hab_urba=strtoupper($request->codi_hab_urba);
        $haburbana->id_ubi_geo=str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT);
        $haburbana->estado=1;
        $haburbana->save();
        return redirect()->route('haburbana.index')
            ->with('success', 'Habilitacion Urbana Agregado Correctamente.');
    }
    public function update(Request $request)
    {
        // dd($request);
        $ubigeo=Institucion::first();
        $haburbana=HabUrbana::where('id_hab_urba',$request->id_haburbana)->first();
        $id=$haburbana->id_hab_urba;
        $requ=\Validator::make($request->all(), [
            'grup_urba'     => 'nullable|max:100',
            'tipo_hab_urba' => 'required|max:10',
            'nomb_hab_urba' => 'required|max:100',
            'codi_hab_urba' => [
                'required',
                'max:4',
                Rule::unique('tf_hab_urbana', 'codi_hab_urba')->ignore($id, 'id_hab_urba')],
        ]);
        if ($requ->fails())
        {
            return Redirect::back()->with('error_code', 5)->withErrors($requ->errors())->withInput();
        }
        $haburbana->id_hab_urba=str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT).''.str_pad($request->codi_hab_urba,4,'0',STR_PAD_LEFT);
        $haburbana->grup_urba=strtoupper($request->grup_urba);
        $haburbana->tipo_hab_urba=strtoupper($request->tipo_hab_urba);
        $haburbana->nomb_hab_urba=strtoupper($request->nomb_hab_urba);
        $haburbana->codi_hab_urba=strtoupper($request->codi_hab_urba);
        $haburbana->save();
        return redirect()->back()->with('success','Habilitacion Urbana Modificado Correctamente!');
    }

    public function destroy(Request $request)
    {
        $haburbana= HabUrbana::findOrFail($request->id_haburbana_2);
        if($haburbana->estado=="1"){
            $haburbana->estado= '0';
            $haburbana->save();
            return redirect()->back()->with('success','Habilitacion Urbana Eliminado Correctamente!');
        }else{
            $haburbana->estado= '1';
            $haburbana->save();
            return redirect()->back()->with('success','Habilitacion Urbana Eliminado Correctamente!');
        }
    }
}
