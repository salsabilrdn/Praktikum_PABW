<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class NgangkotController extends Controller
{
    public function index()
    {
        $namaPengguna = 'Sabil'; // bisa ganti sesuai session/login nanti
       
        return view('index', compact('namaPengguna'));
    }

    
    public function history()
    {
        // Dummy data sementara
        $keluhan = [
            ['tujuan_keluhan'=>'Rute 5 terlambat','tgl_keluhan'=>'2025-10-14','isi_keluhan'=>'Angkot terlambat','lampiran'=>null],
            ['tujuan_keluhan'=>'Angkot rusak','tgl_keluhan'=>'2025-10-13','isi_keluhan'=>'Jok sobek','lampiran'=>'angkot1.jpg']
        ];
        $laporanSudahDirespons = [$keluhan[0]];
        $laporanBelumDirespons = [$keluhan[1]];

        return view('history_laporan', compact('keluhan','laporanSudahDirespons','laporanBelumDirespons'));
    }

    public function lapor()
{
    // Jika mau pakai dummy view dulu tanpa database
    return view('lapor'); // pastikan file resources/views/lapor.blade.php ada
}

    public function lihatTrayekPosisi()
{
    // Ambil data trayek dari database (dummy dulu atau pakai query nyata)
    $trayek =  collect([
        ['idtrayek' => 1, 'titik_awal' => 'Stasiun Hall', 'titik_akhir' => 'Gunung Batu', 'gambar' => 'trayek1.jpg'],
        ['idtrayek' => 2, 'titik_awal' => 'Terminal Ledeng', 'titik_akhir' => 'Cicaheum', 'gambar' => 'trayek2.jpg'],
    ]);

    return view('lihattrayekposisi', compact('trayek'));
    }

    public function tipsFaq()
{
    // Data dummy, bisa diganti database nanti
    $tips = [
        ['judul' => 'Selalu pakai sabuk pengaman', 'deskripsi' => 'Pastikan selalu aman saat naik angkot.'],
        ['judul' => 'Perhatikan rute', 'deskripsi' => 'Kenali trayek agar tidak tersesat.'],
    ];

    $faq = [
        ['pertanyaan' => 'Bagaimana cara naik angkot?', 'jawaban' => 'Naik di halte atau tepi jalan yang aman.'],
        ['pertanyaan' => 'Bagaimana cara mengetahui trayek?', 'jawaban' => 'Cek peta atau tanyakan kepada sopir.'],
    ];

    return view('tipsfaq', compact('tips', 'faq'));
    }
}