<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoVMRequest extends FormRequest
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
            'TipoVM'=>'unique:tipo_vmqs',
        ];
    }
    public function messages(){
       return [
         'TipoVM.unique' => '¡ Tipo que intenta registrar ya se encuentra en uso !',
         ];
     }
}
