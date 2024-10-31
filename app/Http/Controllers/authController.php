<?php

namespace App\Http\Controllers;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(){
        return view('auth.login');

    }

    public function handleLogin(AuthRequest $request){
//        dd($request->only(['email', 'password']));

        //compare les données du formulaire et celle de la bd
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Votre email ou mot de passe est incorrect. Veuillez réessayer.',
        ])->onlyInput('email');
    }
}
