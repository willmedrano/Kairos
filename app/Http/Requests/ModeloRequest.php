<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeloRequest extends FormRequest
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
            'nomModelo'=>'unique:modelos',
        ];
    }
    public function messages(){
       return [
         'nomModelo.unique' => '¡ El nombre de esta modelo ya se encuentra registrado !',
         ];
     }
}
