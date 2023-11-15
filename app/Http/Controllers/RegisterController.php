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
        $user_id = request('user_id');
        return view('registerAgricultor', ['user_id' => $user_id]);
    }

    public function store(Request $request) {
        
        // 0 == usuario comum
        // 1 == agricultor
        // 2 == admin
        if(intval($request->button_radio) == 0)
        {
            $usuario = new User();
            $usuario->name              = mb_strtoupper($request->name, 'UTF-8');
            $usuario->phone             = $request->phone;
            $usuario->email             = $request->email;
            $usuario->password          = bcrypt($request->password);
            $usuario->tipo              = 0;
            
            $usuario->save();

            return redirect()->route('login')->with('msg', 'Sucesso ao cadastrar!');
        }
        else
        {
            $usuario = new User();
            $usuario->name              = mb_strtoupper($request->name, 'UTF-8');
            $usuario->phone             = $request->phone;
            $usuario->email             = $request->email;
            $usuario->password          = bcrypt($request->password);
            $usuario->tipo              = 1;             
            
            $usuario->save();

            return redirect()->route('register.agricultor', ['user_id' => $usuario->id])->with('msg', 'Sucesso ao cadastrar!');
        }
    }

    public function storeAgricultor(Request $request) {
        $agricultor = new Agricultor();
        $agricultor->user_id            = $request->user_id;
        $agricultor->cpf                = $request->cpf;
        $agricultor->cep                = $request->cep;
        $agricultor->cidade             = mb_strtoupper($request->cidade, 'UTF-8');
        $agricultor->nome_propriedade   = mb_strtoupper($request->nomePropriedade, 'UTF-8');

        $agricultor->save();

        return redirect()->route('login')->with('msg', 'Sucesso ao cadastrar!');
    }
}
