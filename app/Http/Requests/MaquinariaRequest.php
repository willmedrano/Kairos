<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaquinariaRequest extends FormRequest
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
            'nEquipo'=>'unique:maquinarias',
            'nInventario'=>'unique:maquinarias',
        ];
    }
    public function messages(){
      return [
        'nEquipo.unique' => '¡Número de Equipo que ha ingresado ya se encuentra registrado!',
        'nInventario.unique' => '¡Verifique el numero de Inventario ingresado al parecer ya ha sido asignado!',

         ];
    }
}
