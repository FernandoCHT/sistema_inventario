<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'nombre' => 'string|required|unique:products,nombre,' . $this->route('product')->id . '|max:255',

            'precio_venta' => 'required',
            'category_id' => 'integer|required|exists:App\Models\Category,id',
            'provider_id' => 'integer|required|exists:App\Models\Provider,id',

            'code' => 'nullable|string|max:8|min:8',
        ];
    }
    public function messages()
    {
        return [
            'nombre.string' => 'El valor no es correcto.',
            'nombre.required' => 'Este campo es requerido.',
            'nombre.unique' => 'El producto ya está registrado.',
            'nombre.max' => 'Solo se permite 255 caracteres.',

            'code.string' => 'El valor no es correcto.',
            'code.max' => 'Solo se permite 8 dígitos.',
            'code.min' => 'Se requiere de 8 dígitos.',

            'precio_venta.required' => 'El campo es requerido. ',

            'category_id.integer' => 'El valor tiene que ser entero. ',
            'category_id.required' => 'El campo es requerido.',
            'category_id.integer' => 'La categoria no existe.',

            'provider_id.integer' => 'El valor tiene que ser entero. ',
            'provider_id.required' => 'El campo es requerido.',
            'provider_id.integer' => 'El proveedor no existe.',

        ];
    }
}
