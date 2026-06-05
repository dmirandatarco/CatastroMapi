<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;

class FichaRuralController extends Controller
{


    public function __construct()
    {

            $this->middleware('can:ficha.createrural') ->only('createrural');

    }
    public function createrural()
    {
        return view('pages.fichas.createrural');
    }
    public function editrural(Request $request)
    {
        $fichaanterior=Ficha::where('id_ficha',$request->fichaanterior)->first();
        return view('pages.fichas.editrural',compact('fichaanterior'));
    }
}
