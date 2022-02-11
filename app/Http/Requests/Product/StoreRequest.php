<?php

namespace App\Http\Requests\Product;

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
            'nombre' => 'string|required|unique:products|max:255',

            'precio_venta' => 'required',

            'code' => 'nullable|string|max:8|min:8',

        ];
    }
    public function messages()
    {
        return [
            'nombre.string' => 'El valor no es correcto.',
            'nombre.required' => 'El campo es requerido.',
            'nombre.unique' => 'El producto ya está registrado.',
            'nombre.max' => 'Solo se permite 255 caracteres.',


            'precio_venta.required' => 'El campo es requerido.',

            'code.string' => 'El valor no es correcto.',
            'code.max' => 'Solo se permite 8 dígitos.',
            'code.min' => 'Se requiere de 8 dígitos.',






        ];
    }
}
