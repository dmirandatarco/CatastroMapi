<?php

namespace App\Services\Certificados;

use App\Models\Ficha;
use App\Models\GenerarCertificado;
use App\Models\GenerarNumeracion;
use App\Models\Manzana;
use App\Models\Sectore;
use Illuminate\Database\Eloquent\Builder;

class ConsultaCertificados
{
    public function filtrar(Builder $query, array $filtros, bool $historial): Builder
    {
        $prefijo = $historial ? 'ficha.' : '';
        if (isset($filtros['buscarLote']) && $filtros['buscarLote'] !== '') {
            $numero = str_pad($filtros['buscarLote'], 3, '0', STR_PAD_LEFT);
            $query->whereHas($prefijo.'lote', fn ($q) => $q->where('codi_lote', $numero));
        }
        if (!empty($filtros['buscarSector'])) {
            $query->whereHas($prefijo.'lote.manzana', fn ($q) => $q->where('id_sector', $filtros['buscarSector']));
        }
        if (!empty($filtros['buscarManzana'])) {
            $query->whereHas($prefijo.'lote', fn ($q) => $q->where('id_mzna', $filtros['buscarManzana']));
        }
        if (isset($filtros['buscarFicha']) && $filtros['buscarFicha'] !== '') {
            $numero = str_pad($filtros['buscarFicha'], 7, '0', STR_PAD_LEFT);
            if ($historial) {
                $query->whereHas('ficha', fn ($q) => $q->where('nume_ficha', $numero));
            } else {
                $query->where('nume_ficha', $numero);
            }
        }
        return $query;
    }

    public function listado(string $tipo, bool $historial, array $filtros): array
    {
        $query = $historial
            ? ($tipo === 'catastral' ? GenerarCertificado::query() : GenerarNumeracion::query())->with('ficha.lote.manzana.sectore')->orderByDesc('id')
            : Ficha::where('tipo_ficha', '01')->with('lote.manzana.sectore')->orderBy('nume_ficha')->orderBy('id_ficha');
        return [
            'tipo' => $tipo, 'historial' => $historial, 'filtros' => $filtros,
            'registros' => $this->filtrar($query, $filtros, $historial)->paginate(25)->withQueryString(),
            'sectores' => Sectore::orderBy('codi_sector')->get(['id_sector', 'codi_sector', 'nomb_sector']),
            'manzanas' => Manzana::orderBy('codi_mzna')->get(['id_mzna', 'id_sector', 'codi_mzna']),
        ];
    }
}
