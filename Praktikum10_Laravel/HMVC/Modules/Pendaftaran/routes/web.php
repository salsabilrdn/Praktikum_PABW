<?php

use Illuminate\Support\Facades\Route;
use Modules\Pendaftaran\Http\Controllers\PendaftaranController;

Route::group([], function () {

    // Halaman utama pendaftaran
    Route::get('pendaftaran', [PendaftaranController::class, 'index'])
        ->name('pendaftaran.index');

    // Ambil data (AJAX)
    Route::get('pendaftaran/data', [PendaftaranController::class, 'getData'])
        ->name('pendaftaran.data');

    // Simpan / update data (AJAX)
    Route::post('pendaftaran', [PendaftaranController::class, 'store'])
        ->name('pendaftaran.store');

    // Ambil data untuk edit (AJAX)
    Route::get('pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])
        ->name('pendaftaran.edit');

    // Hapus data (AJAX)
    Route::delete('pendaftaran/{id}', [PendaftaranController::class, 'destroy'])
        ->name('pendaftaran.destroy');
});
