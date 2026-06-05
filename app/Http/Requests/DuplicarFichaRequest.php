<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DuplicarFichaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $nume_ficha = str_pad($this->n_ficha_nuevo,7,'0',STR_PAD_LEFT);
        $id = $this->id_ficha_cotitular;
        return [
            'unicat_coti_nuevo' => 'required|exists:tf_uni_cat,id_uni_cat',
            'n_ficha_nuevo' => ['required','max:7',
                    Rule::unique('tf_fichas_cotitularidades', 'nume_ficha')->ignore($id, 'id_ficha')],
            'ficha_lote' => 'required|max:3',
            'ficha_lote2' => 'required|max:3'
        ];
    }
}
