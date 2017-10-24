<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MttnPreventivoRequest extends FormRequest
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
            'numTrabajo'=>'unique:mantenimiento_preventivos',
            'numTrabajo'=>'unique:mantenimiento_pre_maqs',
        ];
    }
    public function messages(){
      return [
        'numTrabajo.unique' => '¡ Orden de trabajo ingresada ya fue realizada por favor ingrese una nueva orden !',       

         ];
    }
}
