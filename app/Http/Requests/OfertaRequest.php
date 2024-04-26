<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfertaRequest extends FormRequest
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
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'oferta' => 'required|numeric',
            'direccion' => 'required|string',
            'telefono' => 'required|numeric',
            'propiedad_id' => 'required|numeric'
        ];
    }
    //sobreescribimos el método de la clase heredada  FormRequest para traducir los mensajes
    public function messages()
    {
        return [
            'nombre.required' => 'El :attribute es obligatorio.',
            'apellidos.required' => 'El/los :attribute es obligatorio.',
            'oferta.required' => 'Debes hacer una :attribute si estás interesado.',
            'direccion.required' => 'Necesitamos saber tu :attribute .',
            'telefono.required' => 'El :attribute es para ponernos en contacto, por favor, proporciona uno.'
        ];
    }
}
