<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show() {
        $produtos = Produto::all();

        return view('index', ['produtos' => $produtos]);
    }

    public function viewInitial() {
        $produtosRecentes = Produto::orderBy('created_at', 'DESC')->take(3)->get();

        return view('initial', ['produtosRecentes' => $produtosRecentes]);
    }
}
