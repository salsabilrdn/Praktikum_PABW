<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;

Route::get('/', function () {
    return redirect()->route('kontaks.index');
});

Route::resource('kontaks', KontakController::class);