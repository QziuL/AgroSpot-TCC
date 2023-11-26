<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show() {
        
        if(auth()->user()->tipo == 2){
            return view('dashboardAdmin');
        } else { return redirect()->back(); }
        
    }
}
