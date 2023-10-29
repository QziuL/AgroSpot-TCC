<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function viewRegister() {
        return view('register');
    }

    public function store(Request $request) {
        $usuario = new User();

        $usuario->name = mb_strtoupper($request->name, 'UTF-8');
        $usuario->email = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->phone = $request->phone;
        $usuario->agricultor = intval($request->agricultor);
        $usuario->cep = $request->cep;
        $usuario->cidade = $request->city;
        $usuario->nome_propriedade = $request->nomePropriedade;

        if($request->agricultor == 0){ $usuario->agricultor = $request->agricultor; }
        else
        {
            $usuario->agricultor = $request->agricultor;
            $usuario->cep = $request->cep;
            $usuario->cidade = $request->city;
            $usuario->nome_propriedade = $request->nomePropriedade;
        }



        $usuario->save();

        return redirect('/')->with('msg', 'Sucesso ao cadastrar!');
        // dd($request->all());
    }
}
