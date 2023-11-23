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

    public function list() {
        $userAuth = auth()->user();
        $busca = request('busca');

        if($busca) {
            $feiras = Feira::where([
                ['nome', 'like', '%'.$busca.'%']
            ])->get();
        }
        else {
            $feiras = Feira::all();
        }

        return view('listFeiras', [
            'feiras' => $feiras,
            'busca' => $busca,
            'user' => $userAuth,
        ]);
    }
}
