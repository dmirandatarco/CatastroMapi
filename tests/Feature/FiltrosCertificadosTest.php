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
            'tf_fichas' => ['id_ficha','id_lote','nume_ficha','tipo_ficha'],
            'generar_certificados' => ['id','id_ficha'],
            'generar_numeracions' => ['id','id_ficha'],
        ] as $table => $columns) {
            Schema::create($table, function (Blueprint $schema) use ($columns) {
                foreach ($columns as $column) { $schema->string($column); }
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
}
