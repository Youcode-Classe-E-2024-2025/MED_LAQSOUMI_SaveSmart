<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'Home'])->name('home');
Route::post('/create-user', [AuthController::class, 'createUser'])->name('create.user');
Route::get('/login-user', [AuthController::class, 'loginUser'])->name('login.user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');


