<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Agricultor;
use DB;

class AgricultorController extends Controller
{
    public function show() {
        $produtos = Produto::all();
        $user = auth()->user();
        $temProdutoAdicionado = false;
        $produtoAdicionado = array();
        $aux = 0;

        if($user)
        {
            $userProdutos = $user->produtos->toArray();
            
            foreach ($userProdutos as $userProduto) {
                foreach ($produtos as $produto) {
                    if($userProduto['id'] == $produto->id)
                    {
                        $temProdutoAdicionado = true;
                        $produtoAdicionado[$aux] = $produto->id;
                        $aux++;
                        break;
                    }
                }
            }
        }
        
        $aux = 0;
        return view('agricultorAdicionarProduto', 
        [
            'produtos' => $produtos, 
            'user' => $user,
            'produtosAdicionado' => $produtoAdicionado,
            'aux' => $aux,
        ]);
    }

    public function listProdutos() {
        $user = auth()->user();
        // $produtos_id = DB::table('produto_user')->where('user_id', $user->id)->get('produto_id');
        $produtosDoUsuario = $user->produtos;

        //$values = Produto::where('id', $produtos_id);
        // $values = Produto::all()->where('id', $produtos_id[0]);

        
        return view('agricultorListProdutos', ['produtos' => $produtosDoUsuario]);
    }

    public function addProduto($id) {
        $agricultor = auth()->user();
        $agricultor->produtos()->attach($id);

        return redirect()->route('showAddProduto')->with('msg', 'Sucesso ao adicionar produto!');
    }

    public function destroy($id) {
        $agricultor = auth()->user();
        $agricultor->produtos()->detach($id);

        return redirect()->route('showAddProduto')->with('msg', 'Sucesso ao remover produto!');
    }
}
