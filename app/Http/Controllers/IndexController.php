<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show() {
        $busca = request('busca');

        if($busca) {
            $produtos = Produto::where([
                ['nome', 'like', '%'.$busca.'%']
            ])->get();
        }
        else {
            $produtos = Produto::all();
        }

        
        $user = auth()->user();

        return view('index', ['produtos' => $produtos, 'user' => $user, 'busca' => $busca]);
    }

    public function viewInitial() {
        $produtosRecentes = Produto::orderBy('created_at', 'DESC')->take(3)->get();

        return view('initial', ['produtosRecentes' => $produtosRecentes]);
    }

    public function redirectDashboard() {
        $user = auth()->user();

        if($user->tipo == 1) { return view('dashboardAgricultor', compact('user')); } 
        elseif ($user->tipo == 2) { return view('dashboardAdmin'); }
        else { return redirect()->back()->with('msg', 'Você não tem permissão !!'); }
    }

    public function emBreve() {
        return view('embreve');
    }
}
