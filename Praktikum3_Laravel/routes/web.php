<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AngkotController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lapor', [AngkotController::class, 'form']);
Route::post('/proses', [AngkotController::class, 'proses']);
