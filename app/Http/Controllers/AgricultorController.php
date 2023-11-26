<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Agricultor;
use App\Models\User;
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

    public function list() {
        $userAuth = auth()->user();
        $busca = request('busca');

        if($busca) {
            $userAgricultores = User::where([
                ['name', 'like', '%'.$busca.'%', 'and', 'tipo', '==', 1]
            ])->get();

            $agricultores = array();
            $aux = 0;

            foreach ($userAgricultores as $agricultor) {
                $agricultores[$aux] = Agricultor::where([
                    ['user_id', '=', $agricultor->id]
                ])->get();
    
                $aux++;
            }

            $aux = 0;
            
        }
        else {
            $agricultores = Agricultor::all();

            $userAgricultores[] = new User();
            $aux = 0;

            foreach ($agricultores as $agricultor) {
                $userAgricultores[$aux] = User::where([
                    ['id', '=', $agricultor->user_id]
                ])->get();

                $aux++;
            }
            $aux = 0;
        }
        
        return view('listAgricultores', [
            'userAgricultores' => $userAgricultores,
            'aux' => $aux,
            'agricultores' => $agricultores,
            'user' => $userAuth,
            'busca' => $busca,
        ]);

        // else {

        // }
        
        // $agricultores = Agricultor::all();

        // $userAgricultores[] = new User();
        // $aux = 0;

        // foreach ($agricultores as $agricultor) {
        //     $userAgricultores[$aux] = User::where([
        //         ['id', '=', $agricultor->user_id]
        //     ])->get();

        //     $aux++;
        // }
        // $aux = 0;

        
    }

    public function listProdutos() {
        $user = auth()->user();
        // $produtos_id = DB::table('produto_user')->where('user_id', $user->id)->get('produto_id');
        $produtosDoUsuario = $user->produtos;

        //$values = Produto::where('id', $produtos_id);
        // $values = Produto::all()->where('id', $produtos_id[0]);
        return view('agricultorListProdutos', ['produtos' => $produtosDoUsuario, 'user' => $user]);
    }

    public function addProduto($id) {
        $agricultor = auth()->user();
        $agricultor->produtos()->attach($id);

        return redirect()->route('showAddProduto')->with('msg', 'Sucesso ao adicionar produto!');
    }

    public function destroy($id) {
        $agricultor = auth()->user();
        $agricultor->produtos()->detach($id);

        return redirect()->route('listProdutos')->with('msg', 'Sucesso ao remover produto!');
    }

    public function dashboard() {
        $user = auth()->user();

        if(auth()->user()->tipo == 1) {
            return view('dashboardAgricultor', compact('user'));
        }
        else { return redirect()->back(); }
    }
}
