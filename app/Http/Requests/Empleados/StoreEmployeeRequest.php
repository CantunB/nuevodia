<?php

namespace App\Http\Requests\Empleados;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'clave_elector' => 'required|unique:employees,clave_elector',
            //'email' => 'required|unique:employees,email,'.$this->route('Empleado'),
            'nombre' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'clave_elector' => 'clave de elector',
          //  'email' => 'correo electronico',
            'nombre' => 'Nombre'
        ];
    }

    public function messages()
    {
        return [
            'clave_elector.required' => 'Necesitamos la :attribute para el registro',
            'clave_elector.unique' => 'La :attribute ya fue capturada!',
           // 'email.required' => 'Necesitamos un :attribute para el registro',
           // 'email.unique' => 'El :attribute ya fue capturado!',
            'nombre.required' => 'Necesitamos un :attribute para el registro'
        ];
    }
}
