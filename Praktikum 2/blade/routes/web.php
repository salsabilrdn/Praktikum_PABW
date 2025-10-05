<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/hello', function () {
    return "Hello, Salsabila Rahmadina";
});

Route::get('/user/{name}', function ($name) {
    return "Nama Saya $name";
});

Route::get('/greet/{name?}', function ($name = 'Guest') {
    return "Halo, $name";
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/about', function () {
    return view('about', ['name' => 'Nama anda']);
});

Route::get('/home', function () {
    return 'Halo, Ini adalah halaman Home';
})->name('home.page');

Route::get('/form', [DataController::class, 'form']);
Route::post('/proses', [DataController::class, 'proses']);