<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveDepartementRequest extends FormRequest
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

    // les règles de gestion
    public function rules()
    {
        return [
            'name'=>'required|unique:departements,name'
        ];
    }

    // les messages d'erreur
    public function messages()
    {
        return [
                'name.required'=>'le nom du département est requis',
                'name.unqiue'=>'le nom du département existe déjà'
            ];
    }
}
