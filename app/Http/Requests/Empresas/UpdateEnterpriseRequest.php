<?php

namespace App\Http\Requests\Empresas;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnterpriseRequest extends FormRequest
{
    public function validate() {
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            throw new HttpResponseException(response()->json($instance->errors(), 422));
        }
    }
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
            //'email' => 'required|unique:enterprises,email,'.$this->route('Empresa'),
            'telephone' => 'required|unique:enterprises,telephone,'.$this->route('Empresa'),
           // 'rfc' => 'required|unique:enterprises,rfc,'.$this->route('Empresa'),
            'name' => 'required'
        ];
    }

    public function attributes()
    {
        return [
         //   'email' => 'correo electronico',
            'telephone' => 'telefono',
            //'rfc' => 'rfc',
            'name' => 'Nombre'
        ];
    }

    public function messages()
    {
        return [
            //'email.required' => 'Necesitamos un :attribute para el registro',
            //'email.unique' => 'El :attribute ya fue capturado!',
            'telephone.required' => 'Necesitamos un :attribute para el registro',
            'telephone.unique' => 'El :attribute ya fue capturado!',
           // 'rfc.required' => 'Necesitamos un :attribute para el registro',
            //'rfc.unique' => 'El :attribute ya fue capturado!',
            'name.required' => 'Necesitamos un :attribute para el registro'
        ];
}
}
