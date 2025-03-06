<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

//Auth routes
Route::get('/', [AuthController::class, 'Home'])->name('home');
Route::get('/login-user', [AuthController::class, 'showLogin'])->name('login.user');
Route::get('/register-user', [AuthController::class, 'showRegister'])->name('register.user');
Route::post('/create-user', [AuthController::class, 'createUser'])->name('create.user');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('login.user');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout.user');

//Profile routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profiles');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
Route::get('/profile/manage/{id}', [ProfileController::class, 'edit'])->name('profile.manage');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');

// Dashboard routes
Route::get('/dashboard/{id}', [DashboardController::class, 'dashboard'])->name('dashboard');