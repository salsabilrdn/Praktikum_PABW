<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::all();
        return view('lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        return view('lowongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'posisi' => 'required', 
            'perusahaan' => 'required',
            'lokasi_kerja' => 'required',
        ]);

        Lowongan::create($request->all());

        return redirect()->route('lowongan.index')
            ->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function edit(Lowongan $lowongan)
    {
        return view('lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'posisi' => 'required',
            'perusahaan' => 'required',
            'lokasi_kerja' => 'required',
        ]);

        $lowongan->update($request->all());

        return redirect()->route('lowongan.index')
            ->with('success', 'Lowongan berhasil diperbarui');
    }

    public function destroy(Lowongan $lowongan)
    {
        $lowongan->delete();

        return redirect()->route('lowongan.index')
            ->with('success', 'Lowongan berhasil dihapus');
    }
}