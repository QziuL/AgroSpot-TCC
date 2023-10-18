<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function viewIndex() {
        return view('initial');
    }

    public function viewLogin() {
        return view('login');
    }
}
