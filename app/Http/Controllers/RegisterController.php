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

        $usuario->name              = mb_strtoupper($request->name, 'UTF-8');
        $usuario->email             = $request->email;
        $usuario->password          = bcrypt($request->password);
        $usuario->phone             = $request->phone;
        $usuario->agricultor        = intval($request->button_radio);     //boolval($request->button_radio);
        
        if($usuario->agricultor == 0)
        {
            $usuario->cep               = null;
            $usuario->cidade            = null;
            $usuario->nome_propriedade  = null;
        }
        else
        {
            $usuario->cep               = $request->cep;
            $usuario->cidade            = mb_strtoupper($request->city, 'UTF-8');
            $usuario->nome_propriedade  = mb_strtoupper($request->nomePropriedade, 'UTF-8');
        }
        
        

        $usuario->save();

        return redirect()->route('index')->with('msg', 'Sucesso ao cadastrar!');

        // if($usuario->agricultor == 0){ $usuario->agricultor = intval($request->button_radio); }
        // else
        // {
        //     $usuario->agricultor        = $request->agricultor;
        //     $usuario->cep               = $request->cep;
        //     $usuario->cidade            = $request->city;
        //     $usuario->nome_propriedade  = $request->nomePropriedade;
        // }
       
        //dd($usuario);
    }
}
