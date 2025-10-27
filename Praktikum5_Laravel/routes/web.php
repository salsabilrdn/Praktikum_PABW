<?php

use App\Http\Controllers\MahasiswaController;

Route::get('/form', [MahasiswaController::class, 'form']);
Route::post('/simpan', [MahasiswaController::class, 'simpan']); // POST, jangan akses langsung
Route::get('/daftar-mahasiswa', [MahasiswaController::class, 'daftar']);
