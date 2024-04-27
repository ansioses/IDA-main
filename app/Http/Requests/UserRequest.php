<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    //validación de los datos proporcionados para un usuario
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'two_factor_secret' => 'string',
            'two_factor_recovery_codes' => 'string',
            //esto permite comprobar si se ha puesto la misma contraseña en los dos campos del formulario
            //para saber que no se ha escrito mal
            'password' => 'required|confirmed'
        ];
    }
}
