<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Notarias;
use App\Models\Institucion;

class NotariasController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:notaria.index')->only('index');
        $this->middleware('can:notaria.edit')->only('update');
        $this->middleware('can:notaria.create')->only('store');
        $this->middleware('can:notaria.destroy')->only('destroy');
    }
    public function index()
    {
        $notarias=Notarias::all();
        $i=0;
        $ultimo=Notarias::count()+1;
        return view('pages.notaria.index',compact('notarias','i','ultimo'));
    }

    public function store(Request $request)
    {
        request()->validate(Notarias::$rules);

        $ubigeo=Institucion::first();
        $notaria=new Notarias();
        $notaria->id_notaria=str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT)."".str_pad($request->codi_notaria,5,'0',STR_PAD_LEFT);
        $notaria->id_ubi_geo=str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT);
        $notaria->codi_notaria=strtoupper($request->codi_notaria);
        $notaria->nomb_notaria=strtoupper($request->nomb_notaria);
        $notaria->save();
        return redirect()->route('notaria.index')
            ->with('success', 'Notaria Agregado Correctamente.');
    }
    public function update(Request $request)
    {
        $notaria=Notarias::where('id_notaria',$request->id_notaria)->first();            
        $requ=\Validator::make($request->all(), [     
            'nomb_notaria' => 'required|max:50'      
        ]);
        if ($requ->fails())
        {
            return Redirect::back()->with('error_code', 5)->withErrors($requ->errors())->withInput();

        }
        $notaria->nomb_notaria=strtoupper($request->nomb_notaria);
        $notaria->save();
        return redirect()->back()->with('success','Notaria Modificado Correctamente!');
    }

    public function destroy(Request $request)
    {
        $notaria= Notarias::findOrFail($request->id_notaria_2);
        if($notaria->estado=="1"){
            $notaria->estado= '0';
            $notaria->save();
            return redirect()->back()->with('success','Notaria Eliminado Correctamente!');
        }else{
            $notaria->estado= '1';
            $notaria->save();
            return redirect()->back()->with('success','Notaria Eliminado Correctamente!');
        }
    }
}
