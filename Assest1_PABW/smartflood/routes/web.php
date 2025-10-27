<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/main', function () {
    return view('main' );
});

Route::get('/navbar', function () {
    return view('main');
});

Route::get('/form', [SensorController::class, 'prosesData' ]); 
Route::post('/hasil-sensor', [SensorController::class, 'hasil-sensor' ]); 

Route::get('/navbar', function () {
    return view('main');
});

