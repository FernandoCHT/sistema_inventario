<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'nombre' => 'string|required|max:255',
            'rfc' => 'string|unique:clients|max:15',
            'direccion' => 'string|max:255',
            'telefono' => 'string|unique:clients|max:10',
            'email' => 'string|unique:clients|max:255|email:rfc,dns',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Este campo es requerido.',
            'nombre.string' => 'El valor no es correcto.',
            'nombre.max' => 'Solo se permite 255 caracteres.',

            'rfc.required' => 'Este campo es requerido.',
            'rfc.string' => 'El valor no es correcto.',
            'rfc.max' => 'Solo se permite 15 caracteres.',
            'rfc.min' => 'Se requiere 14 caracteres.',
            'rfc.unique' => 'Este rfc ya se encuentra registrado.',

            'direccion.max' => 'Solo se permite 255 caracteres.',
            'direccion.string' => 'El valor no es correcto.',

            'telefono.required' => 'Este campo es requerido.',
            'telefono.string' => 'El valor no es correcto.',
            'telefono.max' => 'Solo se permite 10 caracteres.',
            'telefono.min' => 'Se requiere 10 caracteres.',
            'telefono.unique' => 'Ya se encuentra registrado.',

            'email.required' => 'Este campo es requerido.',
            'email.email' => 'No es un correo electrónico.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permite 255 caracteres.',
            'email.unique' => 'Este correo ya esta registrado.',
        ];
    }
}