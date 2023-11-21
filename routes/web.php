<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AgricultorController;
use App\Http\Controllers\FeiraController;

use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'viewInitial'])->name('initial');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register');
Route::get('/register/agricultor', [RegisterController::class, 'viewRegisterAgricultor'])->name('register.agricultor');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::post('/register/agricultor', [RegisterController::class, 'storeAgricultor'])->name('register.storeAgricultor');

Route::get('/index', [IndexController::class, 'show'])->name('index');
Route::get('/index/produto', [ProdutoController::class, 'selecionado']);

Route::get('/registerProduto', [ProdutoController::class,'show'])->name('showProduto.cadastro')->middleware('auth');
Route::post('/registerProduto', [ProdutoController::class,'storeProduto'])->name('storeProduto.cadastro')->middleware('auth');
Route::get('/registerFeira', [FeiraController::class, 'show'])->middleware('auth');
Route::post('/registerFeira', [FeiraController::class, 'store'])->name("storeFeira")->middleware('auth');


Route::get('/dashboard/addProduto', [AgricultorController::class, 'show'])->name('showAddProduto')->middleware('auth');
Route::get('/dashboard/listProdutos', [AgricultorController::class, 'listProdutos'])->name('listProdutos')->middleware('auth');
Route::post('/dashboard/addProduto/{id}', [AgricultorController::class, 'addProduto'])->name('addProduto')->middleware('auth');
Route::delete('/dashboard/removeProduto/{id}', [AgricultorController::class, 'destroy'])->name('removeProduto')->middleware('auth');
