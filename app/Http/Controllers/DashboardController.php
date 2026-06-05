<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\FichaIndividual;
use App\Models\FichaCotitularidad;
use App\Models\FichaEconomica;
use App\Models\Lote;
use App\Models\Sectore;
use App\Models\Manzana;
use App\Models\Via;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fichaindividual=Ficha::where('tipo_ficha','01')->count();
        $fichaindividualestado=FichaIndividual::select(DB::raw('COUNT(esta_llenado) as cantidad'),'esta_llenado')->groupBy('esta_llenado')->get();
        $fichacotitularidad=Ficha::where('tipo_ficha','02')->count();
        $fichacotitularidadestado=FichaCotitularidad::select(DB::raw('COUNT(esta_llenado) as cantidad'),'esta_llenado')->groupBy('esta_llenado')->get();
        $fichaeconomica=Ficha::where('tipo_ficha','03')->count();
        $fichaebiencomun=Ficha::where('tipo_ficha','04')->count();
        $fichaeconomicaestado=FichaEconomica::select(DB::raw('COUNT(esta_llenado) as cantidad'),'esta_llenado')->groupBy('esta_llenado')->get();
        $fichassectores=Ficha::join('tf_lotes as l','tf_fichas.id_lote','=','l.id_lote')->join('tf_manzanas as m','l.id_mzna','=','m.id_mzna')->join('tf_sectores as s','m.id_sector','=','s.id_sector')
        ->select(DB::raw('COUNT(s.id_sector) as cantidad'),'s.nomb_sector')->groupBy('s.nomb_sector')->orderBy('s.nomb_sector','asc')->get();
        $fichastipo=Ficha::select(DB::raw('COUNT(tipo_ficha) as cantidad'),'tipo_ficha')->groupBy('tipo_ficha')->get();
        $fichascalificacion=Ficha::join('tf_fichas_individuales as f','tf_fichas.id_ficha','=','f.id_ficha')->select(DB::raw('COUNT(f.clasificacion) as cantidad'),'f.clasificacion')->where('f.clasificacion','!=','0')->orderBy('cantidad','desc')->groupBy('f.clasificacion')->take(10)->get();
        $fichaspersona=Ficha::join('tf_titulares as t','tf_fichas.id_ficha','=','t.id_ficha')->join('tf_personas as p','t.id_persona','=','p.id_persona')->where('p.tipo_persona','=','1')->count();
        $fichaspersona2=Ficha::join('tf_titulares as t','tf_fichas.id_ficha','=','t.id_ficha')->join('tf_personas as p','t.id_persona','=','p.id_persona')->where('p.tipo_persona','=','2')->count();
        $totallotes=Lote::whereHas('ficha', function($query) {
            $query->where('activo','like', '%%');
        })->count();
        $totallotessector=Lote::join('tf_manzanas as m','tf_lotes.id_mzna','=','m.id_mzna')->join('tf_sectores as s','m.id_sector','=','s.id_sector')->select(DB::raw('COUNT(s.codi_sector) as cantidad'),'s.codi_sector','s.nomb_sector')
        ->whereHas('ficha', function($query) {
            $query->where('activo','like', '%%');
        })->groupBy('s.codi_sector','s.nomb_sector')->get();
        $sector=Sectore::all();
        $contadorindividual=0;
        $contadoreconomica=0;
        $contadorcotitular=0;
        $contadorbiencomun=0;
        foreach($sector as $sectores1){
            $contadorindividual = $contadorindividual+$sectores1->fichaindividual;
            $contadoreconomica = $contadoreconomica+$sectores1->fichaeconomica;
            $contadorcotitular = $contadorcotitular+$sectores1->fichacotitular;
            $contadorbiencomun = $contadorbiencomun+$sectores1->fichabiencomun;
        }
        if($contadorindividual!=0)
        {
            $porcentajeindividual = round(( $fichaindividual* 100 /  $contadorindividual), 2);
        }else{
            $porcentajeindividual=0;
        }
        if($contadoreconomica!=0)
        {
            $porcentajeeconomica = round(( $fichaeconomica * 100 /  $contadoreconomica), 2);
        }else{
            $porcentajeeconomica=0;
        }
        if($contadorcotitular!=0)
        {
            $porcentajecotitular = round(( $fichacotitularidad * 100/  $contadorcotitular), 2);
        }else{
            $porcentajecotitular=0;
        }
        if($contadorbiencomun!=0)
        {
            $porcentajebiencomun = round(( $fichaebiencomun * 100/  $contadorbiencomun), 2);
        }else{
            $porcentajebiencomun=0;
        }

        $fichaactividades=Ficha::join('tf_autorizaciones_funcionamiento as af','tf_fichas.id_ficha','=','af.id_ficha')
        ->join('tf_actividades as a','af.codi_actividad','=','a.codi_actividad')
        ->select(DB::raw('COUNT(a.codi_actividad) as cantidad'),'a.desc_actividad','a.codi_actividad')
        ->groupBy('a.codi_actividad','a.desc_actividad')->orderBy('cantidad','desc')->take(10)->get();

        $vias = Via::select('tipo_via',DB::raw('COUNT(tipo_via) as total'))->groupBy('tipo_via')->get();

        $maxNiveles = DB::table('tf_construcciones')
        ->select('id_ficha', DB::raw('MAX(nume_piso) as max_nivel'))
        ->groupBy('id_ficha');

        $niveles = DB::table(DB::raw("({$maxNiveles->toSql()}) as MaxNiveles"))
        ->mergeBindings($maxNiveles)
        ->select('max_nivel', DB::raw('COUNT(*) as cantidad_fichas'))
        ->groupBy('max_nivel')
        ->orderByDesc('max_nivel')
        ->get();

        $mepMapping = [
            '01' => ['nombre' => 'Concreto', 'color' => '#68da3e'],
            '02' => ['nombre' => 'Ladrillo', 'color' => '#00c6ab'],
            '03' => ['nombre' => 'Adobe', 'color' => '#6aa3b4'],
            '04' => ['nombre' => 'Fierro', 'color' => '#416864'],
            '05' => ['nombre' => 'Rotoplas', 'color' => '#223026'],
            '06' => ['nombre' => 'Policarbonato', 'color' => '#ebb7ce'],
            '07' => ['nombre' => 'Otros', 'color' => '#b38471']
        ];
        
        $materiales = DB::table('tf_construcciones')
        ->select('nume_piso', 'mep', DB::raw('COUNT(*) as cantidad'))
        ->groupBy('nume_piso', 'mep')
        ->orderBy('nume_piso')
        ->orderBy('mep')
        ->get()
        ->map(function ($item) use ($mepMapping) {
            $item->material = $mepMapping[$item->mep]['nombre'] ?? 'Desconocido';
            $item->color = $mepMapping[$item->mep]['color'] ?? '#000000';
            return $item;
        });
    

        $dataByMaterial = [];
        $uniquePisos = $materiales->pluck('nume_piso')->unique()->sort();
        
        foreach ($materiales as $material) {
            $materialNombre = $material->material;
            if (!isset($dataByMaterial[$materialNombre])) {
                $dataByMaterial[$materialNombre] = [
                    'label' => $materialNombre,
                    'backgroundColor' => $material->color,
                    'data' => []
                ];
            }
            $dataByMaterial[$materialNombre]['data'][$material->nume_piso] = $material->cantidad;
        }
        
        // Llenar pisos faltantes con 0 para cada material
        foreach ($dataByMaterial as &$dataset) {
            foreach ($uniquePisos as $piso) {
                $dataset['data'][$piso] = $dataset['data'][$piso] ?? 0;
            }
            ksort($dataset['data']); // Asegurar orden por piso
            $dataset['data'] = array_values($dataset['data']);
        }

        $escMapping = [
            '01' => ['nombre' => 'Muy Bueno', 'color' => '#68da3e'],
            '02' => ['nombre' => 'Bueno', 'color' => '#00c6ab'],
            '03' => ['nombre' => 'Regular', 'color' => '#6aa3b4'],
            '04' => ['nombre' => 'Malo', 'color' => '#416864'],
        ];
        
        $conservacion = DB::table('tf_construcciones')
        ->select('nume_piso', 'ecs', DB::raw('COUNT(*) as cantidad'))
        ->groupBy('nume_piso', 'ecs')
        ->orderBy('nume_piso')
        ->orderBy('ecs')
        ->get()
        ->map(function ($item) use ($escMapping) {
            $item->material = $escMapping[$item->ecs]['nombre'] ?? 'Desconocido';
            $item->color = $escMapping[$item->ecs]['color'] ?? '#000000';
            return $item;
        });
    

        $dataByConservacion = [];
        $uniquePisosMateriales = $conservacion->pluck('nume_piso')->unique()->sort();
        
        foreach ($conservacion as $conservacio) {
            $materialNombre = $conservacio->material;
            if (!isset($dataByConservacion[$materialNombre])) {
                $dataByConservacion[$materialNombre] = [
                    'label' => $materialNombre,
                    'backgroundColor' => $conservacio->color,
                    'data' => []
                ];
            }
            $dataByConservacion[$materialNombre]['data'][$conservacio->nume_piso] = $conservacio->cantidad;
        }
        
        // Llenar pisos faltantes con 0 para cada material
        foreach ($dataByConservacion as &$dataset) {
            foreach ($uniquePisosMateriales as $piso) {
                $dataset['data'][$piso] = $dataset['data'][$piso] ?? 0;
            }
            ksort($dataset['data']); // Asegurar orden por piso
            $dataset['data'] = array_values($dataset['data']);
        }

        $eccMapping = [
            '01' => ['nombre' => 'Terminado', 'color' => '#68da3e'],
            '02' => ['nombre' => 'En Construccion', 'color' => '#00c6ab'],
            '03' => ['nombre' => 'Inconclusa', 'color' => '#6aa3b4'],
            '04' => ['nombre' => 'En Ruinas', 'color' => '#416864'],
        ];
        
        $construcciones = DB::table('tf_construcciones')
        ->select('nume_piso', 'ecc', DB::raw('COUNT(*) as cantidad'))
        ->groupBy('nume_piso', 'ecc')
        ->orderBy('nume_piso')
        ->orderBy('ecc')
        ->get()
        ->map(function ($item) use ($eccMapping) {
            $item->material = $eccMapping[$item->ecc]['nombre'] ?? 'Desconocido';
            $item->color = $eccMapping[$item->ecc]['color'] ?? '#000000';
            return $item;
        });
    

        $dataByConstrucciones = [];
        $uniquePisosConstruccion = $construcciones->pluck('nume_piso')->unique()->sort();
        
        foreach ($construcciones as $construccion) {
            $materialNombre = $construccion->material;
            if (!isset($dataByConstrucciones[$materialNombre])) {
                $dataByConstrucciones[$materialNombre] = [
                    'label' => $materialNombre,
                    'backgroundColor' => $construccion->color,
                    'data' => []
                ];
            }
            $dataByConstrucciones[$materialNombre]['data'][$construccion->nume_piso] = $construccion->cantidad;
        }
        
        // Llenar pisos faltantes con 0 para cada material
        foreach ($dataByConstrucciones as &$dataset) {
            foreach ($uniquePisosConstruccion as $piso) {
                $dataset['data'][$piso] = $dataset['data'][$piso] ?? 0;
            }
            ksort($dataset['data']); // Asegurar orden por piso
            $dataset['data'] = array_values($dataset['data']);
        }

        
        return view('dashboard',compact('fichaindividual','fichaindividualestado','fichacotitularidad','fichacotitularidadestado','fichaeconomica',
        'fichaeconomicaestado','fichassectores','fichastipo','fichascalificacion','fichaspersona','fichaspersona2','totallotes','totallotessector',
        'porcentajeindividual','porcentajeeconomica','porcentajecotitular','porcentajebiencomun','fichaactividades','vias','niveles','materiales',
        'dataByMaterial','uniquePisos','dataByConservacion','uniquePisosMateriales','dataByConstrucciones','uniquePisosConstruccion'));
    }
}
