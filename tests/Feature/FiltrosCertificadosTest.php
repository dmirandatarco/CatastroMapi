<?php

namespace Tests\Feature;

use App\Http\Requests\FiltroCertificadosRequest;
use App\Models\Ficha;
use App\Models\GenerarCertificado;
use App\Models\GenerarNumeracion;
use App\Services\Certificados\ConsultaCertificados;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class FiltrosCertificadosTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        foreach ([
            'tf_sectores' => ['id_sector','codi_sector','nomb_sector'],
            'tf_manzanas' => ['id_mzna','id_sector','codi_mzna'],
            'tf_lotes' => ['id_lote','id_mzna','codi_lote'],
            'tf_fichas' => ['id_ficha','id_lote','nume_ficha','tipo_ficha','activo'],
            'generar_certificados' => ['id','id_ficha'],
            'generar_numeracions' => ['id','id_ficha'],
        ] as $table => $columns) {
            Schema::create($table, function (Blueprint $schema) use ($columns) {
                foreach ($columns as $column) { $schema->string($column)->default('1'); }
            });
        }
        foreach ([1,2] as $i) {
            DB::table('tf_sectores')->insert(['id_sector'=>(string)$i,'codi_sector'=>'0'.$i,'nomb_sector'=>'SECTOR '.$i]);
            DB::table('tf_manzanas')->insert(['id_mzna'=>'10'.$i,'id_sector'=>(string)$i,'codi_mzna'=>'001']);
            DB::table('tf_lotes')->insert(['id_lote'=>'20'.$i,'id_mzna'=>'10'.$i,'codi_lote'=>'001']);
            DB::table('tf_fichas')->insert(['id_ficha'=>'F'.$i,'id_lote'=>'20'.$i,'nume_ficha'=>'000000'.$i,'tipo_ficha'=>'01']);
            foreach (['generar_certificados','generar_numeracions'] as $table) {
                DB::table($table)->insert(['id'=>(string)$i,'id_ficha'=>'F'.$i]);
            }
        }
    }

    public function test_busqueda_sin_sector_y_filtros_combinados_en_ambos_historiales(): void
    {
        foreach ([Ficha::class,GenerarCertificado::class,GenerarNumeracion::class] as $model) {
            $historial = $model !== Ficha::class;
            $service = new ConsultaCertificados;
            foreach ([['buscarFicha'=>'2'],['buscarSector'=>'0','buscarManzana'=>'0','buscarFicha'=>'2'],['buscarSector'=>'2','buscarManzana'=>'102'],['buscarManzana'=>'102']] as $filtros) {
                $this->assertSame(['F2'], $service->filtrar($model::query(),$filtros,$historial)->pluck('id_ficha')->all());
            }
            $this->assertSame(2,$service->filtrar($model::query(),['buscarSector'=>'0','buscarManzana'=>'0'],$historial)->count());
            $this->assertSame(0,$service->filtrar($model::query(),['buscarSector'=>'1','buscarManzana'=>'102'],$historial)->count());
        }
    }

    public function test_valida_manzana_del_sector_y_rechaza_filtros_invalidos(): void
    {
        foreach ([['buscarSector'=>'1','buscarManzana'=>'102'],['buscarFicha'=>'abcdef'],['buscarFicha'=>'12345678'],['buscarSector'=>['1']]] as $datos) {
            $request=FiltroCertificadosRequest::create('/', 'GET', $datos);
            $this->assertTrue(Validator::make($datos,$request->rules())->fails());
        }
        foreach ([['buscarFicha'=>'2'],['buscarSector'=>'0','buscarManzana'=>'0'],['buscarSector'=>'2','buscarManzana'=>'102']] as $datos) {
            $request=FiltroCertificadosRequest::create('/', 'GET', $datos);
            $this->assertTrue(Validator::make($datos,$request->rules())->passes());
        }
    }

    public function test_listas_paginadas_excluyen_fichas_de_otro_tipo(): void
    {
        DB::table('tf_fichas')->insert(['id_ficha'=>'C1','id_lote'=>'201','nume_ficha'=>'0000003','tipo_ficha'=>'02']);
        foreach (['catastral','numeracion'] as $tipo) {
            $lista=(new ConsultaCertificados)->listado($tipo,false,[]);
            $this->assertSame(2,$lista['registros']->total());
            $this->assertSame(25,$lista['registros']->perPage());
        }
    }

    public function test_filtra_lote_con_ceros_en_seleccion_y_ambos_historiales(): void
    {
        DB::table('tf_lotes')->where('id_lote', '202')->update(['codi_lote' => '004']);
        foreach ([Ficha::class, GenerarCertificado::class, GenerarNumeracion::class] as $model) {
            foreach (['4', '04', '004'] as $lote) {
                $consulta = (new ConsultaCertificados)->filtrar($model::query(), [
                    'buscarSector' => '2', 'buscarManzana' => '102', 'buscarLote' => $lote, 'buscarFicha' => '2',
                ], $model !== Ficha::class);
                $this->assertSame(['F2'], $consulta->pluck('id_ficha')->all());
            }
        }
        foreach (['1234', 'abc', ['4']] as $lote) {
            $datos = ['buscarLote' => $lote];
            $request = FiltroCertificadosRequest::create('/', 'GET', $datos);
            $this->assertTrue(Validator::make($datos, $request->rules())->fails());
        }
    }

    public function test_todas_las_pestanas_de_impresion_filtran_por_lote(): void
    {
        $controller = new \App\Http\Controllers\ReporteController;
        foreach (['verficha' => '01', 'verfichacotitular' => '02', 'verfichaeconomicas' => '03',
            'verfichabc' => '04', 'verfichainformativa' => '01', 'vercertificado' => '01',
            'veradministracion' => '01', 'verinformativaeconomica' => '03', 'vercnumeracion' => '01'] as $metodo => $tipo) {
            DB::table('tf_fichas')->update(['tipo_ficha' => $tipo]);
            DB::table('tf_lotes')->where('id_lote', '202')->update(['codi_lote' => '004']);
            foreach (['4', '04', '004'] as $numero) {
                $request = \Illuminate\Http\Request::create('/', 'GET', ['buscarLote' => $numero]);
                $vista = $controller->$metodo($request);
                $this->assertSame(['F2'], $vista->getData()['ficha']->pluck('id_ficha')->all(), $metodo);
                $this->assertSame('004', $request->input('buscarLote'));
            }
            $request = \Illuminate\Http\Request::create('/', 'GET', ['buscarSector' => '1', 'buscarManzana' => '101', 'buscarLote' => '4']);
            $this->assertCount(0, $controller->$metodo($request)->getData()['ficha'], $metodo);
        }
    }

    public function test_lote_solo_no_se_descarta_en_creacion_de_fichas_relacionadas(): void
    {
        DB::table('tf_lotes')->where('id_lote', '202')->update(['codi_lote' => '004']);
        foreach ([
            [\App\Http\Controllers\FichaBienComunController::class, 'indexbiencomun'],
            [\App\Http\Controllers\FichaBienCulturalController::class, 'indexbiencultural'],
            [\App\Http\Controllers\FichaCotitularidadController::class, 'indexcotitular'],
            [\App\Http\Controllers\FichaEconomicaController::class, 'indexeconomica'],
            [\App\Http\Controllers\ImagenesController::class, 'ver'],
        ] as [$clase, $metodo]) {
            $request = \Illuminate\Http\Request::create('/', 'GET', ['buscarLote' => '4']);
            $this->assertSame(['F2'], (new $clase)->$metodo($request)->getData()['ficha']->pluck('id_ficha')->all(), $clase);
        }
    }

    public function test_filtro_lote_compartido_rechaza_valores_invalidos_y_permite_vacio(): void
    {
        foreach (['1234', 'abc', ['4']] as $valor) {
            try {
                \App\Services\FiltroLote::numero(\Illuminate\Http\Request::create('/', 'GET', ['buscarLote' => $valor]));
                $this->fail('Se aceptó un lote inválido.');
            } catch (\Illuminate\Validation\ValidationException $error) {
                $this->assertArrayHasKey('buscarLote', $error->errors());
            }
        }
        $this->assertSame(2, \App\Services\FiltroLote::aplicar(Ficha::query(), \Illuminate\Http\Request::create('/'))->count());
    }
}
