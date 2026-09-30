<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FiltroLote
{
    public static function numero(Request $request): ?string
    {
        $datos = $request->validate(['buscarLote' => ['nullable', 'string', 'regex:/^[0-9]{1,3}$/']], [], ['buscarLote' => 'lote']);
        $numero = $datos['buscarLote'] ?? null;
        if ($numero === null || $numero === '') {
            return null;
        }
        $numero = str_pad($numero, 3, '0', STR_PAD_LEFT);
        $request->merge(['buscarLote' => $numero]);

        return $numero;
    }

    public static function aplicar(Builder $query, Request $request): Builder
    {
        $numero = self::numero($request);
        if ($numero !== null) {
            $query->whereHas('lote', fn (Builder $lote) => $lote->where('codi_lote', $numero));
        }

        return $query;
    }
}
