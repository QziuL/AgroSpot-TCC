<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class AdminController extends Controller
{
    public function show() {
        
        if(auth()->user()->tipo == 2){
            return view('dashboardAdmin');
        } else { return redirect()->back(); }
        
    }

    public function showRemoverProduto() {
        $produtos = Produto::all();

        return view('removerProdutoDashboard', compact('produtos'));
    }

    public function RemoverProduto(Request $request) {
        Produto::findOrFail($request->id)->update(['disponibilidade' => 0]);

        $produtos = Produto::all();
        return redirect()->route('admin.dashboard');
    }
}
