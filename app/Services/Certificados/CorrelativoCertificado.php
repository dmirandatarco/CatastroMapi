<?php

namespace App\Services\Certificados;

use App\Models\GenerarCertificado;
use Illuminate\Support\Facades\DB;

class CorrelativoCertificado
{
    // Se llama dentro de la misma transacción de emisión.
    public function siguiente(int $anio, string $tipo): string
    {
        $catastral = $tipo === 'catastral';
        $tabla = $catastral ? 'correlativos_catastrales' : 'correlativos_numeracion';
        $modelo = $catastral ? GenerarCertificado::class : \App\Models\GenerarNumeracion::class;
        DB::table($tabla)->insertOrIgnore(['anio' => $anio, 'ultimo' => 0]);
        $serie = DB::table($tabla)->where('anio', $anio)->lockForUpdate()->first();
        $ultimo = (int) $serie->ultimo;
        if ($ultimo === 0) {
            foreach ($modelo::whereYear('fecha_emision', $anio)->select('id', 'numero_documento')->cursor() as $anterior) {
                if (preg_match('/^(\d+)-'.$anio.'(?:-|$)/', (string) $anterior->numero_documento, $match)) {
                    $ultimo = max($ultimo, (int) $match[1]);
                } elseif (!$anterior->numero_documento) {
                    $ultimo = max($ultimo, (int) $anterior->id);
                }
            }
        }
        do {
            $numero = str_pad((string) ++$ultimo, ($catastral ? 2 : 3), '0', STR_PAD_LEFT).'-'.$anio.($catastral ? '-UCDUR-MDM' : '');
        } while ($modelo::where('numero_documento', $numero)->exists());
        DB::table($tabla)->where('anio', $anio)->update(['ultimo' => $ultimo]);
        return $numero;
    }
}
