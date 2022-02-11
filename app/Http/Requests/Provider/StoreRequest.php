<?php

namespace App\Http\Requests\Provider;

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
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|string|max:200|unique:providers',
            'id_numero' => 'required|string|max:50|min:11|unique:providers',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:10|min:9',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Este campo es requerido.',
            'nombre.string' => 'El valor no es correcto.',
            'nombre.max' => 'Solo se permite 255 caracteres.',

            'email.required' => 'Este campo es requerido.',
            'email.email' => 'No es un correo electrónico.',
            'email.string' => 'El valor no es correcto.',
            'email.max' => 'Solo se permite 255 caracteres.',
            'email.unique' => 'Este correo ya esta registrado.',

            'id_numero.required' => 'Este campo es requerido.',
            'id_numero.string' => 'El valor no es correcto.',
            'id_numero.max' => 'Solo se permite 11 caracteres.',
            'id_numero.min' => 'Se requiere 11 caracteres.',
            'id_numero.unique' => 'Ya se encuentra registrado.',

            'direccion.max' => 'Solo se permite 255 caracteres.',
            'direccion.string' => 'El valor no es correcto.',

            'telefono.required' => 'Este campo es requerido.',
            'telefono.string' => 'El valor no es correcto.',
            'telefono.max' => 'Solo se permite 10 caracteres.',
            'telefono.min' => 'Se requiere 11 caracteres.',
            'telefono.unique' => 'Ya se encuentra registrado.',
        ];
    }
}
