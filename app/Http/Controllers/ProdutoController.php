<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Agricultor;

class ProdutoController extends Controller
{
    public function show() {
        return view('inserirProdutoDashboard');
    }

    public function storeProduto(Request $request) {
        $produto = new Produto();

        $produto->nome = mb_strtoupper($request->nome, 'UTF-8');
        $produto->descricao = mb_strtoupper($request->descricao, 'UTF-8');
        $produto->codigo = $request->codigo;
        $produto->disponibilidade = $request->bt_radio_disponibilidade;

        if($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            
            $requestImage->move(public_path('img/produtos'), $imageName);

            $produto->image = $imageName;
        }

        $produto->save();

        return redirect()->route('index')->with('msg','Produto adicionado com sucesso !!');
    }

    public function selecionado() {
        $produtos = Produto::all();
        $agricultores = Agricultor::all();

        // dd($agricultores);
        return view('listProdutoSelecionado', ['produtos' => $produtos, 'agricultores' => $agricultores]);
    }
}
