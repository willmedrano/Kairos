<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotoristaRequest extends FormRequest
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
          'telefonoMot'=>'unique:motoristas',
          'DUI'=>'unique:motoristas',
          'licencia'=>'unique:motoristas',
      ];
    }
    public function messages(){
      return [
        'telefonoMot.unique' => '¡El numero de teléfono que ha ingresado ya esta en uso !',
        'DUI.unique' => '¡Verifique el numero de DUI ingresado al parecer ya ha sido registrado ese numero de DUI!',
        'licencia.unique' => '¡Verifique el numero de licencia ingresado al parecer ya ha sido registrado ese numero de licencia!',

    ];
    }
}
