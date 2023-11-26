<?php

use App\Http\Controllers\{
    EventController,
    LoginController,
    IndexController,
    RegisterController,
    ProdutoController,
    AgricultorController,
    FeiraController,
    AdminController,
};

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
Route::get('/registerFeira', [FeiraController::class, 'show'])->name('showFeira.cadastro')->middleware('auth');
Route::post('/registerFeira', [FeiraController::class, 'store'])->name("storeFeira")->middleware('auth');

Route::get('/dashboard', [IndexController::class, 'redirectDashboard'])->name('redirect.dashboard')->middleware('auth');
Route::get('/dashboard/admin', [AdminController::class, 'show'])->name('admin.dashboard')->middleware('auth');

Route::get('/dashboard/agricultor', [AgricultorController::class, 'dashboard'])->name('agricultor.dashboard')->middleware('auth');
Route::get('/dashboard/agricultor/addProduto', [AgricultorController::class, 'show'])->name('showAddProduto')->middleware('auth');
Route::get('/dashboard/agricultor/listProdutos', [AgricultorController::class, 'listProdutos'])->name('listProdutos')->middleware('auth');
Route::post('/dashboard/agricultor/addProduto/{id}', [AgricultorController::class, 'addProduto'])->name('addProduto')->middleware('auth');
Route::delete('/dashboard/agricultor/removeProduto/{id}', [AgricultorController::class, 'destroy'])->name('removeProduto')->middleware('auth');

Route::get('/agricultores', [AgricultorController::class, 'list'])->name('listar.agricultores');

Route::get('/feiras', [FeiraController::class, 'list'])->name('listar.feiras');

Route::get('/embreve', [IndexController::class, 'emBreve'])->name('embreve');