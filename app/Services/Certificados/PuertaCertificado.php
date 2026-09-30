<?php

namespace App\Services\Certificados;

use App\Models\Ficha;
use App\Models\Puerta;
use Illuminate\Validation\ValidationException;

class PuertaCertificado
{
    public static function seleccionar(Ficha $ficha, ?string $id): ?Puerta
    {
        $ficha->loadMissing('puertas');
        $puertas = $ficha->puertas->sortBy('id_puerta');
        if ($id !== null) {
            $puerta = $puertas->first(fn ($puerta) => (string) $puerta->id_puerta === $id);
            if (!$puerta) {
                throw ValidationException::withMessages(['puertaSeleccionada' => 'Selecciona una puerta que pertenezca a esta ficha.']);
            }
            return $puerta;
        }

        return $puertas->first(fn ($puerta) => strtoupper(trim((string) $puerta->tipo_puerta)) === 'P') ?? $puertas->first();
    }

    public static function tipo(Puerta $puerta): string
    {
        $codigo = strtoupper(trim((string) $puerta->tipo_puerta));
        $nombre = ['P' => 'PRINCIPAL', 'S' => 'SECUNDARIO', 'G' => 'GARAJE', 'E' => 'ESTACIONAMIENTO'][$codigo] ?? $codigo;

        return $codigo === '' ? '' : '('.$codigo.') '.$nombre;
    }

    public static function direccion(Puerta $puerta): string
    {
        $via = trim(($puerta->via?->tipo_via ?? '').' '.($puerta->via?->nomb_via ?? ''));

        return $via === '' ? '' : trim($via.($puerta->nume_muni ? ' N.º '.$puerta->nume_muni : ''));
    }
}
