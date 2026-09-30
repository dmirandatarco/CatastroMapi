<?php

namespace App\Services\Certificados;

use Illuminate\Support\Facades\DB;

class DatosGeograficos
{
    public function lote(string $idLote, bool $incluirCuadro = true): array
    {
        return DB::connection('pgsqlgeo')->transaction(function ($connection) use ($idLote, $incluirCuadro) {
            $connection->statement("SET LOCAL statement_timeout = '5000ms'");
            $geometrias = $connection->select(
                'SELECT ST_SRID(geom) AS srid FROM geo.tg_lote WHERE id_lote = :id AND geom IS NOT NULL',
                ['id' => $idLote]
            );
            if (count($geometrias) !== 1) {
                throw new UbicacionNoDisponible('El lote debe tener una única geometría registrada en la base geográfica.');
            }
            if ((int) $geometrias[0]->srid !== (int) config('certificados.ubicacion.srid')) {
                throw new UbicacionNoDisponible('La geometría del lote no está en la zona UTM 18S requerida para Machupicchu. Revisa la conexión geográfica.');
            }
            $bbox = $connection->select('SELECT * FROM geo.fg_obtener_bbox_lote(:id)', ['id' => $idLote]);
            $filas = $incluirCuadro
                ? $connection->select('SELECT * FROM geo.fg_obtener_cuadro_coordenadas_lote(:id)', ['id' => $idLote])
                : [];
            if (count($bbox) !== 1 || ($incluirCuadro && !$filas)) {
                throw new UbicacionNoDisponible('El servicio geográfico no devolvió el encuadre o los vértices del lote.');
            }

            return ['bbox' => (array) $bbox[0], 'filas' => array_map(fn ($fila) => (array) $fila, $filas)];
        });
    }

    public function puerta(string $idLote, string $numeroMunicipal): ?array
    {
        return DB::connection('pgsqlgeo')->transaction(function ($connection) use ($idLote, $numeroMunicipal) {
            $connection->statement("SET LOCAL statement_timeout = '5000ms'");
            // La vista relaciona los dos sistemas; sus identificadores de puerta son distintos.
            $puertas = $connection->select(
                'SELECT id_puerta, nume_muni FROM geo.v_numeracion_puerta WHERE id_lote = :lote ORDER BY id_puerta',
                ['lote' => $idLote]
            );
            $numero = mb_strtoupper(trim($numeroMunicipal));
            $coincidentes = array_values(array_filter($puertas, fn ($puerta) =>
                $numero !== '' && mb_strtoupper(trim((string) $puerta->nume_muni)) === $numero
            ));
            if (!$coincidentes) {
                throw new UbicacionNoDisponible('No se encontró una puerta geográfica con el número municipal registrado en la puerta seleccionada de la ficha. Revisa geo.v_numeracion_puerta; las coordenadas quedan pendientes.');
            }
            // Ante números repetidos, tomar la primera coincidencia como referencia.
            $idPuerta = (string) $coincidentes[0]->id_puerta;
            $filas = $connection->select(
                'SELECT ST_SRID(geom) AS srid
                 FROM geo.tg_puerta WHERE id_lote = :lote AND id_puerta = :puerta AND geom IS NOT NULL',
                ['lote' => $idLote, 'puerta' => $idPuerta]
            );
            if (count($filas) !== 1 || (int) $filas[0]->srid !== (int) config('certificados.ubicacion.srid')) {
                return null;
            }
            $coordenadas = $connection->select(
                'SELECT * FROM geo.fg_obtener_coordenadas_utm(:puerta)', ['puerta' => $idPuerta]
            );

            return count($coordenadas) === 1 ? array_merge((array) $coordenadas[0], ['srid' => $filas[0]->srid]) : null;
        });
    }
}
