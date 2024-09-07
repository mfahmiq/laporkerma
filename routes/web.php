<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('login/index');
=======

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('dashboard');
>>>>>>> a08391c349c428e5762a699e9b0a3feb4c7f8e72
});

Route::get('/kerma', function () {
    return view('kerjasama/kerma');
});

Route::get('/kerma/create', function () {
    return view('kerjasama/kermaCreate');
})->name('kerma.create');

Route::get('/kerma/edit', function () {
    return view('kerjasama/kermaEdit');
})->name('kermaEdit');

<<<<<<< HEAD
=======
Route::get('/mitra', function () {
    return view('mitra/mitra');
});


>>>>>>> a08391c349c428e5762a699e9b0a3feb4c7f8e72
Route::get('/profile', function () {
    return view('profil/profile');
});

<<<<<<< HEAD
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/mitra', MitraController::class)->middleware('auth');
=======

>>>>>>> a08391c349c428e5762a699e9b0a3feb4c7f8e72
