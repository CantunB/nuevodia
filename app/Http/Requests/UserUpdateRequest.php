<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'nombre' => 'required',
            'email' => 'required|unique:users,email,'.$this->route('usuario')
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Necesitamos tu :attribute.',
            'email.required' => 'Tu :attribute es obligatorio.',
            'email.unique' => 'El :attribute ingresado ya existe en nuestros registros'
        ];
    }

    public function attributes()
{
    return [
        'nombre' => 'Nombre',
        'email' => 'Correo',
    ];
}
}
