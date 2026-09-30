<?php

namespace Tests\Feature;

use App\Models\Ficha;
use App\Models\Puerta;
use App\Services\Certificados\DatosGeograficos;
use App\Services\Certificados\UbicacionNoDisponible;
use App\Services\Certificados\UbicacionPredioService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UbicacionPredioTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['cache.default' => 'array', 'certificados.ubicacion.url' => 'http://mapas.local:81', 'certificados.ubicacion.srid' => 32718]);
        Cache::flush();
        Http::preventStrayRequests();
    }

    private function ficha(array $puertas = []): Ficha
    {
        return (new Ficha)->forceFill(['id_lote' => '08130401023001'])->setRelation('puertas', new Collection($puertas));
    }

    private function lote(): array
    {
        return ['bbox' => ['minx' => 768510, 'miny' => 8544600, 'maxx' => 768540, 'maxy' => 8544620, 'width' => 900, 'height' => 600],
            'filas' => [
                ['vertice' => 'P1', 'lado' => 'P1 - P2', 'distancia' => 3.2, 'angulo' => '90°0\'0"', 'este' => '768541.023', 'norte' => '8544614.943'],
                ['vertice' => 'P2', 'lado' => 'P2 - P1', 'distancia' => 3.2, 'angulo' => '90°0\'0"', 'este' => '768543.023', 'norte' => '8544616.943'],
            ]];
    }

    private function png(): string
    {
        $imagen = imagecreatetruecolor(900, 600);
        ob_start(); imagepng($imagen); $png = ob_get_clean(); imagedestroy($imagen);
        return $png;
    }

    public function test_seleccionar_garaje_cambia_coordenadas_y_cache(): void
    {
        $geo = $this->mock(DatosGeograficos::class);
        $geo->shouldReceive('lote')->twice()->andReturn($this->lote());
        $geo->shouldReceive('puerta')->once()->with('08130401023001', '10')->andReturn(['srid' => 32718, 'este' => 10, 'norte' => 20]);
        $geo->shouldReceive('puerta')->once()->with('08130401023001', '12')->andReturn(['srid' => 32718, 'este' => 12, 'norte' => 22]);
        Http::fake(['*' => Http::response($this->png())]);
        $ficha = $this->ficha([
            (new Puerta)->forceFill(['id_puerta' => 'P1', 'tipo_puerta' => 'P', 'nume_muni' => '10']),
            (new Puerta)->forceFill(['id_puerta' => 'G1', 'tipo_puerta' => 'G', 'nume_muni' => '12']),
        ]);
        $service = app(UbicacionPredioService::class);
        $this->assertSame('10.00', $service->obtener($ficha, 'numeracion', 'P1')['datos']['este']);
        $this->assertSame('12.00', $service->obtener($ficha, 'numeracion', 'G1')['datos']['este']);
        $this->assertSame('12.00', $service->obtener($ficha, 'numeracion', 'G1')['datos']['este']);
        Http::assertSentCount(2);
    }

    public function test_rechaza_puerta_de_otra_ficha_antes_de_consultar_gis(): void
    {
        $this->mock(DatosGeograficos::class)->shouldNotReceive('lote');
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        app(UbicacionPredioService::class)->obtener($this->ficha(), 'numeracion', 'AJENA');
    }

    public function test_pide_capas_bbox_y_tamano_documentados_a_url_configurada_y_conserva_orden_de_vertices(): void
    {
        $geo = $this->mock(DatosGeograficos::class);
        $geo->shouldReceive('lote')->once()->with('08130401023001', true)->andReturn($this->lote());
        $png = $this->png();
        Http::fake(['mapas.local:81/*' => Http::response($png, 200, ['Content-Type' => 'image/png'])]);
        $service = app(UbicacionPredioService::class);
        $resultado = $service->obtener($this->ficha());
        $this->assertSame($png, $resultado['png']);
        $this->assertSame([], $resultado['advertencias']);
        $this->assertStringStartsWith('P1 | P1 - P2 | 3.20 |', $resultado['datos']['coordenadas']);
        $this->assertStringContainsString('768541.023 | 8544614.943', $resultado['datos']['coordenadas']);
        Http::assertSent(function ($request) {
            parse_str(parse_url($request->url(), PHP_URL_QUERY), $params);
            return str_starts_with($request->url(), 'http://mapas.local:81/servicio/wms?')
                && $params['layers'] === UbicacionPredioService::CAPAS
                && $params['styles'] === '' && $params['WIDTH'] === '900' && $params['HEIGHT'] === '600'
                && $params['BBOX'] === '768510,8544600,768540,8544620'
                && $params['SRS'] === 'EPSG:32718' && $params['id'] === '08130401023001';
        });
        $this->assertSame($resultado, $service->obtener($this->ficha()));
        Http::assertSentCount(1);
    }

    public function test_numeracion_usa_punto_de_puerta_principal_y_no_vertices_del_lote(): void
    {
        $geo = $this->mock(DatosGeograficos::class);
        $lote = $this->lote(); $lote['filas'] = [];
        $geo->shouldReceive('lote')->once()->with('08130401023001', false)->andReturn($lote);
        $geo->shouldReceive('puerta')->once()->with('08130401023001', '123')->andReturn(['srid' => 32718, 'este' => 768400.25, 'norte' => 8544500.75]);
        Http::fake(['*' => Http::response($this->png())]);
        $ficha = $this->ficha([(new Puerta)->forceFill(['id_puerta' => 'P123', 'tipo_puerta' => 'P', 'nume_muni' => '123']), (new Puerta)->forceFill(['id_puerta' => 'S456', 'tipo_puerta' => 'S'])]);
        $resultado = app(UbicacionPredioService::class)->obtener($ficha, 'numeracion');
        $this->assertSame(['este' => '768400.25', 'norte' => '8544500.75'], $resultado['datos']);
        $this->assertSame([], $resultado['advertencias']);
        Http::assertSent(function ($request) {
            parse_str(parse_url($request->url(), PHP_URL_QUERY), $params);
            return $params['layers'] === 'etiqueta_lote,nivel_construccion_lote,id_lote,numeracion_puerta'
                && $params['SRS'] === 'EPSG:32718' && $params['id'] === '08130401023001'
                && !isset($params['numero_municipal']);
        });
    }

    public function test_toma_primera_puerta_principal_por_id_cuando_hay_varias(): void
    {
        $geo = $this->mock(DatosGeograficos::class);
        $geo->shouldReceive('lote')->andReturn($this->lote());
        $geo->shouldReceive('puerta')->once()->with('08130401023001', '123')->andReturn(['srid' => 32718, 'este' => 768400.25, 'norte' => 8544500.75]);
        Http::fake(['*' => Http::response($this->png())]);
        $ficha = $this->ficha([
            (new Puerta)->forceFill(['id_puerta' => 'P2', 'tipo_puerta' => 'P', 'nume_muni' => '456']),
            (new Puerta)->forceFill(['id_puerta' => 'P1', 'tipo_puerta' => 'P', 'nume_muni' => '123']),
        ]);
        $resultado = app(UbicacionPredioService::class)->obtener($ficha, 'numeracion');
        $this->assertSame(['este' => '768400.25', 'norte' => '8544500.75'], $resultado['datos']);
        $this->assertNotNull($resultado['png']);
        $this->assertSame([], $resultado['advertencias']);
    }

    public function test_coordenadas_usan_identificador_gis_resuelto_por_la_vista(): void
    {
        $conexion = \Mockery::mock(\Illuminate\Database\Connection::class);
        \Illuminate\Support\Facades\DB::shouldReceive('connection')->with('pgsqlgeo')->andReturn($conexion);
        $conexion->shouldReceive('transaction')->andReturnUsing(fn ($consulta) => $consulta($conexion));
        $conexion->shouldReceive('statement')->with("SET LOCAL statement_timeout = '5000ms'")->andReturn(true);
        $conexion->shouldReceive('select')->once()->with(
            'SELECT id_puerta, nume_muni FROM geo.v_numeracion_puerta WHERE id_lote = :lote ORDER BY id_puerta',
            ['lote' => '08130401023001']
        )->andReturn([(object) ['id_puerta' => '0813040102300101', 'nume_muni' => ' S/N '],
            (object) ['id_puerta' => '0813040102300102', 'nume_muni' => 'S/N']]);
        $conexion->shouldReceive('select')->once()->with(\Mockery::on(fn ($sql) => str_contains($sql, 'ST_SRID(geom)')),
            ['lote' => '08130401023001', 'puerta' => '0813040102300101']
        )->andReturn([(object) ['srid' => 32718]]);
        $conexion->shouldReceive('select')->once()->with(
            'SELECT * FROM geo.fg_obtener_coordenadas_utm(:puerta)', ['puerta' => '0813040102300101']
        )->andReturn([(object) ['este' => 768338.3259, 'norte' => 8544418.8257]]);
        $this->assertSame(['este' => 768338.3259, 'norte' => 8544418.8257, 'srid' => 32718],
            (new DatosGeograficos)->puerta('08130401023001', 's/n'));
    }

    /** @dataProvider numerosSinCorrespondenciaUnica */
    public function test_no_elige_puerta_gis_si_el_numero_no_la_identifica(string $numero, array $numeros): void
    {
        $conexion = \Mockery::mock(\Illuminate\Database\Connection::class);
        \Illuminate\Support\Facades\DB::shouldReceive('connection')->with('pgsqlgeo')->andReturn($conexion);
        $conexion->shouldReceive('transaction')->andReturnUsing(fn ($consulta) => $consulta($conexion));
        $conexion->shouldReceive('statement')->andReturn(true);
        $conexion->shouldReceive('select')->once()->with(
            'SELECT id_puerta, nume_muni FROM geo.v_numeracion_puerta WHERE id_lote = :lote ORDER BY id_puerta',
            ['lote' => '08130401023001']
        )->andReturn(array_map(fn ($valor) => (object) ['id_puerta' => 'gis', 'nume_muni' => $valor], $numeros));
        $this->expectException(UbicacionNoDisponible::class);
        (new DatosGeograficos)->puerta('08130401023001', $numero);
    }

    public static function numerosSinCorrespondenciaUnica(): array
    {
        return [['123', ['456']], ['', [null]], ['123', []]];
    }

    public function test_error_de_puerta_no_impide_obtener_el_plano(): void
    {
        $geo = $this->mock(DatosGeograficos::class);
        $geo->shouldReceive('lote')->andReturn($this->lote());
        $geo->shouldReceive('puerta')->andThrow(new UbicacionNoDisponible('Puerta ambigua.'));
        Http::fake(['*' => Http::response($this->png())]);
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha([
            (new Puerta)->forceFill(['id_puerta' => 'catastro', 'tipo_puerta' => 'P', 'nume_muni' => 'S/N']),
        ]), 'numeracion');
        $this->assertNotNull($resultado['png']);
        $this->assertSame(['Puerta ambigua.'], $resultado['advertencias']);
        $this->assertSame([], $resultado['datos']);
    }

    public function test_muestra_error_bbox_reportado_por_mapserver(): void
    {
        $this->mock(DatosGeograficos::class)->shouldReceive('lote')->andReturn($this->lote());
        Http::fake(['*' => Http::response('<?xml version="1.0"?><!DOCTYPE ServiceExceptionReport SYSTEM "http://schemas.opengis.net/wms/1.1.1/exception_1_1_1.dtd"><ServiceExceptionReport><ServiceException>msWMSLoadGetMapParams(): WMS server error. Invalid values for BBOX.</ServiceException></ServiceExceptionReport>', 400)]);
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha());
        $this->assertNull($resultado['png']);
        $this->assertStringContainsString('Invalid values for BBOX.', $resultado['advertencias'][0]);
    }

    public function test_muestra_estado_http_si_url_no_es_servicio_wms(): void
    {
        $this->mock(DatosGeograficos::class)->shouldReceive('lote')->andReturn($this->lote());
        Http::fake(['*' => Http::response('Not found', 404)]);
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha());
        $this->assertNull($resultado['png']);
        $this->assertStringContainsString('HTTP 404', $resultado['advertencias'][0]);
    }

    public function test_rechaza_xml_de_error_del_wms_y_conserva_el_cuadro_disponible(): void
    {
        $this->mock(DatosGeograficos::class)->shouldReceive('lote')->andReturn($this->lote());
        Http::fake(['*' => Http::response('<ServiceException>Layer not found</ServiceException>', 200)]);
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha());
        $this->assertNull($resultado['png']);
        $this->assertNotEmpty($resultado['datos']['coordenadas']);
        $this->assertCount(1, $resultado['advertencias']);
    }

    public function test_timeout_no_impide_continuar_sin_plano(): void
    {
        $this->mock(DatosGeograficos::class)->shouldReceive('lote')->andReturn($this->lote());
        Http::fake(fn () => throw new ConnectionException('Timeout'));
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha());
        $this->assertNull($resultado['png']);
        $this->assertStringContainsString('no respondió', $resultado['advertencias'][0]);
    }

    public function test_no_pide_imagen_si_la_zona_no_coincide(): void
    {
        $this->mock(DatosGeograficos::class)->shouldReceive('lote')->andThrow(new UbicacionNoDisponible('Zona UTM incorrecta.'));
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha());
        $this->assertNull($resultado['png']);
        $this->assertSame([], $resultado['datos']);
        Http::assertNothingSent();
    }

    public function test_rechaza_bbox_deformado_sin_hacer_peticion(): void
    {
        $lote = $this->lote(); $lote['bbox']['height'] = 900;
        $this->mock(DatosGeograficos::class)->shouldReceive('lote')->andReturn($lote);
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha());
        $this->assertNull($resultado['png']);
        $this->assertStringContainsString('proporción', $resultado['advertencias'][0]);
        Http::assertNothingSent();
    }
    public function test_numeracion_no_consulta_funcion_de_vertices_en_pgsqlgeo(): void
    {
        $conexion = \Mockery::mock(\Illuminate\Database\Connection::class);
        \Illuminate\Support\Facades\DB::shouldReceive('connection')->once()->with('pgsqlgeo')->andReturn($conexion);
        $conexion->shouldReceive('transaction')->once()->andReturnUsing(fn ($consulta) => $consulta($conexion));
        $conexion->shouldReceive('statement')->once()->with("SET LOCAL statement_timeout = '5000ms'")->andReturn(true);
        $conexion->shouldReceive('select')->once()->with(
            'SELECT ST_SRID(geom) AS srid FROM geo.tg_lote WHERE id_lote = :id AND geom IS NOT NULL',
            ['id' => '08130401023001']
        )->andReturn([(object) ['srid' => 32718]]);
        $conexion->shouldReceive('select')->once()->with(
            'SELECT * FROM geo.fg_obtener_bbox_lote(:id)', ['id' => '08130401023001']
        )->andReturn([(object) $this->lote()['bbox']]);
        $resultado = (new DatosGeograficos)->lote('08130401023001', false);
        $this->assertSame($this->lote()['bbox'], $resultado['bbox']);
        $this->assertSame([], $resultado['filas']);
    }

    public function test_cache_separa_plano_catastral_y_plano_de_numeracion(): void
    {
        $geo = $this->mock(DatosGeograficos::class);
        $geo->shouldReceive('lote')->once()->with('08130401023001', true)->andReturn($this->lote());
        $geo->shouldReceive('lote')->once()->with('08130401023001', false)->andReturn($this->lote());
        $png = $this->png();
        Http::fake(['*' => Http::response($png)]);
        $service = app(UbicacionPredioService::class);
        $service->obtener($this->ficha(), 'catastral');
        $service->obtener($this->ficha(), 'numeracion');
        $service->obtener($this->ficha(), 'numeracion');
        Http::assertSentCount(2);
        foreach ([UbicacionPredioService::CAPAS, UbicacionPredioService::CAPAS_NUMERACION] as $capas) {
            Http::assertSent(function ($request) use ($capas) {
                parse_str(parse_url($request->url(), PHP_URL_QUERY), $params);
                return $params['layers'] === $capas;
            });
        }
    }

    public function test_conexion_geografica_rechazada_no_bloquea_emision(): void
    {
        $this->mock(DatosGeograficos::class)->shouldReceive('lote')->andThrow(new \PDOException('Connection refused'));
        $resultado = app(UbicacionPredioService::class)->obtener($this->ficha());
        $this->assertNull($resultado['png']);
        $this->assertNotEmpty($resultado['advertencias']);
        Http::assertNothingSent();
    }

}
