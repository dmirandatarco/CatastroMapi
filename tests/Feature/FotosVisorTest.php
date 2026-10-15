<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FotosVisorTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'fotos_test', 'database.connections.fotos_test' => [
            'driver' => 'sqlite', 'database' => ':memory:', 'prefix' => '',
        ], 'filesystems.default' => 'public', 'rentas.ubigeo_archivos' => '081304']);
        Storage::fake('public');
        DB::statement('CREATE TABLE tf_fichas (id_ficha TEXT PRIMARY KEY, id_lote TEXT, tipo_ficha TEXT, activo TEXT)');
        DB::statement('CREATE TABLE tf_fichas_individuales (id_ficha TEXT, imagen_lote TEXT)');
    }

    protected function tearDown(): void
    {
        DB::purge('fotos_test');
        parent::tearDown();
    }

    private function ficha(string $id, string $nombre, string $lote = '08130401009004'): void
    {
        DB::table('tf_fichas')->insert(['id_ficha' => $id, 'id_lote' => $lote, 'tipo_ficha' => '01', 'activo' => '1']);
        DB::table('tf_fichas_individuales')->insert(['id_ficha' => $id, 'imagen_lote' => $nombre]);
    }

    private function png(int $ancho): string
    {
        $img = imagecreatetruecolor($ancho, 6);
        ob_start(); imagepng($img); $bytes = ob_get_clean(); imagedestroy($img);
        return $bytes;
    }

    public function test_convierte_primera_foto_disponible_y_conserva_originales_y_bd(): void
    {
        $this->ficha('F1', 'faltante.png');
        $this->ficha('F2', 'ficha2.PNG');
        $this->ficha('F3', 'ficha3.jpeg');
        Storage::put('img/imageneslotes/ficha2.PNG', $this->png(12));
        Storage::put('img/imageneslotes/ficha3.jpeg', $this->png(20));
        $this->artisan('visor:preparar-fotos')->assertExitCode(0);
        Storage::assertMissing('img/imageneslotes/01009004.jpg');
        $this->artisan('visor:preparar-fotos --aplicar')->assertExitCode(0);
        $jpeg = Storage::get('img/imageneslotes/01009004.jpg');
        $info = getimagesizefromstring($jpeg);
        $this->assertSame('image/jpeg', $info['mime']);
        $this->assertSame(12, $info[0]);
        $this->assertSame($this->png(12), Storage::get('img/imageneslotes/ficha2.PNG'));
        $this->assertSame('ficha2.PNG', DB::table('tf_fichas_individuales')->where('id_ficha', 'F2')->value('imagen_lote'));
        Storage::put('img/imageneslotes/ficha2.PNG', $this->png(30));
        $this->artisan('visor:preparar-fotos --aplicar')->assertExitCode(0);
        $this->assertSame($jpeg, Storage::get('img/imageneslotes/01009004.jpg'));
    }

    public function test_no_convierte_datos_de_otro_distrito(): void
    {
        $this->ficha('F1', 'foto.png', '08010801009004');
        Storage::put('img/imageneslotes/foto.png', $this->png(12));
        $this->artisan('visor:preparar-fotos --aplicar')->assertExitCode(1);
        Storage::assertMissing('img/imageneslotes/01009004.jpg');
    }

    public function test_jpeg_de_48_megapixeles_conserva_exactamente_sus_bytes(): void
    {
        $imagen = imagecreate(8064, 6048);
        imagecolorallocate($imagen, 80, 100, 120);
        ob_start(); imagejpeg($imagen, null, 90); $original = ob_get_clean(); imagedestroy($imagen);
        $this->ficha('F1', 'foto-grande.jpeg');
        Storage::put('img/imageneslotes/foto-grande.jpeg', $original);
        $this->artisan('visor:preparar-fotos --aplicar')->assertExitCode(0);
        $resultado = Storage::get('img/imageneslotes/01009004.jpg');
        $this->assertSame($original, $resultado);
        $this->assertSame(strlen($original), strlen($resultado));
        $this->assertSame([8064, 6048], array_slice(getimagesizefromstring($resultado), 0, 2));
        $this->artisan('visor:preparar-fotos --aplicar')->assertExitCode(0);
        $this->assertSame($original, Storage::get('img/imageneslotes/01009004.jpg'));
    }

    public function test_rechaza_archivos_inseguros_y_avisa_lotes_sin_foto_valida(): void
    {
        $this->ficha('F1', '../foto.png');
        $this->ficha('F2', 'invalida.jpg');
        Storage::put('img/foto.png', $this->png(12));
        Storage::put('img/imageneslotes/invalida.jpg', 'no es imagen');
        $this->artisan('visor:preparar-fotos --aplicar')->assertExitCode(1);
        Storage::assertMissing('img/imageneslotes/01009004.jpg');
    }
}
