<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class EventController extends Controller
{
    public function viewIndex() {
        $produtosRecentes = Produto::orderBy('created_at', 'DESC')->get();

        return view('initial', ['produtosRecentes' => $produtosRecentes]);
    }
}
