<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'nPlaca'=>'unique:vehiculos',
            //'nInventario'=>'unique:vehiculos',
        ];
    }
    public function messages(){
      return [
        'nPlaca.unique' => '¡Número de Placa que ha ingresado ya se encuentra registrada!',
        //'nInventario.unique' => '¡Verifique el numero de Inventario ingresado al parecer ya ha sido asignado!',

         ];
    }
}
