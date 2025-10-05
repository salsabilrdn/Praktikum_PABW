<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AngkotController extends Controller
{
    public function form()
    {
        return view('lapor');
    }

    public function proses(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'trayek' => $request->trayek,
            'nomor' => $request->nomor,
            'keluhan' => $request->keluhan,
        ];

        return view('hasil', $data);
    }
}