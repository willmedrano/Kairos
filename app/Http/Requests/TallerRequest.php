<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TallerRequest extends FormRequest
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
            'nomTallerE'=>'unique:taller_es',
            'telefonoTE'=>'unique:taller_es',
            'celTE'=>'unique:taller_es',
        ];
    }
    public function messages(){
      return [
        'nomTallerE.unique' => '¡Este taller ya se encuentra registrado!',
        'telefonoTE.unique' => '¡Verifique el numero de telefono ingresado al parecer ya ha sido registrado!',
        'celTE.unique' => '¡Verifique el numero de celular ingresado al parecer ya ha sido registrado!',

         ];
    }
}
