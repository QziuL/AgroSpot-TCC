<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'viewIndex'])->name('index');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register');
Route::get('/register/agricultor', [RegisterController::class, 'viewRegisterAgricultor'])->name('register.agricultor');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/register/agricultor', [RegisterController::class, 'storeAgricultor'])->name('register.storeAgricultor');

Route::get('/index', [IndexController::class, 'show'])->name('produtos')->middleware('auth');