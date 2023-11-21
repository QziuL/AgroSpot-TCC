<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feira;

class FeiraController extends Controller
{
    public function show() {
        return view("inserirFeiraDashboard");
    }

    public function store(Request $request){
        $feira = new Feira();

        $feira->nome = mb_strtoupper($request->nome, 'UTF-8');
        $feira->cep = $request->cep;
        $feira->cidade = mb_strtoupper($request->cidade);
        $feira->descricao = $request->descricao;

        $feira->save();

        return redirect()->route('index')->with('msg', 'Feira adicionada com sucesso!');
    }
}
