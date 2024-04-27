<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfertaRequest extends FormRequest
{

    //si el usuario puede o no acceder a esta validación
    public function authorize(): bool
    {
        //el usuario puede usar la validación
        return true;
    }

    //reglas para la validación de los datos
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
