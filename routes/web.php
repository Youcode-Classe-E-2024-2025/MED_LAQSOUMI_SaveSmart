<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'Home'])->name('home');
Route::post('/create-user', [AuthController::class, 'createUser'])->name('create.user');


