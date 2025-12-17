<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LamaranApiController;

Route::get('/lamaran', [LamaranApiController::class, 'index']);
Route::post('/lamaran', [LamaranApiController::class, 'store']);
