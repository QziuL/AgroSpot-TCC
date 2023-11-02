<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'viewIndex'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login.view');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register.view');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/index', [IndexController::class, 'show'])->name('produtos.index')->middleware('auth');