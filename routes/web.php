<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'viewIndex'])->name('index');

Route::get('/login', [EventController::class, 'viewLogin'])->name('login.view');

Route::get('/register', [EventController::class, 'viewRegister'])->name('register.view');