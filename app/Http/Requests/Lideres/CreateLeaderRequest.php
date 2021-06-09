<?php

namespace App\Http\Requests\Lideres;

use Illuminate\Foundation\Http\FormRequest;

class CreateLeaderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'clave_elector' => 'required|unique:sympathizers,clave_elector,'.$this->route('Leader'),
            'nombre' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'clave_elector' => 'clave de elector',
            'nombre' => 'Nombre'
        ];
    }

    public function messages()
    {   
        return [
            'clave_elector.required' => 'Necesitamos la :attribute para el registro',
            'clave_elector.unique' => 'La :attribute ya fue capturada!',
            'nombre.required' => 'Necesitamos un :attribute para el registro'
        ];
    }
    
}
