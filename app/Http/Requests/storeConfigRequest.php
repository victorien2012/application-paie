<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeConfigRequest extends FormRequest
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
            'type' => 'required|unique:configurations,type',
            'value' => 'required'
        ];
    }

    public function messages(){
        return [
            'type.required'=>'le type de configuration est requis',
            'type.unique'=>'cette configuration existe déjà',
            'value.required'=>'la valeur de la configurationb est requise'

        ];
    }

}
