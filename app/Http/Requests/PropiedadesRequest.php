<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropiedadesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'direccion' => 'required|string',
            'habitaciones' => 'required|numeric',
            'WC' => 'required|numeric',
            'plantas' => 'required|numeric',
            'tipo' => 'required|string',
            'size' => 'required|numeric'
        ];
    }
    //sobreescribimos el método de la clase heredada  FormRequest para traducir los mensajes
    public function messages()
    {
        return [
            'titulo.required' => 'El :attribute es obligatorio.',
            'descripcion.required' => 'La :attribute es obligatoria.',
            'precio.required' => 'La propiedad debe tener un :attribute.',
            'direccion.required' => 'Necesitamos saber tu :attribute .',
            'habitaciones.required' => 'Necesitamos saber la cantidad de :attribute .',
            'WC.required' => 'Necesitamos saber la cantidad de :attribute .',
            'plantas.required' => 'Necesitamos saber la cantidad de :attribute.',
            'tipo.required' => 'Necesitamos saber el :attribute  de propiedad.',
            'size.required' => 'Necesitamos saber el tamaño de la propiedad.',
        ];
    }
}
