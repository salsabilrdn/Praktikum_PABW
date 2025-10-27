<?php

use Illuminate\Support\Facades\Route; // Import class Route untuk mendefinisikan URL
use App\Http\Controllers\DataController; // Import controller DataController

// Routing sederhana: menampilkan teks langsung di browser
Route::get('/hello', function () {
    return "Hello, Salsabila Rahmadina"; // Teks yang ditampilkan di browser
});

// Routing dengan parameter wajib
Route::get('/user/{name}', function ($name) {
    return "Nama Saya $name"; // {name} dari URL dikirim ke fungsi
});

// Routing dengan parameter opsional
Route::get('/greet/{name?}', function ($name = 'Guest') {
    return "Halo, $name"; // Kalau parameter kosong, pakai default 'Guest'
});

// Routing ke view profile.blade.php
Route::get('/profile', function () {
    return view('profile'); // Memanggil view Blade di resources/views/profile.blade.php
});

// Routing ke view about.blade.php dengan data
Route::get('/about', function () {
    return view('about', ['name' => 'Nama anda']); 
    // Mengirim data 'name' ke view, bisa dipanggil dengan {{ $name }}
});

// Routing dengan nama (Named Route)
Route::get('/home', function () {
    return 'Halo, Ini adalah halaman Home'; // Teks sederhana
})->name('home.page'); // Route bisa dipanggil di view pakai route('home.page')

// Routing ke method 'form' di DataController
Route::get('/form', [DataController::class, 'form']); 
// Menampilkan halaman form input data

// Routing ke method 'proses' di DataController untuk POST request
Route::post('/proses', [DataController::class, 'proses']); 
// Memproses data dari form dan menampilkan hasil