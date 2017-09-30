<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
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
          'nomMarca'=>'unique:marcas',
        ];
    }
    public function messages(){
       return [
         'nomMarca.unique' => '¡ El nombre de esta marca ya se encuentra registrada !',
         ];
     }
}
