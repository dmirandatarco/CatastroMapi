<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenciaRequest extends FormRequest
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
        if(request()->routeIs('licenciaedificacion.store')){
            $licenciarq              = 'required|max:100|unique:licencias';
        }else{
            $licenciarq              = 'required|max:100|unique:licencias,nroexpediente,'.$this->id_licencia;

        }
        return [
            'nroexpediente'         =>  $licenciarq,
            'nrolicencia'           =>  'required|max:255',
            'administrado1'         =>  'required|max:255',
            'administrado2'         =>  'nullable|max:255',
            'tipolicencia'          =>  'required|max:255',
            'uso'                   =>  'required|max:255',
            'zonificacion'          =>  'required|max:255',
            'alturapisos'           =>  'required|max:255',
            'alturametros'          =>  'required|max:255',
            'haburbana'             =>  'required|max:255',
            'mzna'                  =>  'nullable|max:25',
            'lote'                  =>  'nullable|max:25',
            'sublote'               =>  'nullable|max:25',
            'calle'                 =>  'nullable|max:25',
            'nro'                   =>  'nullable|max:25',
            'interior'              =>  'nullable|max:25',
            'areatechada'           =>  'nullable|numeric',
            'valorobra'             =>  'nullable|numeric',
            'pisosautorizados'      =>  'nullable|max:255',
            'nrosotano'             =>  'nullable',
            'semisotano'            =>  'nullable',
            'azotea'                =>  'nullable',
            'calificacion'          =>  'nullable|max:255',
            'dictamen'              =>  'nullable',
            'licencia'              =>  'nullable',
            'responsable'           =>  'nullable',
            'codresponsable'        =>  'nullable|max:50',
            'pagotramite'           =>  'nullable|numeric',
            'recibo'                =>  'nullable|max:255',
            'fecha_recibo'          =>  'nullable',
            'observacion'           =>  'nullable',
            'recomendaciones'       =>  'nullable',
        ];
    }
}
