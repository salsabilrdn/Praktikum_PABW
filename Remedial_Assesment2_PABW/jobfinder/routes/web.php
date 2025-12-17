<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LamaranApiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;

// ===== API (SIMULASI REST API) =====
Route::get('/api/lamaran', [LamaranApiController::class, 'index']);
Route::post('/api/lamaran', [LamaranApiController::class, 'store']);

// ===== WEB ROUTES =====
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('lowongan', LowonganController::class);

    Route::get('/lamaran', [LamaranController::class, 'index'])->name('lamaran.index');
    Route::get('/lamaran/create', [LamaranController::class, 'create'])->name('lamaran.create');
    Route::post('/lamaran', [LamaranController::class, 'store'])->name('lamaran.store');
});

require __DIR__.'/auth.php';
