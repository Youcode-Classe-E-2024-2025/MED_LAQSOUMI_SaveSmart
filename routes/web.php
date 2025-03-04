<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use PharIo\Manifest\Author;

//Auth routes
Route::get('/', [AuthController::class, 'Home'])->name('home');
Route::get('/login-user', [AuthController::class, 'showLogin'])->name('login.user');
Route::get('/register-user', [AuthController::class, 'showRegister'])->name('register.user');
Route::post('/create-user', [AuthController::class, 'createUser'])->name('create.user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');
// Dashboard routes
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

//Profile routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');