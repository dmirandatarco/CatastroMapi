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

    public function puerta(string $idLote, string $idPuerta): ?array
    {
        return DB::connection('pgsqlgeo')->transaction(function ($connection) use ($idLote, $idPuerta) {
            $connection->statement("SET LOCAL statement_timeout = '5000ms'");
            $filas = $connection->select(
                'SELECT ST_SRID(geom) AS srid, ROUND(ST_X(geom)::numeric, 2) AS este, ROUND(ST_Y(geom)::numeric, 2) AS norte
                 FROM geo.tg_puerta WHERE id_lote = :lote AND id_puerta = :puerta AND geom IS NOT NULL',
                ['lote' => $idLote, 'puerta' => $idPuerta]
            );

            return count($filas) === 1 ? (array) $filas[0] : null;
        });
    }
}
