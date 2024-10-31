<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEmployerRequest extends FormRequest
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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'sexe'=>'required|string',
            'contact'=>'required|unique:employers,contact',
            'email'=>'required|unique:employers,email',
            'montant_journalier' => 'required|numeric|min:3'
        ];
    }

    public function messages()
    {
        return [
            'departement_id'=>'le choix du département est requis',
            'first_name.required'=>'le nom du département est requis',
            'last_name.unqiue'=>'le nom du département est requis',
            'email.unqiue'=> 'le nom du département existe déjà',
            'contact.unqiue'=>'le nom du département existe déjà',
            'sexe.required'=>'veuillez préciser le sexe',
            'montant_journalier.unqiue'=>'le montant journalier est requis'
        ];
    }
}
