<?php

namespace Kairos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValeRequest extends FormRequest
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
            //
            
        'nVale'=>'unique:vales_combustibles',
         
    
        ];
    }
    public function messages(){
       return [
         'nVale.unique' => '¡Numero de Vale ya registrado!',
         
     ];
     }
}
