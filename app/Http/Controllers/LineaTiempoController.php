<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\Ficha;

class LineaTiempoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:lineatiempo')->only('lineatiempo');
    }

    public function lineatiempo(Request $request)
    {
        $lotes=Lote::all();

        $lote2=$request->buscarLote;
        $ficha=Ficha::where('activo','LIKE','%%');
        if($request->buscarLote!='0'){
            $ficha=$ficha->where('id_lote', $lote2);
        }
        
        $ficha=$ficha->get();

        if($request->buscarLote=='')
        {
            $ficha=[];
        }
        
        return view('pages.lineatiempo.index',compact('lotes','ficha','lote2'));
    }
}