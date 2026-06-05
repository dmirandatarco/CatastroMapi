<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Lote;
use App\Models\Institucion;

class SectoreController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:sectore.index')->only('index');
        $this->middleware('can:sectore.edit')->only('update');
        $this->middleware('can:sectore.create')->only('store');
        $this->middleware('can:sectore.destroy')->only('destroy');
    }

    public function index()
    {
        $sectores=Sectore::all();
        $i=0;
        $ultimo=Sectore::count()+1;
        return view('pages.sectore.index',compact('sectores','i','ultimo'));
    }

    public function store(Request $request)
    {
        request()->validate(Sectore::$rules);

        $ubigeo=Institucion::first();
        $sectore=new Sectore();
        $sectore->id_sector=str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT)."".$request->codi_sector;
        $sectore->id_ubi_geo=str_pad($ubigeo->id_institucion,6,'0',STR_PAD_LEFT);
        $sectore->codi_sector=strtoupper($request->codi_sector);
        $sectore->nomb_sector=strtoupper($request->nomb_sector);
        $sectore->fichaindividual=$request->fichaindividual ?? 0;
        $sectore->fichacotitular=$request->fichacotitular ?? 0;
        $sectore->fichaeconomica=$request->fichaeconomica ?? 0;
        $sectore->fichabiencomun=$request->fichabiencomun ?? 0;
        $sectore->fichacultural=$request->fichacultural ?? 0;
        $sectore->ficharural=$request->ficharural ?? 0;
        $sectore->estado=1;
        $sectore->save();
        return redirect()->route('sectore.index')
            ->with('success', 'Sector Agregado Correctamente.');
    }
    public function update(Request $request)
    {
        $sectore=Sectore::find($request->id_sectore);
        $requ=\Validator::make($request->all(), [
            'nomb_sector' => 'required|max:20'
        ]);
        if ($requ->fails())
        {
            return Redirect::back()->with('error_code', 5)->withErrors($requ->errors())->withInput();
        }
        $id_sector_ant = $sectore->id_sector;
        $sectore->nomb_sector=strtoupper($request->nomb_sector);
        $sectore->fichaindividual=$request->fichaindividual ?? 0;
        $sectore->fichacotitular=$request->fichacotitular ?? 0;
        $sectore->fichaeconomica=$request->fichaeconomica ?? 0;
        $sectore->fichabiencomun=$request->fichabiencomun ?? 0;
        $sectore->fichacultural=$request->fichacultural ?? 0;
        $sectore->ficharural=$request->ficharural ?? 0;
        $sectore->codi_sector=$request->codi_sector;
        $sectore->id_sector = $sectore->id_ubi_geo.''.$request->codi_sector;


        $manzanas = Manzana::where('id_sector',$id_sector_ant)->get();
        $sectore->save();
        foreach($manzanas as $manzana)
        {
            $id_mzna_ant = $manzana->id_mzna;
            $lotes = Lote::where('id_mzna',$id_mzna_ant)->get();
            $manzana->id_mzna = $sectore->id_sector.''.$manzana->codi_mzna;
            $manzana->save();
            foreach($lotes as $lote)
            {
                $lote->id_lote = $manzana->id_mzna.''.$lote->codi_lote;
                $lote->save();
            }
        }
        return redirect()->back()->with('success','Sectore Modificado Correctamente!');
    }

    public function destroy(Request $request)
    {
        $sectore= Sectore::findOrFail($request->id_sectore_2);
        if($sectore->estado=="1"){
            $sectore->estado= '0';
            $sectore->save();
            return redirect()->back()->with('success','Sectore Eliminado Correctamente!');
        }else{
            $sectore->estado= '1';
            $sectore->save();
            return redirect()->back()->with('success','Sectore Eliminado Correctamente!');
        }
    }
    public function eliminar(Request $request)
    {
        $sectore= Sectore::findOrFail($request->id_sectore_2);
        
        if($sectore->manzanas()->count() == 0)
        {
            $sectore->delete();
        }
        else
        {

            return redirect()->back()->with('error','Sectore no se ha Eliminado!');
        }
        return redirect()->back()->with('success','Sectore Eliminado Correctamente!');

        
    }
}
