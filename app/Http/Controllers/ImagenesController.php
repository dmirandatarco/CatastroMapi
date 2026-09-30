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
        \App\Services\FiltroLote::aplicar($ficha, $request);
        if ($request->filled('buscarSector') && $request->buscarSector != '0') {
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
        $request->validate([
            'id_ficha'  => ['required', 'exists:tf_fichas,id_ficha'],
            'fachada'   => ['nullable', 'image'],
            'plano'     => ['nullable', 'image'],
            'imagen1'   => ['nullable', 'image'],
            'imagen2'   => ['nullable', 'image'],
            'imagen3'   => ['nullable', 'image'],
            'pdfplano'  => ['nullable', 'file', 'mimes:pdf'],
            'pdfsunarp' => ['nullable', 'file', 'mimes:pdf'],
            'pdfrentas' => ['nullable', 'file', 'mimes:pdf'],
        ]);

        // Buscar la ficha seleccionada
        $fichaSeleccionada = Ficha::where('id_ficha', $request->id_ficha)->firstOrFail();

        // Obtener todas las fichas que pertenecen al mismo lote
        $idsFichas = Ficha::where('id_lote', $fichaSeleccionada->id_lote)
            ->pluck('id_ficha');

        /*
        * IMAGEN PRINCIPAL
        */
        if ($request->hasFile('fachada')) {
            $archivoSubido = $request->file('fachada');

            $nombre = $request->id_ficha . '.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/imageneslotes', $nombre);

            FichaIndividual::whereIn('id_ficha', $idsFichas)
                ->update([
                    'imagen_lote' => $nombre,
                ]);
        }

        /*
        * IMAGEN DEL PLANO
        */
        if ($request->hasFile('plano')) {
            $archivoSubido = $request->file('plano');

            $nombre = $request->id_ficha . '-mapa.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/imagenesplanos', $nombre);

            FichaIndividual::whereIn('id_ficha', $idsFichas)
                ->update([
                    'imagen_plano' => $nombre,
                ]);
        }

        /*
        * IMAGEN 1
        */
        if ($request->hasFile('imagen1')) {
            $archivoSubido = $request->file('imagen1');

            $nombre = $request->id_ficha . '-1.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/archivos', $nombre);

            $this->actualizarArchivosDelLote(
                $idsFichas,
                'imagen1',
                $nombre
            );
        }

        /*
        * IMAGEN 2
        */
        if ($request->hasFile('imagen2')) {
            $archivoSubido = $request->file('imagen2');

            $nombre = $request->id_ficha . '-2.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/archivos', $nombre);

            $this->actualizarArchivosDelLote(
                $idsFichas,
                'imagen2',
                $nombre
            );
        }

        /*
        * IMAGEN 3
        */
        if ($request->hasFile('imagen3')) {
            $archivoSubido = $request->file('imagen3');

            $nombre = $request->id_ficha . '-3.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/archivos', $nombre);

            $this->actualizarArchivosDelLote(
                $idsFichas,
                'imagen3',
                $nombre
            );
        }

        /*
        * PDF PLANO
        */
        if ($request->hasFile('pdfplano')) {
            $archivoSubido = $request->file('pdfplano');

            $nombre = $request->id_ficha . '-plano.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/archivos', $nombre);

            $this->actualizarArchivosDelLote(
                $idsFichas,
                'plano',
                $nombre
            );
        }

        /*
        * PDF SUNARP
        */
        if ($request->hasFile('pdfsunarp')) {
            $archivoSubido = $request->file('pdfsunarp');

            $nombre = $request->id_ficha . '-sunarp.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/archivos', $nombre);

            $this->actualizarArchivosDelLote(
                $idsFichas,
                'sunarp',
                $nombre
            );
        }

        /*
        * PDF RENTAS
        */
        if ($request->hasFile('pdfrentas')) {
            $archivoSubido = $request->file('pdfrentas');

            $nombre = $request->id_ficha . '-rentas.' .
                $archivoSubido->getClientOriginalExtension();

            $archivoSubido->storeAs('img/archivos', $nombre);

            $this->actualizarArchivosDelLote(
                $idsFichas,
                'rentas',
                $nombre
            );
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Los archivos fueron guardados en todas las fichas del lote.'
            );
    }

    private function actualizarArchivosDelLote(
        $idsFichas,
        string $campo,
        string $nombre
    ): void {
        foreach ($idsFichas as $idFicha) {
            Archivo::updateOrCreate(
                [
                    'id_ficha' => $idFicha,
                ],
                [
                    $campo => $nombre,
                ]
            );
        }
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
