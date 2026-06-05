<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class PersonaController extends Controller
{


    public function __construct()
    {

        $this->middleware('can:mantenimiento.supervisores')->only('supervisores');
        $this->middleware('can:mantenimiento.tecnicos')->only('tecnicos');
        $this->middleware('can:mantenimiento.verificadores')->only('verificadores');


    }

    public function index()
    {
        //
        $personas=Persona::where('tipo_funcion',3)->get();
        $i=0;
        return view('pages.persona.index',compact('personas','i'));

    }

    public function supervisores()
    {
        $personas=Persona::where('tipo_funcion',2)->get();
        $i=0;
        return view('pages.persona.supervisores',compact('personas','i'));

    }

    public function verificadores()
    {
        $personas=Persona::where('tipo_funcion',4)->get();
        $i=0;
        return view('pages.persona.verificadores',compact('personas','i'));

    }

    public function store(Request $request)
    {
        $requ=\Validator::make($request->all(), [
            'nume_doc' => 'required|numeric|digits:8',
            'nombres' => 'required|max:150',
            'nombres' => 'required|max:50',
            'ape_paterno' => 'required|max:50',
            'ape_materno' => 'required|max:50',
            'nregistro' => 'max:7',
            'email' => 'nullable|email|max:50',
        ]);
        if ($requ->fails())
        {
            return Redirect::back()->with('error_code', 6)->withErrors($requ->errors())->withInput();
        }

        $persona= new Persona();
        $persona->id_persona=$request->nume_doc.''.$request->tipo_funcion.'102';
        $persona->nume_doc=$request->nume_doc;
        $persona->tipo_doc="02";
        $persona->tipo_persona=1;
        $persona->nombres=strtoupper($request->nombres);
        $persona->ape_paterno=strtoupper($request->ape_paterno);
        $persona->ape_materno=strtoupper($request->ape_materno);
        $persona->nregistro=strtoupper($request->nregistro);
        $persona->tipo_funcion=$request->tipo_funcion;
        $persona->save();

        return redirect()->back()
            ->with('success', 'Agregado Correctamente.');
    }

    public function update(Request $request)
    {
        $persona= Persona::where('id_persona',$request->id_persona)->first();
        $id=$persona->id_persona;
        $requ=\Validator::make($request->all(), [
            'nume_doc' => [
                'required',
                'numeric',
                'digits:8',
                Rule::unique('tf_personas', 'nume_doc')->ignore($id, 'id_persona')],
            'nombres' => 'required|max:150',
            'nombres' => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'ape_paterno' => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'ape_materno' => 'required|regex:/^[a-zA-Z\s]+$/u|max:50',
            'email' => 'nullable|email|max:50',
        ]);
        if ($requ->fails())
        {
            return Redirect::back()->with('error_code', 5)->withErrors($requ->errors())->withInput();
        }

        $persona->id_persona=$request->nume_doc.'3102';
        $persona->nume_doc=$request->nume_doc;
        $persona->nombres=strtoupper($request->nombres);
        $persona->ape_paterno=strtoupper($request->ape_paterno);
        $persona->ape_materno=strtoupper($request->ape_materno);
        $persona->nregistro=strtoupper($request->nregistro);
        $persona->save();

        return redirect()->back()
            ->with('success', 'Modificado Correctamente.');
    }

}
