<?php

namespace Tests\Feature;

use App\Models\Ficha;
use App\Models\FichaIndividual;
use App\Models\GenerarNumeracion;
use App\Services\Certificados\CamposCertificado;
use App\Services\Certificados\CertificadoPdf;
use App\Services\Certificados\EmisionCertificadoService;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class CertificadosTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite', 'database.connections.sqlite.database' => ':memory:']);
        DB::purge('sqlite');
        Storage::fake('local');
        $this->mock(\App\Services\Certificados\UbicacionPredioService::class, fn ($mock) => $mock->shouldReceive('obtener')->andReturn([
            'png' => null, 'datos' => [], 'advertencias' => ['Servicio no disponible en la prueba.'], 'consultado_en' => '2026-09-30T12:00:00Z',
        ]));
        Schema::create('tf_fichas', function (Blueprint $table) {
            $table->string('id_ficha')->primary();
            $table->string('id_lote')->nullable();
            $table->string('id_uni_cat');
            $table->string('dc')->nullable();
        });
        Schema::create('tf_fichas_individuales', function (Blueprint $table) {
            $table->string('id_ficha')->primary();
            $table->string('codi_uso');
            $table->string('imagen_lote')->nullable();
            $table->string('imagen_plano')->nullable();
        });
        foreach (['generar_certificados', 'generar_numeracions'] as $name) {
            Schema::create($name, function (Blueprint $table) {
                $table->id();
                foreach (['id_ficha', 'id_uni_cat', 'dc', 'codi_uso', 'fecha_emision', 'id_usuario', 'observaciones', 'nombresolicitud', 'area_verificada'] as $column) {
                    $table->text($column)->nullable();
                }
            });
        }
        (require database_path('migrations/2026_09_30_000001_add_documento_to_certificados.php'))->up();
        (require database_path('migrations/2026_09_30_000002_create_correlativos_catastrales.php'))->up();
        (require database_path('migrations/2026_09_30_000003_create_correlativos_numeracion.php'))->up();
        $automaticos = $this->datos('numeracion');
        $automaticos['este'] = $automaticos['norte'] = '';
        $this->mock(\App\Services\Certificados\DatosNumeracion::class, fn ($mock) => $mock->shouldReceive('desdeFicha')->andReturn($automaticos));
    }

    private function ficha(): Ficha
    {
        DB::table('tf_fichas')->insert(['id_ficha' => 'F1', 'id_uni_cat' => 'U1', 'id_lote' => '08130401023001']);
        DB::table('tf_fichas_individuales')->insert(['id_ficha' => 'F1', 'codi_uso' => '010101', 'imagen_lote' => 'foto.png', 'imagen_plano' => 'plano.png']);
        foreach (['imageneslotes/foto.png', 'imagenesplanos/plano.png'] as $path) {
            Storage::disk('local')->put('img/'.$path, file_get_contents(public_path('img/certificados/marca.png')));
        }
        return Ficha::findOrFail('F1');
    }

    public function test_guarda_puerta_elegida_en_historial_y_la_envia_al_servicio_geografico(): void
    {
        $ficha = $this->ficha();
        Schema::create('tf_puertas', function (Blueprint $table) {
            $table->string('id_puerta')->primary(); $table->string('tipo_puerta'); $table->string('nume_muni');
        });
        Schema::create('tf_ingresos', function (Blueprint $table) {
            $table->string('id_ficha'); $table->string('id_puerta');
        });
        DB::table('tf_puertas')->insert(['id_puerta' => 'G1', 'tipo_puerta' => 'G', 'nume_muni' => '44']);
        DB::table('tf_ingresos')->insert(['id_ficha' => 'F1', 'id_puerta' => 'G1']);
        $automaticos = array_replace($this->datos('numeracion'), ['id_puerta' => 'G1', 'tipo_puerta' => '(G) GARAJE', 'direccion' => 'CALLE DEL GARAJE N.º 44']);
        $this->mock(\App\Services\Certificados\DatosNumeracion::class)->shouldReceive('desdeFicha')->once()
            ->with(\Mockery::type(Ficha::class), 'G1')->andReturn($automaticos);
        $this->mock(\App\Services\Certificados\UbicacionPredioService::class)->shouldReceive('obtener')->once()
            ->with(\Mockery::type(Ficha::class), 'numeracion', 'G1')->andReturn([
                'png' => null, 'datos' => ['este' => '12.00', 'norte' => '22.00'], 'advertencias' => [], 'consultado_en' => now()->toIso8601String(),
            ]);
        $record = app(EmisionCertificadoService::class)->emit($ficha, 'numeracion', $this->datos('numeracion'), 1,
            ['foto' => \Illuminate\Http\UploadedFile::fake()->image('puerta.png')], 'G1');
        $snapshot = $record->fresh()->documento['datos'];
        $this->assertSame('G1', $snapshot['id_puerta']);
        $this->assertSame('(G) GARAJE', $snapshot['tipo_puerta']);
        $this->assertSame('CALLE DEL GARAJE N.º 44', $snapshot['direccion']);
        $this->assertSame('12.00', $snapshot['este']);
    }

    private function datos(string $tipo): array
    {
        $datos = array_fill_keys(array_keys(CamposCertificado::definitions($tipo)), '');
        return array_replace($datos, [
            'numero' => 'PRUEBA-001-2026', 'fecha' => '2026-09-30', 'solicitante' => 'SOLICITANTE DE PRUEBA',
            'direccion' => 'CA. YAHUAR HUACA', 'ubigeo' => '081304', 'sector' => '01', 'manzana' => '018', 'lote' => '008',
            'recibo' => '001-000001', 'fecha_recibo' => '2026-09-29', 'observaciones' => 'Emisión de prueba local.',
        ], $tipo === 'numeracion' ? [
            'titulares' => 'TITULAR DE LA FICHA', 'fut' => '000257', 'expediente' => '2694', 'propietario' => '100.00', 'copropietario' => '',
            'numero_municipal' => '207', 'via' => 'CA. YAHUAR HUACA', 'tipo_numero' => '(E) EXTERNO',
            'tipo_puerta' => '(P) PRINCIPAL', 'tipo_numeracion' => 'AUTOASIGNADA', 'estado_numeracion' => '(T) TEMPORAL',
            'cuadra' => '2', 'este' => '768393.4925', 'norte' => '8544520.4954', 'lado' => '(1) IMPAR, LADO IZQUIERDO', 'monto_recibo' => '86.00',
        ] : [
            'naturaleza' => 'Predio urbano',
            'observaciones' => str_repeat('Se deja constancia de los antecedentes del predio y de la documentación presentada para la emisión del certificado. ', 4),
            'titulares' => "PRIMER TITULAR DE PRUEBA\nSEGUNDO TITULAR DE PRUEBA", 'area' => '254.92', 'perimetro' => '65.38',
            'coordenadas' => implode("\n", array_map(fn ($i) => "P$i | P$i-P".($i + 1)." | 1.46 | 179°59'59 | 768533.990 | 8544609.482", range(1, 8))),
            'sistema_coordenadas' => 'UTM WGS 84 - ZONA 18S',
            'leyenda_foto' => 'Registro fotográfico del predio de prueba.', 'leyenda_plano' => 'Plano del predio de prueba.',
        ]);
    }

    public function test_emision_preserva_datos_e_imagenes_aunque_cambie_la_ficha(): void
    {
        $ficha = $this->ficha();
        $record = app(EmisionCertificadoService::class)->emit($ficha, 'numeracion', $this->datos('numeracion'), 1, $this->foto());
        $path = $record->documento['imagenes']['foto'];
        $original = Storage::disk('local')->get($path);
        DB::table('tf_fichas_individuales')->update(['imagen_lote' => null]);
        Storage::disk('local')->delete('img/imageneslotes/foto.png');
        $this->assertSame($original, Storage::disk('local')->get($path));
        $this->assertSame('207', $record->fresh()->documento['datos']['numero_municipal']);
        $this->assertSame('', $record->fresh()->documento['datos']['este']);
        $this->assertArrayNotHasKey('plano', $record->documento['imagenes']);
        $this->assertStringContainsString('SOLICITANTE DE PRUEBA', $record->documento['datos']['observaciones']);
        $this->assertSame('F1', $record->id_ficha);
    }

    public function test_no_se_repite_el_numero_de_certificado(): void
    {
        $ficha = $this->ficha();
        $service = app(EmisionCertificadoService::class);
        $service->emit($ficha, 'numeracion', $this->datos('numeracion'), 1, $this->foto());
        $segundo = $service->emit($ficha, 'numeracion', $this->datos('numeracion'), 1, $this->foto());
        $this->assertSame('002-2026', $segundo->numero_documento);
        $this->assertSame(2, GenerarNumeracion::count());
        $this->assertCount(2, Storage::disk('local')->files('certificados'));
    }

    private function foto(): array
    {
        return ['foto' => new \Illuminate\Http\UploadedFile(public_path('img/certificados/marca.png'), 'puerta.png', 'image/png', null, true)];
    }

    public function test_falta_de_foto_impide_emision_sin_consumir_correlativo(): void
    {
        $ficha = $this->ficha();
        try {
            app(EmisionCertificadoService::class)->emit($ficha, 'numeracion', $this->datos('numeracion'), 1);
            $this->fail('Debe solicitar la fotografía de puerta.');
        } catch (ValidationException $exception) {
            $this->assertArrayHasKey('foto', $exception->errors());
        }
        $this->assertSame(0, GenerarNumeracion::count());
        $record = app(EmisionCertificadoService::class)->emit($ficha, 'numeracion', $this->datos('numeracion'), 1, $this->foto());
        $this->assertSame('001-2026', $record->numero_documento);
    }

    public function test_valida_coordenadas_y_campos_obligatorios(): void
    {
        $datos = $this->datos('catastral');
        $datos['coordenadas'] = 'P1 | fila incompleta';
        $datos['recibo'] = '';
        $validator = Validator::make(['datos' => $datos], CamposCertificado::rules('catastral'));
        $this->assertTrue($validator->fails());
        $this->assertTrue($validator->errors()->has('datos.coordenadas'));
        $this->assertTrue($validator->errors()->has('datos.recibo'));
    }

    public function test_autocompleta_todos_los_cotitulares_y_no_asume_una_puerta(): void
    {
        $sector = (new \App\Models\Sectore)->forceFill(['codi_sector' => '01']);
        $manzana = (new \App\Models\Manzana)->forceFill(['codi_mzna' => '023'])->setRelation('sectore', $sector);
        $lote = (new \App\Models\Lote)->forceFill(['codi_lote' => '001'])->setRelation('manzana', $manzana);
        $titulares = collect(['PRIMER TITULAR', 'SEGUNDO TITULAR', 'TERCER TITULAR'])->map(function ($nombre) {
            return (new \App\Models\Titular)->setRelation('persona', (new \App\Models\Persona)->forceFill(['nombres' => $nombre]));
        });
        $ficha = (new Ficha)->forceFill(['id_lote' => '08130401023001']);
        $ficha->setRelation('fichaindividual', (new FichaIndividual)->forceFill(['area_verificada' => '254.92']));
        $ficha->setRelation('lote', $lote)->setRelation('titulars', new \Illuminate\Database\Eloquent\Collection($titulares));
        $ficha->setRelation('lindero', null)->setRelation('cotitularesRelacionados', new \Illuminate\Database\Eloquent\Collection);
        $ficha->setRelation('puertas', new \Illuminate\Database\Eloquent\Collection([
            (new \App\Models\Puerta)->setRelation('via', null),
            (new \App\Models\Puerta)->setRelation('via', null),
        ]));
        $datos = app(EmisionCertificadoService::class)->defaults($ficha, 'catastral');
        $this->assertSame("PRIMER TITULAR\nSEGUNDO TITULAR\nTERCER TITULAR", $datos['titulares']);
        $this->assertSame('254.92', $datos['area']);
        $this->assertSame('081304', $datos['ubigeo']);
        $this->assertSame('', $datos['direccion']);
        $this->assertSame('', $datos['solicitante']);

        $cotitular = (new \App\Models\Titular)->setRelation('persona', (new \App\Models\Persona)->forceFill(['nombres' => 'COTITULAR VINCULADO']));
        $anexo = (new Ficha)->setRelation('titulars', new \Illuminate\Database\Eloquent\Collection([$cotitular]));
        $ficha->setRelation('cotitularesRelacionados', new \Illuminate\Database\Eloquent\Collection([$anexo]));
        $secundaria = (new \App\Models\Puerta)->forceFill(['id_puerta' => 'S1', 'tipo_puerta' => 'S', 'nume_muni' => '99', 'cond_nume' => '02'])
            ->setRelation('via', (new \App\Models\Via)->forceFill(['tipo_via' => 'CA.', 'nomb_via' => 'SECUNDARIA']));
        $principal = (new \App\Models\Puerta)->forceFill(['tipo_puerta' => 'P', 'nume_muni' => '207'])
            ->setRelation('via', (new \App\Models\Via)->forceFill(['tipo_via' => 'CA.', 'nomb_via' => 'PRINCIPAL']));
        $ficha->setRelation('puertas', new \Illuminate\Database\Eloquent\Collection([$secundaria, $principal]));
        $datos = app(EmisionCertificadoService::class)->defaults($ficha, 'catastral');
        Schema::create('tf_tablas_codigos', function (Blueprint $table) {
            $table->string('id_tabla'); $table->string('codigo'); $table->string('desc_codigo');
        });
        DB::table('tf_tablas_codigos')->insert(['id_tabla' => 'CNP', 'codigo' => '02', 'desc_codigo' => 'AUTOGENERADO POR EL TITULAR CAT.']);
        $principal->cond_nume = '02';
        $numeracion = (new \App\Services\Certificados\DatosNumeracion)->desdeFicha($ficha);
        $this->assertSame('COTITULAR VINCULADO', $numeracion['titulares']);
        $this->assertSame('CA. PRINCIPAL N.º 207', $numeracion['direccion']);
        $this->assertSame('AUTOGENERADO POR EL TITULAR CAT.', $numeracion['tipo_numeracion']);
        $this->assertSame('', $numeracion['numero_municipal']);
        $this->assertSame('', $numeracion['este']);
        $elegida = (new \App\Services\Certificados\DatosNumeracion)->desdeFicha($ficha, 'S1');
        $this->assertSame('S1', $elegida['id_puerta']);
        $this->assertSame('CA. SECUNDARIA N.º 99', $elegida['direccion']);
        $this->assertSame('(S) SECUNDARIO', $elegida['tipo_puerta']);
        $this->assertSame('AUTOGENERADO POR EL TITULAR CAT.', $elegida['tipo_numeracion']);
        $this->assertSame('COTITULAR VINCULADO', $datos['titulares']);
        $this->assertSame('CA. PRINCIPAL N.º 207', $datos['direccion']);
        $this->assertSame('Mediante Resolución N.° 014-89-CDM-A del año 1989 se adjudicó a doña Martha Victoria Moreano Herencia la Manzana N.° M-20, con un área de 128.00 m² y un perímetro de 32.00 ml. Asimismo, mediante Escritura Pública de Anticipo de Legítima N.° 1295 2025, se otorgó el predio a favor de: COTITULAR VINCULADO', $datos['observaciones']);
    }

    public function test_los_dos_modelos_generan_pdf_desde_la_copia_guardada(): void
    {
        $ficha = $this->ficha();
        foreach (['numeracion', 'catastral'] as $tipo) {
            if ($tipo === 'catastral') {
                $this->mock(\App\Services\Certificados\DatosCatastrales::class, function ($mock) {
                    $mock->shouldReceive('desdeFicha')->andReturn($this->datos('catastral'));
                });
            }
            $record = app(EmisionCertificadoService::class)->emit($ficha, $tipo, $this->datos($tipo), 1, $this->foto());
            $pdf = app(CertificadoPdf::class)->content($record);
            $this->assertStringStartsWith('%PDF-', $pdf);
            Storage::disk('local')->put('previews/prueba-'.$tipo.'.pdf', $pdf);
            $this->assertSame(1, preg_match_all('/\/Type\s*\/Page\b/', $pdf), $tipo);
        }
    }

    public function test_perimetro_suma_todos_los_tramos_sin_usar_colindantes_o_titulos(): void
    {
        $lindero = (new \App\Models\Lindero)->forceFill([
            'fren_campo' => '2.25; 1.25', 'dere_campo' => '10.50',
            'izqu_campo' => '3,25; 4.75', 'fond_campo' => '8.00; 2.00',
            'fren_titulo' => '999', 'fren_colinda_campo' => 'LOTE 008',
        ]);
        $service = new \App\Services\Certificados\DatosCatastrales;
        $this->assertSame('32.00', $service->perimetro($lindero));
        $lindero->fond_campo = 'SIN MEDIDA';
        $this->assertNull($service->perimetro($lindero));
    }

    public function test_catastral_recalcula_automaticos_y_asigna_correlativo_sin_confiar_en_cliente(): void
    {
        $ficha = $this->ficha();
        $automaticos = $this->datos('catastral');
        $this->mock(\App\Services\Certificados\DatosCatastrales::class, function ($mock) use ($automaticos) {
            $mock->shouldReceive('desdeFicha')->andReturn($automaticos);
        });
        $datos = $automaticos;
        $datos['numero'] = 'NUMERO-MANIPULADO';
        $datos['area'] = '99999';
        $datos['titulares'] = 'TITULAR MANIPULADO';
        $datos['sistema_coordenadas'] = 'ZONA 19';
        $service = app(EmisionCertificadoService::class);
        $primero = $service->emit($ficha, 'catastral', $datos, 1);
        $segundo = $service->emit($ficha, 'catastral', $datos, 1);
        $this->assertSame('01-2026-UCDUR-MDM', $primero->numero_documento);
        $this->assertSame('02-2026-UCDUR-MDM', $segundo->numero_documento);
        $this->assertSame('254.92', $primero->documento['datos']['area']);
        $this->assertSame($automaticos['titulares'], $primero->documento['datos']['titulares']);
        $this->assertSame('UTM WGS 84 - ZONA 18S', $primero->documento['datos']['sistema_coordenadas']);
    }

    public function test_el_correlativo_continua_los_certificados_existentes_y_no_se_consume_al_fallar(): void
    {
        $ficha = $this->ficha();
        $automaticos = $this->datos('catastral');
        $this->mock(\App\Services\Certificados\DatosCatastrales::class, fn ($mock) => $mock->shouldReceive('desdeFicha')->andReturn($automaticos));
        DB::table('generar_certificados')->insert(['numero_documento' => '05-2026-UCDUR-MDM', 'fecha_emision' => '2026-01-01']);
        DB::table('tf_fichas_individuales')->update(['imagen_lote' => null]);
        try {
            app(EmisionCertificadoService::class)->emit($ficha, 'catastral', $automaticos, 1);
            $this->fail('La falta de fotografía debe impedir la emisión.');
        } catch (ValidationException $exception) {
            $this->assertArrayHasKey('foto', $exception->errors());
        }
        DB::table('tf_fichas_individuales')->update(['imagen_lote' => 'foto.png']);
        $record = app(EmisionCertificadoService::class)->emit($ficha, 'catastral', $automaticos, 1);
        $this->assertSame('06-2026-UCDUR-MDM', $record->numero_documento);
    }

    public function test_catastral_se_guarda_y_genera_pdf_sin_plano(): void
    {
        $ficha = $this->ficha();
        $automaticos = $this->datos('catastral');
        $this->mock(\App\Services\Certificados\DatosCatastrales::class, fn ($mock) => $mock->shouldReceive('desdeFicha')->andReturn($automaticos));
        DB::table('tf_fichas_individuales')->update(['imagen_plano' => null]);
        $record = app(EmisionCertificadoService::class)->emit($ficha, 'catastral', $automaticos, 1);
        $this->assertArrayNotHasKey('plano', $record->documento['imagenes']);
        $this->assertArrayHasKey('foto', $record->documento['imagenes']);
        $pdf = app(CertificadoPdf::class)->content($record);
        $this->assertStringStartsWith('%PDF-', $pdf);
        $this->assertSame(1, preg_match_all('/\/Type\s*\/Page\b/', $pdf));
        Storage::disk('local')->put('previews/catastral-sin-plano.pdf', $pdf);
    }
    public function test_archiva_plano_y_coordenadas_sin_volver_a_consultar_al_imprimir(): void
    {
        $ficha = $this->ficha();
        $plano = file_get_contents(public_path('img/certificados/marca.png'));
        $this->mock(\App\Services\Certificados\UbicacionPredioService::class, fn ($mock) => $mock->shouldReceive('obtener')->once()->andReturn([
            'png' => $plano, 'datos' => ['este' => '768393.49', 'norte' => '8544520.50'],
            'advertencias' => [], 'consultado_en' => '2026-09-30T12:00:00Z',
        ]));
        $record = app(EmisionCertificadoService::class)->emit($ficha, 'numeracion', $this->datos('numeracion'), 1, $this->foto());
        $this->assertSame($plano, Storage::disk('local')->get($record->documento['imagenes']['plano']));
        $this->assertSame('768393.49', $record->documento['datos']['este']);
        $this->assertSame([], $record->documento['geografia']['advertencias']);
        $this->assertStringStartsWith('%PDF-', app(CertificadoPdf::class)->content($record->fresh()));
    }

    public function test_elimina_plano_archivado_si_la_emision_falla(): void
    {
        $ficha = $this->ficha();
        $this->mock(\App\Services\Certificados\DatosCatastrales::class, fn ($mock) => $mock->shouldReceive('desdeFicha')->andReturn($this->datos('catastral')));
        $this->mock(\App\Services\Certificados\UbicacionPredioService::class, fn ($mock) => $mock->shouldReceive('obtener')->andReturn([
            'png' => file_get_contents(public_path('img/certificados/marca.png')), 'datos' => [],
            'advertencias' => [], 'consultado_en' => '2026-09-30T12:00:00Z',
        ]));
        DB::table('tf_fichas_individuales')->update(['imagen_lote' => null]);
        try {
            app(EmisionCertificadoService::class)->emit($ficha, 'catastral', $this->datos('catastral'), 1);
            $this->fail('Debe fallar sin fotografía de la ficha.');
        } catch (ValidationException $exception) {
            $this->assertArrayHasKey('foto', $exception->errors());
        }
        $this->assertSame([], Storage::disk('local')->files('certificados'));
        $this->assertSame(0, DB::table('correlativos_catastrales')->count());
    }

    public function test_pdf_catastral_con_plano_y_cuadro_del_servicio(): void
    {
        $ficha = $this->ficha();
        $automaticos = $this->datos('catastral');
        $this->mock(\App\Services\Certificados\DatosCatastrales::class, fn ($mock) => $mock->shouldReceive('desdeFicha')->andReturn($automaticos));
        $this->mock(\App\Services\Certificados\UbicacionPredioService::class, fn ($mock) => $mock->shouldReceive('obtener')->andReturn([
            'png' => file_get_contents(public_path('img/certificados/marca.png')),
            'datos' => ['coordenadas' => $automaticos['coordenadas']],
            'advertencias' => [], 'consultado_en' => '2026-09-30T12:00:00Z',
        ]));
        $record = app(EmisionCertificadoService::class)->emit($ficha, 'catastral', $automaticos, 1);
        $this->assertSame($automaticos['coordenadas'], $record->documento['datos']['coordenadas']);
        $pdf = app(CertificadoPdf::class)->content($record);
        $this->assertSame(1, preg_match_all('/\/Type\s*\/Page\b/', $pdf));
        Storage::disk('local')->put('previews/catastral-con-servicio.pdf', $pdf);
    }

    public function test_guarda_certificado_aunque_pgsqlgeo_rechace_conexion(): void
    {
        config(['cache.default' => 'array']);
        \Illuminate\Support\Facades\Cache::flush();
        $this->app->forgetInstance(\App\Services\Certificados\UbicacionPredioService::class);
        $this->mock(\App\Services\Certificados\DatosGeograficos::class, fn ($mock) => $mock->shouldReceive('lote')->andThrow(new \PDOException('Connection refused')));
        $automaticos = $this->datos('catastral');
        $this->mock(\App\Services\Certificados\DatosCatastrales::class, fn ($mock) => $mock->shouldReceive('desdeFicha')->andReturn($automaticos));
        $record = app(EmisionCertificadoService::class)->emit($this->ficha(), 'catastral', $automaticos, 1);
        $this->assertTrue($record->exists);
        $this->assertSame('01-2026-UCDUR-MDM', $record->numero_documento);
        $this->assertArrayNotHasKey('plano', $record->documento['imagenes']);
        $this->assertNotEmpty($record->fresh()->documento['geografia']['advertencias']);
    }

    public function test_repite_certificado_completo_cada_diez_coordenadas(): void
    {
        $path = 'certificados/00000000-0000-4000-8000-000000000001.png';
        Storage::disk('local')->put($path, file_get_contents(public_path('img/certificados/marca.png')));
        foreach ([0 => 1, 8 => 1, 10 => 1, 11 => 2, 20 => 2, 25 => 3, 70 => 7] as $cantidad => $paginas) {
            $datos = $this->datos('catastral');
            $datos['coordenadas'] = $cantidad ? implode("\n", array_map(fn ($i) => "P$i | P$i-P".($i === $cantidad ? 1 : $i + 1)." | 1.46 | 179°59'59 | 768533.990 | 8544609.482", range(1, $cantidad))) : '';
            $record = (new \App\Models\GenerarCertificado)->forceFill([
                'numero_documento' => $datos['numero'],
                'documento' => ['version' => 1, 'tipo' => 'catastral', 'datos' => $datos, 'imagenes' => ['foto' => $path, 'plano' => $path]],
            ]);
            $pdf = app(CertificadoPdf::class)->content($record);
            Storage::disk('local')->put("previews/coordenadas-$cantidad.pdf", $pdf);
            $this->assertSame($paginas, preg_match_all('/\/Type\s*\/Page\b/', $pdf), "Coordenadas: $cantidad");
        }
    }

}
