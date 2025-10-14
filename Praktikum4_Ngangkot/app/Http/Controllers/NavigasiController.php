<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class NavigasiController extends Controller
{
    // Halaman navigasi
    public function index()
    {
        // Contoh data lokasi
        $lokasi = [
            'Terminal Ledeng',
            'Alun-alun Bandung',
            'Stasiun Bandung',
            'Gedung Sate',
            'Cihampelas Walk',
            'ITB'
        ];

        return view('navigasi', compact('lokasi'));
    }

    // Fungsi cari trayek angkot (AJAX)
    public function cariAngkot(Request $request)
    {
        $awal = $request->query('awal');
        $tujuan = $request->query('tujuan');

        $angkotList = [
            [
                'kode_angkot' => 'A1',
                'rute' => 'Terminal Ledeng - Stasiun Bandung',
                'tarif' => 5000,
                'estimasi' => 25
            ],
            [
                'kode_angkot' => 'B2',
                'rute' => 'Gedung Sate - Alun-alun Bandung',
                'tarif' => 4000,
                'estimasi' => 15
            ]
        ];

        $hasil = array_filter($angkotList, function($angkot) use ($awal, $tujuan) {
            return stripos($angkot['rute'], $awal) !== false && stripos($angkot['rute'], $tujuan) !== false;
        });

        return response()->json(array_values($hasil));
    }
}