<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Halaman dashboard (hanya untuk user yang sudah login & terverifikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua route di bawah ini hanya bisa diakses oleh user yang sudah login
Route::middleware('auth')->group(function () {
    // Profil (bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Hapus user (hanya admin yang diizinkan di UserController)
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Upload file
    Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
    Route::delete('/upload/{upload}', [UploadController::class, 'destroy'])->name('upload.destroy');
    
});

// // Autentikasi (login, register, dll)
require __DIR__.'/auth.php';
