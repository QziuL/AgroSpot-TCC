<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agricultor;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function viewRegister() {
        return view('register');
    }

    public function viewRegisterAgricultor() {
        return view('registerAgricultor');
    }

    public function store(Request $request) {
        
        // 0 == usuario comum
        // 1 == agricultor
        if(intval($request->button_radio) == 0)
        {
            $usuario = new User();
            $usuario->name              = mb_strtoupper($request->name, 'UTF-8');
            $usuario->phone             = $request->phone;
            $usuario->email             = $request->email;
            $usuario->password          = bcrypt($request->password);
            //$usuario->agricultor        = intval($request->button_radio);     //boolval($request->button_radio);
            
            $usuario->save();

            return redirect()->route('login')->with('msg', 'Sucesso ao cadastrar!');
        }
        else
        {
            // $agricultor = new Agricultor();
            // $agricultor->cpf                = $request->cpf;
            // $agricultor->name               = mb_strtoupper($request->name, 'UTF-8');
            // $agricultor->phone              = $request->phone;
            // $agricultor->password           = bcrypt($request->password);
            // $agricultor->email              = $request->email;
            // $agricultor->cep                = $request->cep;
            // $agricultor->cidade             = mb_strtoupper($request->city, 'UTF-8');
            // $agricultor->nome_propriedade   = mb_strtoupper($request->nomePropriedade, 'UTF-8');

            // $agricultor->save();

            $usuario = new User();
            $usuario->name              = mb_strtoupper($request->name, 'UTF-8');
            $usuario->phone             = $request->phone;
            $usuario->email             = $request->email;
            $usuario->password          = bcrypt($request->password);
            
            $usuario->save();

            // $email = $usuario->email;
            // $user_id = User::where('email', $email)->first()->id;

            return redirect()->route('register.agricultor')->with('msg', 'Sucesso ao cadastrar!');
        }
    }

    public function storeAgricultor(Request $request) {
        $user_id = User::first()->id;
        dd($user_id);
    }
}
