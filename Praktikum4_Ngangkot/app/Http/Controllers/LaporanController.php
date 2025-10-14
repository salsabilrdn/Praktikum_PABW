<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LaporanController extends Controller
{
    public function create()
    {
        $namaPengguna = session('user_name'); // ambil dari session kalau pakai session
        return view('lapor', compact('namaPengguna'));
    }

    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'tujuan' => 'required|string|max:255',
            'keluhan' => 'required|string',
            'lampiran' => 'nullable|file|max:2048' // 2MB contohnya
        ]);

        // handle lampiran (jika ada)
        $lampiranName = null;
        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('uploads', 'public'); // simpan di storage/app/public/uploads
            $lampiranName = basename($path);
        }

        // simpan ke DB
        $idkeluhan = Str::upper(Str::random(8)); // atau generate id sesuai kebutuhan
        DB::table('keluhan')->insert([
            'idkeluhan' => $idkeluhan,
            'tgl_keluhan' => now(),
            'tujuan_keluhan' => $validated['tujuan'],
            'isi_keluhan' => $validated['keluhan'],
            'lampiran' => $lampiranName,
            'idpeng' => session('user_id') ?? null
        ]);

        // redirect dengan flash message
        return redirect()->route('lapor')->with('notif','success');
    }
}