<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployerRequest extends FormRequest
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
            'departement_id'=>'required|integer',
            'first_name'=>'required',
            'last_name'=>'required',
            'sexe'=>'required|string',
            'contact'=>'required',
            'email'=>'required',
            'montant_journalier' => 'required|numeric|min:3'
        ];


    }


    public function messages()
    {
        return [
            'departement_id'=>'le choix du département est requis',
            'first_name.required'=>'le nom  est requis',
            'last_name.unqiue'=>'le prénom est requis',
            'email.unqiue'=> 'le mail est requis',
            'contact.unqiue'=>'le contact est requis',
            'sexe.required'=>'le sexe est requis',
            'montant_journalier.unqiue'=>'le montant journalier est requis'
        ];
    }
}
