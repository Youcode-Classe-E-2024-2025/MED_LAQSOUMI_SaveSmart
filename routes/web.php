<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;





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
Route::get('/profile/manage', [ProfileController::class, 'edit'])->name('profile.manage');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/delete/{id}', [ProfileController::class, 'destroy'])->name('profile.delete');

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


// Category routes
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');


// Transaction routes
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
Route::post('/transaction/delete/{id}', [TransactionController::class, 'destroy'])->name('transaction.delete');
Route::get('/transaction/{id}', [TransactionController::class, 'show'])->name('transaction.show');
Route::post('/transaction/update/{id}', [TransactionController::class, 'update'])->name('transaction.update');