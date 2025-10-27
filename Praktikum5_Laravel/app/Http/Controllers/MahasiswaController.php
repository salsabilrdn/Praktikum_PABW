<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa; // ← pastikan ini ada
class MahasiswaController extends Controller
{
    //Tampilkan form input
    public function form()
    {
        return view('form');
    }

    //simpan data dari form
    public function simpan(Request $request)
    {
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
        ]); 
        return "Data Mahasiswa berhasil disimpan!";
    }

    //Tampilkan daftar mahasiswa
    public function daftar()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa', ['mahasiswa' => $data]);
    }
}
