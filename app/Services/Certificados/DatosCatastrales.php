<?php

namespace App\Services\Certificados;

use App\Models\Ficha;
use App\Models\Lindero;

class DatosCatastrales
{
    public const MANUALES = ['naturaleza', 'observaciones', 'solicitante', 'recibo', 'fecha_recibo'];

    public function desdeFicha(Ficha $ficha): array
    {
        $ficha->loadMissing(['fichaindividual', 'lindero', 'lote.manzana.sectore', 'titulars.persona', 'puertas.via', 'cotitularesRelacionados.titulars.persona']);
        $cotitulares = $ficha->cotitularesRelacionados->flatMap(fn ($cotitular) => $cotitular->titulars);
        $titulares = ($cotitulares->isNotEmpty() ? $cotitulares : $ficha->titulars)
            ->map(function ($titular) {
                $persona = $titular->persona;
                return $persona?->razon_social ?: trim(implode(' ', array_filter([$persona?->nombres, $persona?->ape_paterno, $persona?->ape_materno])));
            })->filter()->unique()->values()->implode("\n");
        $principales = $ficha->puertas->filter(fn ($puerta) => strtoupper(trim((string) $puerta->tipo_puerta)) === 'P');
        $direccion = $principales->map(function ($puerta) {
            $via = trim(($puerta->via?->tipo_via ?? '').' '.($puerta->via?->nomb_via ?? ''));
            return $via === '' ? '' : trim($via.($puerta->nume_muni ? ' N.º '.$puerta->nume_muni : ''));
        })->filter()->unique()->implode(' / ');

        return [
            'numero' => '', 'fecha' => now('America/Lima')->toDateString(),
            'titulares' => $titulares, 'direccion' => $direccion,
            'ubigeo' => substr((string) $ficha->id_lote, 0, 6),
            'sector' => $ficha->lote?->manzana?->sectore?->codi_sector ?? '',
            'manzana' => $ficha->lote?->manzana?->codi_mzna ?? '',
            'lote' => $ficha->lote?->codi_lote ?? '',
            'area' => $ficha->fichaindividual?->area_verificada ?? '',
            'perimetro' => $this->perimetro($ficha->lindero),
            'sistema_coordenadas' => 'UTM WGS 84 - ZONA 18S',
            'coordenadas' => '',
            'leyenda_foto' => 'Registro fotográfico del predio.',
            'leyenda_plano' => 'Plano Catastral del Área Urbana del Distrito de Machupicchu aprobado por O.M. Nº 013-2026-MDM/CM.',
            'naturaleza' => '',
            'observaciones' => 'Mediante Resolución N.° 014-89-CDM-A del año 1989 se adjudicó a doña Martha Victoria Moreano Herencia la Manzana N.° M-20, con un área de 128.00 m² y un perímetro de 32.00 ml. Asimismo, mediante Escritura Pública de Anticipo de Legítima N.° 1295 2025, se otorgó el predio a favor de: '.str_replace("\n", '; ', $titulares),
            'solicitante' => '', 'recibo' => '', 'fecha_recibo' => '',
        ];
    }

    public function perimetro(?Lindero $lindero): ?string
    {
        if (!$lindero) {
            return null;
        }
        $centimetros = 0;
        foreach (['fren_campo', 'dere_campo', 'izqu_campo', 'fond_campo'] as $campo) {
            $valor = trim((string) $lindero->{$campo});
            if ($valor === '') {
                return null;
            }
            foreach (explode(';', $valor) as $tramo) {
                $tramo = trim($tramo);
                if (!preg_match('/^(\d+)(?:[.,](\d{1,2}))?\s*(?:m|ml|m\.)?$/iu', $tramo, $partes)) {
                    return null;
                }
                $centimetros += (int) $partes[1] * 100 + (int) str_pad($partes[2] ?? '', 2, '0');
            }
        }
        return number_format($centimetros / 100, 2, '.', '');
    }
}
