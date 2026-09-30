<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FiltroCertificadosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'buscarSector' => ['bail', 'nullable', 'string', 'regex:/^\d{1,30}$/', Rule::when($this->input('buscarSector') && $this->input('buscarSector') !== '0', Rule::exists('tf_sectores', 'id_sector'))],
            'buscarManzana' => ['bail', 'nullable', 'string', 'regex:/^\d{1,30}$/', Rule::when($this->input('buscarManzana') && $this->input('buscarManzana') !== '0', Rule::exists('tf_manzanas', 'id_mzna')->where(function ($query) {
                if (is_string($this->input('buscarSector')) && $this->input('buscarSector') && $this->input('buscarSector') !== '0') {
                    $query->where('id_sector', $this->input('buscarSector'));
                }
            }))],
            'buscarFicha' => ['bail', 'nullable', 'string', 'regex:/^\d{1,7}$/'],
            'buscarLote' => ['bail', 'nullable', 'string', 'regex:/^\d{1,3}$/'],
        ];
    }

    public function attributes(): array
    {
        return ['buscarSector' => 'sector', 'buscarManzana' => 'manzana del sector seleccionado', 'buscarFicha' => 'número de ficha', 'buscarLote' => 'lote'];
    }
}
