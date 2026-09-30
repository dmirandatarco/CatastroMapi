<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenerarCertificado;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Lote;
use App\Models\Ficha;

class GenerarCertificadoController extends Controller
{
    public function plano(Request $request, Ficha $ficha, string $tipo)
    {
        abort_unless(in_array($tipo, ['catastral', 'numeracion'], true), 404);
        $datos = $request->validate(['puerta' => 'nullable|string|max:100']);
        $resultado = app(\App\Services\Certificados\UbicacionPredioService::class)->obtener($ficha, $tipo, $tipo === 'numeracion' ? ($datos['puerta'] ?? null) : null);
        abort_unless($resultado['png'] !== null, 404, 'Plano no disponible.');
        return response($resultado['png'], 200, ['Content-Type' => 'image/png', 'Cache-Control' => 'private, max-age=60']);
    }

    public function imagen(Ficha $ficha, string $tipo)
    {
        abort_unless(in_array($tipo, ['foto', 'plano'], true), 404);
        $imagenes = app(\App\Services\Certificados\EmisionCertificadoService::class)->sourceImages($ficha);
        abort_unless(isset($imagenes[$tipo]), 404);
        return response()->file($imagenes[$tipo], ['Cache-Control' => 'private, max-age=60']);
    }
    //

    public function indexgenerarcatastral(\App\Http\Requests\FiltroCertificadosRequest $request)
    {
        $datos = app(\App\Services\Certificados\ConsultaCertificados::class)->listado('catastral', false, $request->validated());
        return view('pages.certificados.listado', $datos);
    }

    public function reportegenerarcatastral(\App\Http\Requests\FiltroCertificadosRequest $request)
    {
        $datos = app(\App\Services\Certificados\ConsultaCertificados::class)->listado('catastral', true, $request->validated());
        return view('pages.certificados.listado', $datos);
    }

    public function generarcatastralcreate(Ficha $fichaanterior)
    {
        return view('pages.fichas.generarcatastralcreate',compact('fichaanterior'));
    }
}
