<?php

namespace App\Services\Certificados;

use App\Models\Ficha;
use PDOException;
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

    public function obtener(Ficha $ficha, string $tipo = 'catastral', ?string $idPuerta = null): array
    {
        abort_unless(in_array($tipo, ['catastral', 'numeracion'], true), 422);
        $capas = $tipo === 'numeracion' ? self::CAPAS_NUMERACION : self::CAPAS;
        $idLote = (string) $ficha->id_lote;
        $puertas = [];
        if ($tipo === 'numeracion') {
            $puerta = PuertaCertificado::seleccionar($ficha, $idPuerta);
            $puertas = $puerta ? [['id' => (string) $puerta->id_puerta, 'numero' => (string) $puerta->nume_muni]] : [];
        }
        $clave = 'certificados:ubicacion:v5:'.hash('sha256', json_encode([
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
        } catch (PDOException $error) {
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
        if (!$puertas) {
            $resultado['advertencias'][] = 'Registra y selecciona una puerta de la ficha para obtener las coordenadas del número municipal.';
            return;
        }
        try {
            $puerta = $this->geografia->puerta($idLote, $puertas[0]['numero']);
        } catch (UbicacionNoDisponible $error) {
            $resultado['advertencias'][] = $error->getMessage();
            return;
        } catch (PDOException $error) {
            $resultado['advertencias'][] = 'No se pudieron consultar las coordenadas de la puerta en pgsqlgeo. Verifica geo.v_numeracion_puerta y geo.fg_obtener_coordenadas_utm.';
            return;
        }
        if (!$puerta || (int) ($puerta['srid'] ?? 0) !== (int) config('certificados.ubicacion.srid') || !is_numeric($puerta['este'] ?? null) || !is_numeric($puerta['norte'] ?? null)) {
            $resultado['advertencias'][] = 'No se encontró la geometría de la puerta seleccionada en UTM 18S. Sus coordenadas quedan pendientes.';
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
        $errorWms = $this->errorWms($png);
        if ($errorWms !== null) {
            throw new UbicacionNoDisponible('El WMS rechazó el plano: '.$errorWms);
        }
        if (!$response->successful()) {
            throw new UbicacionNoDisponible('El WMS respondió con HTTP '.$response->status().'. Revisa URL_MAP y el servicio de mapas.');
        }
        $imagen = strlen($png) <= 8 * 1024 * 1024 ? @getimagesizefromstring($png) : false;
        if (!$imagen || $imagen['mime'] !== 'image/png') {
            throw new UbicacionNoDisponible('El WMS no devolvió una imagen PNG válida de hasta 8 MB. Revisa URL_MAP y el servicio de mapas.');
        }
        if ($imagen[0] !== $width || $imagen[1] !== $height) {
            throw new UbicacionNoDisponible("El WMS devolvió una imagen de {$imagen[0]} × {$imagen[1]} píxeles; se solicitaron {$width} × {$height}. El plano queda pendiente.");
        }

        return $png;
    }

    private function errorWms(string $contenido): ?string
    {
        if (strlen($contenido) > 65536 || !str_starts_with(ltrim($contenido), '<')) {
            return null;
        }
        $anterior = libxml_use_internal_errors(true);
        try {
            // No cargar DTD ni sustituir entidades de una respuesta externa.
            $xml = simplexml_load_string($contenido, \SimpleXMLElement::class, LIBXML_NONET);
            if ($xml === false) {
                return null;
            }
            $errores = $xml->xpath('//*[local-name()="ServiceException" or local-name()="ExceptionText"]');
            if (!$errores) {
                return null;
            }
            $mensaje = trim(preg_replace('/\s+/u', ' ', (string) $errores[0]) ?? '');

            return $mensaje !== '' ? mb_substr($mensaje, 0, 350) : 'El servidor reportó una excepción sin detalle.';
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($anterior);
        }
    }
}
