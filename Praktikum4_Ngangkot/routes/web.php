<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NgangkotController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController; // untuk logout
use App\Http\Controllers\NavigasiController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/navigasi', [NavigasiController::class, 'index'])->name('navigasi');
Route::get('/cari-angkot', [NavigasiController::class, 'cariAngkot']);

// Dashboard / Homepage
Route::get('/', [NgangkotController::class, 'index'])->name('index');

// Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

// Lapor Dinas
Route::get('/lapor', [LaporanController::class, 'create'])->name('lapor');
Route::post('/lapor', [LaporanController::class, 'store'])->name('lapor.store');

// Tips & FAQ
Route::get('/tipsfaq', [NgangkotController::class, 'tipsFaq'])->name('tipsfaq');


// Ngangkot Features
Route::get('/cari-angkot', [NgangkotController::class, 'cariAngkot'])->name('cari-angkot');
Route::get('/lihattrayekposisi', [NgangkotController::class, 'lihatTrayekPosisi'])->name('lihattrayekposisi');
Route::get('/history', [NgangkotController::class, 'history'])->name('history');

// Auth
// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
