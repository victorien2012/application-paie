<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' =>'required|email',
            'password' =>'required'

        ];
    }

    public function message(){
        return [
            'email.required'=>'le mail est obligatoire',
            'email.email' =>'Mauvais format du mail',
            'password.required' =>'le mot de pass est obligatorie'

        ];
    }
}
