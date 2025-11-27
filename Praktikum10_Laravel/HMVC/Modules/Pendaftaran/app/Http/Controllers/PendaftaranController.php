<?php

namespace Modules\Pendaftaran\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Pendaftaran\Models\Daftar;

class PendaftaranController extends Controller
{
    // 1. Menampilkan View Utama
    public function index()
    {
        return view('pendaftaran::index');
    }

    // 2. Mengambil Data (Read AJAX)
    public function getData()
    {
        $pendaftarans = Daftar::latest()->get();
        return response()->json($pendaftarans);
    }

    // 3. Menyimpan atau Memperbarui Data (Create/Update AJAX)
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'prodi_tujuan' => 'required',
        ]);

        Daftar::updateOrCreate(
            ['id' => $request->id],
            $request->all()
        );

        return response()->json(['success' => 'Data berhasil disimpan.']);
    }

    // 4. Mengambil Data untuk Diedit (Edit AJAX)
    public function edit($id)
    {
        $pendaftaran = Daftar::find($id);
        return response()->json($pendaftaran);
    }

    // 5. Menghapus Data (Delete AJAX)
    public function destroy($id)
    {
        Daftar::find($id)->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}