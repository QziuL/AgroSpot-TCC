<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('initial');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});