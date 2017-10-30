<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MttnCorrectivoRequest extends FormRequest
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
            'nOrden'=>'unique:ordens',
        ];
    }
    public function messages(){
      return [
        'nOrden.unique' => '¡ Orden de trabajo ingresada ya fue realizada por favor ingrese una nueva orden !',       

         ];
    }
}
