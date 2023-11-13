<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function show() {
        return view('inserirProdutoDashboard');
    }

    public function storeProduto(Request $request) {
        $produto = new Produto();

        $produto->nome = mb_strtoupper($request->nome, 'UTF-8');
        $produto->descricao = $request->descricao;
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
}
