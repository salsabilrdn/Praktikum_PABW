@extends('layouts.main')

@section('title', 'Riwayat Laporan Angkot')

@section('content')
@php
    // Dummy data tanpa database
    $keluhan = [
        ['tujuan_keluhan' => 'Keterlambatan Rute 5', 'tgl_keluhan' => '2025-10-14', 'isi_keluhan' => 'Angkot datang terlambat 15 menit', 'lampiran' => null],
        ['tujuan_keluhan' => 'Kondisi Angkot Rusak', 'tgl_keluhan' => '2025-10-13', 'isi_keluhan' => 'Kaca pecah dan jok sobek', 'lampiran' => 'angkot1.jpg'],
        ['tujuan_keluhan' => 'Sopir Tidak Ramah', 'tgl_keluhan' => '2025-10-12', 'isi_keluhan' => 'Sopir marah-marah ke penumpang', 'lampiran' => null],
    ];

    $laporanSudahDirespons = array_slice($keluhan, 0, 2);
    $laporanBelumDirespons = array_slice($keluhan, 2);

    $totalLaporanSudahDirespons = count($laporanSudahDirespons);
    $totalLaporanBelumDirespons = count($laporanBelumDirespons);
    $totalSemuaLaporan = count($keluhan);
@endphp

<div class="bg-white rounded-xl p-6 shadow-lg border border-blue-200">
    <h2 class="text-4xl font-bold text-blue-700 text-center mb-6">Riwayat Laporan Angkot</h2>

    <div class="flex bg-blue-100 rounded-full p-1 mb-6">
        <button id="tabSemua" class="tab-button active flex-1 py-2 px-4 rounded-full text-blue-800 font-semibold transition-all duration-200" onclick="showTab('contentSemua')">
            Semua ({{ $totalSemuaLaporan }})
        </button>
        <button id="tabSudahDirespons" class="tab-button flex-1 py-2 px-4 rounded-full text-green-800 font-semibold transition-all duration-200" onclick="showTab('contentSudahDirespons')">
            Sudah Direspons ({{ $totalLaporanSudahDirespons }})
        </button>
        <button id="tabBelumDirespons" class="tab-button flex-1 py-2 px-4 rounded-full text-red-800 font-semibold transition-all duration-200" onclick="showTab('contentBelumDirespons')">
            Belum Direspons ({{ $totalLaporanBelumDirespons }})
        </button>
    </div>

    {{-- Semua Laporan --}}
    <div id="contentSemua" class="laporan-content space-y-4">
        @foreach ($keluhan as $laporan)
            <details class="bg-white rounded-lg p-4 shadow border border-blue-200">
                <summary class="font-bold text-blue-700 cursor-pointer">{{ $laporan['tujuan_keluhan'] }}</summary>
                <div class="mt-4 text-gray-700 text-sm">
                    <p><strong>Tanggal:</strong> {{ $laporan['tgl_keluhan'] }}</p>
                    <p><strong>Isi Keluhan:</strong> {{ $laporan['isi_keluhan'] }}</p>
                    <p><strong>Lampiran:</strong>
                        @if($laporan['lampiran'])
                            <a href="{{ asset('uploads/' . $laporan['lampiran']) }}" target="_blank" class="text-blue-600 hover:underline">Lihat Lampiran</a>
                        @else
                            Tidak ada lampiran
                        @endif
                    </p>
                </div>
            </details>
        @endforeach
    </div>

    {{-- Sudah Direspons --}}
    <div id="contentSudahDirespons" class="laporan-content space-y-4 hidden">
        @foreach ($laporanSudahDirespons as $laporan)
            <details class="bg-white rounded-lg p-4 shadow border border-green-200">
                <summary class="font-bold text-green-700 cursor-pointer">{{ $laporan['tujuan_keluhan'] }}</summary>
                <div class="mt-4 text-gray-700 text-sm">
                    <p><strong>Tanggal:</strong> {{ $laporan['tgl_keluhan'] }}</p>
                    <p><strong>Isi Keluhan:</strong> {{ $laporan['isi_keluhan'] }}</p>
                    <p><strong>Lampiran:</strong>
                        @if($laporan['lampiran'])
                            <a href="{{ asset('uploads/' . $laporan['lampiran']) }}" target="_blank" class="text-blue-600 hover:underline">Lihat Lampiran</a>
                        @else
                            Tidak ada lampiran
                        @endif
                    </p>
                    <p class="mt-4 text-green-700 font-semibold">Laporan ini telah ditanggapi oleh pihak terkait.</p>
                </div>
            </details>
        @endforeach
    </div>

    {{-- Belum Direspons --}}
    <div id="contentBelumDirespons" class="laporan-content space-y-4 hidden">
        @foreach ($laporanBelumDirespons as $laporan)
            <details class="bg-white rounded-lg p-4 shadow border border-red-200">
                <summary class="font-bold text-red-700 cursor-pointer">{{ $laporan['tujuan_keluhan'] }}</summary>
                <div class="mt-4 text-gray-700 text-sm">
                    <p><strong>Tanggal:</strong> {{ $laporan['tgl_keluhan'] }}</p>
                    <p><strong>Isi Keluhan:</strong> {{ $laporan['isi_keluhan'] }}</p>
                    <p><strong>Lampiran:</strong>
                        @if($laporan['lampiran'])
                            <a href="{{ asset('uploads/' . $laporan['lampiran']) }}" target="_blank" class="text-blue-600 hover:underline">Lihat Lampiran</a>
                        @else
                            Tidak ada lampiran
                        @endif
                    </p>
                </div>
            </details>
        @endforeach
    </div>

    <section class="flex justify-center space-x-8 mt-8 mb-6">
        <a href="{{ url('lapor') }}" class="px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition duration-200 text-center">Kembali</a>
        <a href="{{ url('/') }}" class="px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition duration-200 text-center">Dashboard</a>
    </section>
</div>

<script>
    function showTab(tabId) {
        const tabs = ['contentSemua', 'contentSudahDirespons', 'contentBelumDirespons'];
        tabs.forEach(id => {
            document.getElementById(id).classList.toggle('hidden', id !== tabId);
        });

        const buttons = ['tabSemua', 'tabSudahDirespons', 'tabBelumDirespons'];
        buttons.forEach(buttonId => {
            document.getElementById(buttonId).classList.toggle('active', buttonId === 'tab' + tabId.charAt(0).toUpperCase() + tabId.slice(1));
        });
    }
</script>
@endsection