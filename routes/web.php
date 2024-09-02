<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('dashboard');
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

Route::get('/mitra', function () {
    return view('mitra/mitra');
});


Route::get('/profile', function () {
    return view('profil/profile');
});


