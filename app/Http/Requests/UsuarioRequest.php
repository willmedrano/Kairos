<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
        'name'=>'unique:users',
         'password'=>'min:6',
         'email'=>'email|unique:users',
        ];
    }
    public function messages(){
       return [
         'name.unique' => '¡Nombre de usuario ya se encuentra en uso!',
         'password.min' => 'La Contraseña debe tener como minimo seis caracteres!',
         'email.unique' => '¡Al parecer este correo electrónico ya esta asociado a otra cuenta!',
         'email.email' => '¡Al parecer este correo electrónico no es válido!',
     ];
     }
}
