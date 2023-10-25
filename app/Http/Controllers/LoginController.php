<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    // FUNÇÃO DE AUTENTICAÇÃO 
    public function auth(Request $request)
    {   
        $credenciais = $request->validate([
            'email' => ['required', 'email'],   // PRIMEIRO PARÂMETRO DEFINE SE É REQUIRED OU NÃO, O SEGUNDO DEFINE O FORMATO DO DADO (NO CASO EMAIL)
            'password' => ['required'],         // O SEGUNDO PARAMÊTRO NÃO SE APLICA, JÁ QUE A SENHA TEM HASH
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
 
            return redirect()->intended();      // O 'INTENDED' REDIRECIONA PARA A PÁGINA DESEJADA OU PARA A TELA INICIAL
        } else {
            return redirect('/')->withErrors('Erro ao logar!!');

            // return back()->withErrors([
            //     'email' => 'The provided credentials do not match our records.',
            // ])->onlyInput('email');
        }

        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
