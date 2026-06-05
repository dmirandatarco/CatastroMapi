<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Imagenes;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Ficha;
use App\Models\FichaIndividual;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use DB;
use Illuminate\Support\Facades\Redirect;

class ImagenesController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:imagenes')->only('ver,store');
    }

    public function ver(Request $request)
    {
        $sectores = Sectore::orderby('codi_sector')->get();
        $manzanas = Manzana::orderby('codi_mzna')->get();

        $sector2 = $request->buscarSector;
        $manzana2 = $request->buscarManzana;
        if ($request->buscarFicha != "") {
            $ficha2 = str_pad($request->buscarFicha, 7, '0', STR_PAD_LEFT);
        } else {
            $ficha2 = $request->buscarFicha;
        }

        $ficha = Ficha::where('tipo_ficha', '=', '01')->orderby('id_lote', 'asc');
        if ($request->buscarSector != '0') {
            $ficha = $ficha->whereHas('lote.manzana', function ($query) use ($sector2) {
                $query->where('id_sector', '=', $sector2);
            });
        }
        if ($request->buscarManzana != 0) {
            $ficha = $ficha->whereHas('lote', function ($query) use ($manzana2) {
                $query->where('id_mzna', '=', $manzana2);
            });
        }
        if ($request->buscarFicha) {
            $ficha = $ficha->whereHas('fichaindividual', function ($query) use ($ficha2) {
                $query->where('nume_ficha', '=', $ficha2);
            });
        }

        $ficha = $ficha->orderby('nume_ficha')->get();
        $total = 0;
        $base = asset('storage/img/');

        return view('pages.imagenes.ver', compact('sectores', 'manzanas', 'ficha', 'sector2', 'manzana2','ficha2','base'));
    }

    public function store(Request $request)
    {
        $fichaindividual = FichaIndividual::where('id_ficha',$request->id_ficha)->first();
        $archivo = Archivo::where('id_ficha',$request->id_ficha)->first();
        if(!$archivo){
            $archivo = new Archivo();
            $archivo->id_ficha = $request->id_ficha;
            $archivo->save();
        }
        if ($request->hasFile('fachada')) {
            $nombrerecibo = $request->id_ficha.'.'.$request->file('fachada')->getClientOriginalExtension();
            $ruta = $request->file('fachada')->storeAs('\img\imageneslotes/', $nombrerecibo);
            $fichaindividual->imagen_lote = $nombrerecibo;
            $fichaindividual->save();
        }
        if ($request->hasFile('plano')) {
            $nombrerecibo = $request->id_ficha.'-mapa.'.$request->file('plano')->getClientOriginalExtension();
            $ruta = $request->file('plano')->storeAs('\img\imagenesplanos/', $nombrerecibo);
            $fichaindividual->imagen_plano = $nombrerecibo;
            $fichaindividual->save();
        }
        if ($request->hasFile('imagen1')) {
            $nombrerecibo = $request->id_ficha.'-1.'.$request->file('imagen1')->getClientOriginalExtension();
            $ruta = $request->file('imagen1')->storeAs('\img\archivos/', $nombrerecibo);
            
            $archivo->imagen1 = $nombrerecibo;
            $archivo->save();
        }
        if ($request->hasFile('imagen2')) {
            $nombrerecibo = $request->id_ficha.'-2.'.$request->file('imagen2')->getClientOriginalExtension();
            $ruta = $request->file('imagen2')->storeAs('\img\archivos/', $nombrerecibo);
            $archivo->imagen2 = $nombrerecibo;
            $archivo->save();
        }
        if ($request->hasFile('imagen3')) {
            $nombrerecibo = $request->id_ficha.'-3.'.$request->file('imagen3')->getClientOriginalExtension();
            $ruta = $request->file('imagen3')->storeAs('\img\archivos/', $nombrerecibo);
            $archivo->imagen3 = $nombrerecibo;
            $archivo->save();
        }
        if ($request->hasFile('pdfplano')) {
            $nombrerecibo = $request->id_ficha.'-plano.'.$request->file('pdfplano')->getClientOriginalExtension();
            $ruta = $request->file('pdfplano')->storeAs('\img\archivos/', $nombrerecibo);
            $archivo->plano = $nombrerecibo;
            $archivo->save();
        }
        if ($request->hasFile('pdfsunarp')) {
            $nombrerecibo = $request->id_ficha.'-sunarp.'.$request->file('pdfsunarp')->getClientOriginalExtension();
            $ruta = $request->file('pdfsunarp')->storeAs('\img\archivos/', $nombrerecibo);
            $archivo->sunarp = $nombrerecibo;
            $archivo->save();
        }
        if ($request->hasFile('pdfrentas')) {
            $nombrerecibo = $request->id_ficha.'-rentas.'.$request->file('pdfrentas')->getClientOriginalExtension();
            $ruta = $request->file('pdfrentas')->storeAs('\img\archivos/', $nombrerecibo);
            $archivo->rentas = $nombrerecibo;
            $archivo->save();
        }
        return redirect()->back()->with('success', 'Imagen Agregado Correctamente!');
    }

    public function destroy(Request $request)
    {
        $fichaindividual = FichaIndividual::where('id_ficha',$request->id_eliminar)->first();
        $archivo = Archivo::where('id_ficha',$request->id_eliminar)->first();
        if($request->tipo_eliminar == "fachada"){
            $ruta = 'img/imageneslotes/' . $fichaindividual->imagen_lote;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $fichaindividual->imagen_lote = null;
            $fichaindividual->save();
        }
        if($request->tipo_eliminar == "plano"){
            $ruta = 'img/imagenesplanos/' . $fichaindividual->imagen_plano;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $fichaindividual->imagen_plano = null;
            $fichaindividual->save();
        }
        if($request->tipo_eliminar == "imagen1"){
            $ruta = 'img/archivos/' . $archivo->imagen1;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $archivo->imagen1 = null;
            $archivo->save();
        }
        if($request->tipo_eliminar == "imagen2"){
            $ruta = 'img/archivos/' . $archivo->imagen2;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $archivo->imagen2 = null;
            $archivo->save();
        }
        if($request->tipo_eliminar == "imagen3"){
            $ruta = 'img/archivos/' . $archivo->imagen3;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $archivo->imagen3 = null;
            $archivo->save();
        }
        if($request->tipo_eliminar == "pdfplano"){
            $ruta = 'img/archivos/' . $archivo->plano;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $archivo->plano = null;
            $archivo->save();
        }
        if($request->tipo_eliminar == "pdfsunarp"){
            $ruta = 'img/archivos/' . $archivo->sunarp;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $archivo->sunarp = null;
            $archivo->save();
        }
        if($request->tipo_eliminar == "pdfrentas"){
            $ruta = 'img/archivos/' . $archivo->rentas;
            if (Storage::exists($ruta)) {
                Storage::delete($ruta);
            }
            $archivo->rentas = null;
            $archivo->save();
        }
        return redirect()->back()->with('success', 'Imagen Eliminado Correctamente!');
    }
}
