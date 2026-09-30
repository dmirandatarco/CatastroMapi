<?php

namespace App\Services\Certificados;

use App\Models\Ficha;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class UbicacionPredioService
{
    public const CAPAS = 'centro_id_lote,etiqueta_eje_via,etiqueta_lote,nivel_construccion_lote,id_lote,distancia_lote,vertice_lote,lado_lote';

    public const CAPAS_NUMERACION = 'etiqueta_lote,nivel_construccion_lote,id_lote,numeracion_puerta';

    public function __construct(private DatosGeograficos $geografia)
    {
    }

    public function obtener(Ficha $ficha, string $tipo = 'catastral'): array
    {
        abort_unless(in_array($tipo, ['catastral', 'numeracion'], true), 422);
        $capas = $tipo === 'numeracion' ? self::CAPAS_NUMERACION : self::CAPAS;
        $idLote = (string) $ficha->id_lote;
        $puertas = [];
        if ($tipo === 'numeracion') {
            $ficha->loadMissing('puertas');
            $puertas = $ficha->puertas->filter(fn ($puerta) => strtoupper(trim((string) $puerta->tipo_puerta)) === 'P')
                ->pluck('id_puerta')->unique()->sort()->values()->all();
        }
        $clave = 'certificados:ubicacion:v2:'.hash('sha256', json_encode([
            $idLote, $tipo, $capas, $puertas, config('certificados.ubicacion'),
            config('database.connections.pgsqlgeo.host'), config('database.connections.pgsqlgeo.database'),
            config('database.connections.pgsqlgeo.port'), config('database.connections.pgsqlgeo.search_path'),
        ]));
        if (($resultado = Cache::get($clave)) !== null) {
            return $resultado;
        }
        $resultado = ['png' => null, 'datos' => [], 'advertencias' => [], 'consultado_en' => now()->toIso8601String()];
        try {
            if (!preg_match('/^\d{14}$/', $idLote)) {
                throw new UbicacionNoDisponible('La ficha no tiene un código de lote válido para consultar el plano.');
            }
            $lote = $this->geografia->lote($idLote, $tipo === 'catastral');
            if ($tipo === 'catastral') {
                $resultado['datos']['coordenadas'] = $this->cuadro($lote['filas']);
            } else {
                $this->coordenadasPuerta($idLote, $puertas, $resultado);
            }
            $resultado['png'] = $this->imagen($idLote, $lote['bbox'], $capas);
        } catch (UbicacionNoDisponible $error) {
            $resultado['advertencias'][] = $error->getMessage();
        } catch (QueryException $error) {
            $resultado['advertencias'][] = $tipo === 'numeracion'
                ? 'No se pudo consultar pgsqlgeo. Verifica la conexión y la función geo.fg_obtener_bbox_lote.'
                : 'No se pudo consultar pgsqlgeo. Verifica la conexión y las funciones geo.fg_obtener_bbox_lote y geo.fg_obtener_cuadro_coordenadas_lote.';
        } catch (ConnectionException $error) {
            $resultado['advertencias'][] = 'El servidor de mapas no respondió. El plano queda pendiente.';
        }
        Cache::put($clave, $resultado, $resultado['advertencias'] ? 20 : (int) config('certificados.ubicacion.cache_segundos'));

        return $resultado;
    }

    private function coordenadasPuerta(string $idLote, array $puertas, array &$resultado): void
    {
        if (count($puertas) !== 1) {
            $resultado['advertencias'][] = 'Para obtener las coordenadas del número municipal, la ficha debe identificar una sola puerta principal P.';
            return;
        }
        try {
            $puerta = $this->geografia->puerta($idLote, (string) $puertas[0]);
        } catch (QueryException $error) {
            $puerta = null;
        }
        if (!$puerta || (int) $puerta['srid'] !== (int) config('certificados.ubicacion.srid') || !is_numeric($puerta['este']) || !is_numeric($puerta['norte'])) {
            $resultado['advertencias'][] = 'No se encontró la geometría de la puerta principal en UTM 18S. Sus coordenadas quedan pendientes.';
            return;
        }
        $resultado['datos']['este'] = number_format((float) $puerta['este'], 2, '.', '');
        $resultado['datos']['norte'] = number_format((float) $puerta['norte'], 2, '.', '');
    }

    private function cuadro(array $filas): string
    {
        $cuadro = [];
        foreach ($filas as $fila) {
            foreach (['vertice', 'lado', 'distancia', 'angulo', 'este', 'norte'] as $campo) {
                if (!isset($fila[$campo]) || preg_match('/[|\r\n]/', (string) $fila[$campo])) {
                    throw new UbicacionNoDisponible('El cuadro de coordenadas recibido no tiene el formato esperado.');
                }
            }
            foreach (['distancia', 'este', 'norte'] as $campo) {
                if (!is_numeric($fila[$campo])) {
                    throw new UbicacionNoDisponible('El cuadro de coordenadas contiene una medida inválida.');
                }
            }
            $cuadro[] = implode(' | ', [$fila['vertice'], $fila['lado'], number_format((float) $fila['distancia'], 2, '.', ''), $fila['angulo'], $fila['este'], $fila['norte']]);
        }

        return implode("\n", $cuadro);
    }

    private function imagen(string $idLote, array $bbox, string $capas): string
    {
        $url = rtrim((string) config('certificados.ubicacion.url'), '/');
        $partes = parse_url($url);
        if (!in_array($partes['scheme'] ?? '', ['http', 'https'], true) || empty($partes['host']) || isset($partes['query']) || isset($partes['fragment']) || isset($partes['user'])) {
            throw new UbicacionNoDisponible('Configura la dirección del WMS en URL_MAP.');
        }
        if (!str_ends_with($url, '/servicio/wms')) {
            $url .= '/servicio/wms';
        }
        foreach (['minx', 'miny', 'maxx', 'maxy', 'width', 'height'] as $campo) {
            if (!isset($bbox[$campo]) || !is_numeric($bbox[$campo])) {
                throw new UbicacionNoDisponible('El encuadre geográfico recibido es inválido.');
            }
        }
        $ancho = (float) $bbox['maxx'] - (float) $bbox['minx'];
        $alto = (float) $bbox['maxy'] - (float) $bbox['miny'];
        $width = (int) $bbox['width'];
        $height = (int) $bbox['height'];
        if ($ancho <= 0 || $alto <= 0 || $width < 1 || $width > 4096 || $height < 1 || $height > 4096
            || abs($width - $height * $ancho / $alto) > 2) {
            throw new UbicacionNoDisponible('El tamaño de imagen no corresponde a la proporción del encuadre geográfico.');
        }
        $response = Http::connectTimeout(3)->timeout((int) config('certificados.ubicacion.timeout'))
            ->withOptions(['allow_redirects' => false])->get($url, [
                'service' => 'WMS', 'request' => 'getMap', 'version' => '1.1.1',
                'layers' => $capas, 'styles' => '', 'WIDTH' => $width, 'HEIGHT' => $height,
                'SRS' => 'EPSG:'.config('certificados.ubicacion.srid'),
                'BBOX' => implode(',', array_map(fn ($key) => $bbox[$key], ['minx', 'miny', 'maxx', 'maxy'])),
                'format' => 'image/png', 'id' => $idLote,
            ]);
        $png = $response->body();
        $imagen = strlen($png) <= 8 * 1024 * 1024 ? @getimagesizefromstring($png) : false;
        if (!$response->successful() || !$imagen || $imagen['mime'] !== 'image/png' || $imagen[0] !== $width || $imagen[1] !== $height) {
            throw new UbicacionNoDisponible('El WMS no devolvió un plano PNG válido del tamaño solicitado. El plano queda pendiente.');
        }

        return $png;
    }
}
