<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manzana;
use App\Models\Sectore;
use App\Models\Edificaciones;
use App\Models\Lote;
use App\Models\UniCat;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ManzanaController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:manzana.index')->only('index');
        $this->middleware('can:manzana.edit')->only('update');
        $this->middleware('can:manzana.create')->only('store');
        $this->middleware('can:manzana.destroy')->only('destroy');
    }
    public function index()
    {
        $manzanas=Manzana::all();
        $sectores=Sectore::all();
        $i=0;
        return view('pages.manzana.index',compact('manzanas','sectores','i'));
    }

    public function store(Request $request)
    {
        request()->validate(Manzana::$rules);
        $manzana=new Manzana();
        $manzana->id_mzna=$request->id_sector.''.str_pad($request->codi_mzna,3,'0',STR_PAD_LEFT);
        $manzana->id_sector=$request->id_sector;
        $manzana->codi_mzna=str_pad($request->codi_mzna,3,'0',STR_PAD_LEFT);
        $manzana->nume_mzna=strtoupper($request->nume_mzna);
        $manzana->estado=1;
        $manzana->save();
        return redirect()->route('manzana.index')
            ->with('success', 'Manzana Agregado Correctamente.');
    }
    public function update(Request $request)
    {

        $manzana=Manzana::where('codi_mzna',$request->id_manzana)->where('id_sector',$request->id_sector)->first();
        $id=str_pad($manzana->id_mzna,11,'0',STR_PAD_LEFT);
        $requ=\Validator::make($request->all(), [
            'id_sector' => 'required',
            'codi_mzna' => ['required','max:3'],
            'nume_mzna' => 'required|max:15',
        ]);
        if ($requ->fails())
        {
            return Redirect::back()->with('error_code', 5)->withErrors($requ->errors())->withInput();
        }

        $id_mzna_ant = $manzana->id_mzna;
        $manzana->id_mzna      = $request->id_sector.''.str_pad($request->codi_mzna,3,'0',STR_PAD_LEFT);
        $manzana->id_sector    = $request->id_sector;
        $manzana->codi_mzna    = str_pad($request->codi_mzna,3,'0',STR_PAD_LEFT);
        $manzana->nume_mzna    = strtoupper($request->nume_mzna);
        $lotes = Lote::where('id_mzna',$id_mzna_ant)->get();
        $manzana->save();
        foreach($lotes as $lote)
        {
            $lote_ant = $id_mzna_ant.''.$lote->codi_lote;
            $edificaciones = Edificaciones::where('id_lote', $lote_ant)->get();
            $lote->id_lote = $manzana->id_mzna.''.$lote->codi_lote;
            $lote->codi_lote = $lote->codi_lote;
            $lote->id_mzna = $manzana->id_mzna;
            $lote->save();
            foreach($edificaciones as $edificacion)
            {
                $edif_ant = $lote_ant.''.$edificacion->codi_edificacion;
                $unicats = UniCat::where('id_lote', $lote_ant)->where('id_edificacion',$edif_ant)->get();
                $edificacion->id_edificacion = $lote->id_lote.''.$edificacion->codi_edificacion;
                $edificacion->codi_edificacion = $edificacion->codi_edificacion;
                $edificacion->id_lote = $lote->id_lote;
                $edificacion->save();
                foreach($unicats as $unicat)
                {
                    $unicat->id_uni_cat = $edificacion->id_edificacion.''.$unicat->codi_entrada.''.$unicat->codi_piso.''.$unicat->codi_unidad;
                    $unicat->id_edificacion = $edificacion->id_edificacion;
                    $unicat->id_lote = $lote->id_lote;
                    $unicat->save();

                    $suma = array_sum(str_split($unicat->id_uni_cat)); 
                    $dc   = $suma % 9;

                    Ficha::where('id_uni_cat', $unicat->id_uni_cat)->update([
                        'dc' => $dc,
                    ]);
                }
            }
        }


        return redirect()->back()->with('success','Manzana Modificado Correctamente!');
    }

    public function destroy(Request $request)
    {
        $manzana= Manzana::findOrFail($request->id_manzana_2);
        if($manzana->estado=="1"){
            $manzana->estado= '0';
            $manzana->save();
            return redirect()->back()->with('success','Manzana Eliminado Correctamente!');
        }else{
            $manzana->estado= '1';
            $manzana->save();
            return redirect()->back()->with('success','Manzana Eliminado Correctamente!');
        }
    }
}
