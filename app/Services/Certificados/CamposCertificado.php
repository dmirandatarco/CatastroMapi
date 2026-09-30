<?php

namespace App\Services\Certificados;

class CamposCertificado
{
    public static function definitions(string $tipo): array
    {
        $fields = [
            'numero' => ['Número de certificado (incluye año)', 'text', 'required|string|max:60'],
            'fecha' => ['Fecha de emisión', 'date', 'required|date_format:Y-m-d'],
            'solicitante' => ['Solicitante', 'text', 'required|string|max:250'],
            'direccion' => ['Dirección del predio', 'text', 'required|string|max:250'],
            'ubigeo' => ['Ubigeo', 'text', 'required|digits:6'],
            'sector' => ['Sector', 'text', 'required|digits:2'],
            'manzana' => ['Manzana', 'text', 'required|digits:3'],
            'lote' => ['Lote', 'text', 'required|digits:3'],
            'recibo' => ['Número de recibo', 'text', 'required|string|max:50'],
            'fecha_recibo' => ['Fecha del recibo', 'date', 'required|date_format:Y-m-d'],
            'observaciones' => ['Observaciones', 'textarea', 'nullable|string|max:1800'],
        ];

        if ($tipo === 'numeracion') {
            return $fields + [
                'titulares' => ['Titulares / cotitulares', 'textarea', 'required|string|max:1500'],
                'fut' => ['FUT', 'text', 'required|string|max:50'],
                'expediente' => ['Expediente', 'text', 'required|string|max:50'],
                'propietario' => ['Propietario (%)', 'number', 'nullable|numeric|between:0,100'],
                'copropietario' => ['Copropietario (%)', 'number', 'nullable|numeric|between:0,100'],
                'informe' => ['Informe', 'text', 'nullable|string|max:200'],
                'numero_municipal' => ['Número municipal asignado', 'text', 'required|string|max:30'],
                'via' => ['Nombre de vía', 'text', 'required|string|max:200'],
                'tipo_numero' => ['Tipo de número municipal', 'text', 'required|string|max:80'],
                'tipo_puerta' => ['Tipo de puerta', 'text', 'required|string|max:80'],
                'tipo_numeracion' => ['Tipo de numeración', 'text', 'required|string|max:80'],
                'estado_numeracion' => ['Estado de numeración', 'text', 'required|string|max:80'],
                'cuadra' => ['Número de cuadra', 'text', 'required|string|max:20'],
                'este' => ['Coordenada UTM Este (X)', 'text', 'nullable|numeric|between:0,1000000'],
                'norte' => ['Coordenada UTM Norte (Y)', 'text', 'nullable|numeric|between:0,10000000'],
                'lado' => ['Lado respecto al sentido de la vía', 'text', 'required|string|max:100'],
                'monto_recibo' => ['Monto del recibo (S/)', 'number', 'required|numeric|min:0|max:999999.99'],
            ];
        }

        return $fields + [
            'naturaleza' => ['Naturaleza del predio', 'text', 'required|string|max:150'],
            'titulares' => ['Titulares / cotitulares (uno por línea)', 'textarea', 'required|string|max:1500'],
            'area' => ['Área del predio (m²)', 'number', 'required|numeric|gt:0|max:99999.99'],
            'perimetro' => ['Perímetro (m)', 'number', 'required|numeric|gt:0|max:99999.99'],
            'leyenda_foto' => ['Descripción del registro fotográfico', 'textarea', 'nullable|string|max:300'],
            'leyenda_plano' => ['Descripción del plano', 'textarea', 'nullable|string|max:300'],
            'coordenadas' => ['Cuadro de coordenadas UTM', 'textarea', 'nullable|string|max:3000'],
            'sistema_coordenadas' => ['Sistema y zona de coordenadas', 'text', 'required|string|max:80'],
        ];
    }

    public static function rules(string $tipo): array
    {
        $rules = [];
        foreach (self::definitions($tipo) as $key => $field) {
            $rules['datos.'.$key] = $field[2];
        }
        if ($tipo === 'catastral') {
            $rules['datos.coordenadas'] = ['nullable', 'string', 'max:3000', function ($attribute, $value, $fail) {
                foreach (preg_split('/\r\n|\r|\n/', trim($value)) as $line) {
                    $cells = array_map('trim', explode('|', $line));
                    if (count($cells) !== 6 || !is_numeric($cells[2]) || !is_numeric($cells[4]) || !is_numeric($cells[5])) {
                        $fail('Cada fila debe contener vértice | lado | distancia | ángulo | este | norte, con distancia y coordenadas numéricas.');
                        break;
                    }
                }
            }];
        }
        return $rules;
    }

    public static function manualesNumeracion(): array
    {
        return array_intersect_key(self::rules('numeracion'), array_flip(array_map(fn ($key) => 'datos.'.$key, DatosNumeracion::MANUALES)));
    }

    public static function manualesCatastral(): array
    {
        return array_intersect_key(self::rules('catastral'), array_flip(array_map(fn ($key) => 'datos.'.$key, DatosCatastrales::MANUALES)));
    }
}
