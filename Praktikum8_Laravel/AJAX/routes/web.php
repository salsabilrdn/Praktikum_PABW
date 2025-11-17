<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController; 

Route::get('/', function () {
    return view('welcome');
});

// 1. Resource Route (CRUD: index, create, store, edit, update, destroy)
Route::resource('mahasiswa', MahasiswaController::class)->except(['show']); 

// 2. Custom Route untuk AJAX
// Route ini akan digunakan oleh jQuery AJAX untuk mengambil data JSON.
Route::get('/mahasiswa/get-data', [MahasiswaController::class, 'getData'])->name('mahasiswa.get-data');