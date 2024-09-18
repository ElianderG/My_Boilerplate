<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function create(){
        return inertia('Auth/Login');
    }

    public function store(Request $request){
        $credentials = $request -> validate([
            'email' => ['required', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'min:8']
        ]);

        if(Auth::attempt($credentials, $request->boolean('remember'))){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas',
        ])->onlyInput('email');
    }

    public function destroy(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

}
