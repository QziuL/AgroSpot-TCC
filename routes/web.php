<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'viewIndex'])->name('index');

Route::get('/login', [EventController::class, 'viewLogin'])->name('login.view');

Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register.view');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');