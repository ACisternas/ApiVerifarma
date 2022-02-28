<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmaciaCreateRequest extends FormRequest
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
            'direccion' => 'required',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es requerido',
            'direccion.required' => 'La dirección es requerida',
            'latitud.required' => 'La latitud es requerida',
            'latitud.numeric' => 'La latitud debe ser un valor numerico',
            'longitud.required' => 'La longitud es requerida',
            'longitud.numeric' => 'La longitud debe ser un valor numerico',
        ];
    }
}
