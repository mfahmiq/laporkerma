<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KermaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

// Route untuk halaman utama (redirect ke login jika user belum login)
Route::get('/', function () {
    return redirect()->route('login');
});

// Route login menggunakan controller
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route register menggunakan controller
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Resource route untuk kerma, dengan middleware auth
Route::resource('/kerma', KermaController::class)->middleware('auth');
Route::post('/kerma/upload', [KermaController::class, 'upload'])->name('kerma.upload');

// Resource route untuk mitra, dengan middleware auth
Route::resource('/mitra', MitraController::class)->middleware('auth');