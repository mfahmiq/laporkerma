<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/kerma', function () {
    return view('kerjasama/kerma');
});

Route::get('/mitra', function () {
    return view('mitra/mitra');
});


Route::get('/profile', function () {
    return view('profil/profile');
});

Route::get('/kerma/create', function () {
    return view('kerjasama/kermaCreate');
});

