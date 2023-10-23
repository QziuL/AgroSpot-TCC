<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // FUNÇÃO DE AUTENTICAÇÃO 
    public function auth(Request $request)
    {   $credenciais = $request->validate([
            'email' => ['required', 'email'],   // PRIMEIRO PARÂMETRO DEFINE SE É REQUIRED OU NÃO, O SEGUNDO DEFINE O FORMATO DO DADO (NO CASO EMAIL)
            'password' => ['required'],         // O SEGUNDO PARAMÊTRO NÃO SE APLICA, JÁ QUE A SENHA TEM HASH
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
 
            return redirect()->intended('produtos.index');      // O 'INTENDED' REDIRECIONA PARA A PÁGINA DESEJADA 
        }
    }
}
