<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'Home'])->name('home');
Route::post('/create-user', [AuthController::class, 'createUser'])->name('create.user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.user');
Route::post('/logout-user', [AuthController::class, 'logoutUser'])->name('logout.user');


