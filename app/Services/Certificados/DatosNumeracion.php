<?php

namespace App\Services\Certificados;

use App\Models\Ficha;
use App\Models\TablaCodigo;

class DatosNumeracion
{
    public const MANUALES = ['fut', 'expediente', 'solicitante', 'informe', 'numero_municipal', 'tipo_numero', 'estado_numeracion', 'cuadra', 'lado', 'recibo', 'monto_recibo', 'fecha_recibo'];

    public function desdeFicha(Ficha $ficha): array
    {
        $comunes = app(DatosCatastrales::class)->desdeFicha($ficha);
        $principales = $ficha->puertas->filter(fn ($puerta) => strtoupper(trim((string) $puerta->tipo_puerta)) === 'P');
        $catalogo = TablaCodigo::where('id_tabla', 'CNP')->pluck('desc_codigo', 'codigo');
        $datos = array_fill_keys(array_keys(CamposCertificado::definitions('numeracion')), '');
        return array_replace($datos, array_intersect_key($comunes, array_flip(['fecha', 'titulares', 'direccion', 'sector', 'manzana', 'lote'])), [
            'ubigeo' => '081304',
            'via' => $principales->map(fn ($puerta) => trim(($puerta->via?->tipo_via ?? '').' '.($puerta->via?->nomb_via ?? '')))->filter()->unique()->implode(' / '),
            'tipo_puerta' => $principales->isEmpty() ? '' : '(P) PRINCIPAL',
            'tipo_numeracion' => $principales->map(fn ($puerta) => $catalogo[trim((string) $puerta->cond_nume)] ?? '')->filter()->unique()->implode(' / '),
        ]);
    }

    public static function observaciones(string $solicitante): string
    {
        return 'SE EXPIDE EL PRESENTE CERTIFICADO A SOLICITUD DE: '.trim($solicitante).".\n"
            ."EL PRESENTE CERTIFICADO NO ACREDITA EL DERECHO DE PROPIEDAD NI TITULARIDAD SOBRE EL PREDIO AL SOLICITANTE.\n"
            ."SE OTORGA A PETICIÓN DEL SOLICITANTE Y CONSTITUYE UN DOCUMENTO ÚNICAMENTE CON FINES DE IDENTIFICACIÓN PREDIAL.\n"
            .'EL PREDIO NO POSEE NUMERACIÓN MUNICIPAL ANTERIOR.';
    }
}
