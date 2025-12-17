<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;

class LamaranApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Lamaran::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'lowongan_id' => 'required',
            'deskripsi_lamaran' => 'required',
        ]);

        Lamaran::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Lamaran berhasil ditambahkan'
        ]);
    }
}
