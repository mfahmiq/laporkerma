<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegisterController;

// Route untuk halaman utama
Route::get('/', function () {
    return view('login/index');
});

// Route untuk halaman login
Route::get('/login', function () {
    return view('login');
});

// Route untuk halaman kerma
Route::get('/kerma', function () {
    return view('kerjasama/kerma');
});

// Route untuk membuat kerma
Route::get('/kerma/create', function () {
    return view('kerjasama/kermaCreate');
})->name('kerma.create');

// Route untuk mengedit kerma
Route::get('/kerma/edit', function () {
    return view('kerjasama/kermaEdit');
})->name('kermaEdit');

// Route profile
Route::get('/profile', function () {
    return view('profil/profile');
});

// Route login menggunakan controller
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route register menggunakan controller
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Route dashboard
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

// Resource route untuk mitra
Route::resource('/mitra', MitraController::class)->middleware('auth');