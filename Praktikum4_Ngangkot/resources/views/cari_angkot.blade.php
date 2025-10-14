@extends('layouts.main')

@section('title', 'Cari Angkot')

@section('content')
<h1>Hasil Pencarian Angkot</h1>

@if($data->isEmpty())
    <p>Tidak ada rute ditemukan dari <strong>{{ $awal }}</strong> ke <strong>{{ $tujuan }}</strong>.</p>
@else
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Angkot</th>
                <th>Rute</th>
                <th>Tarif</th>
                <th>Estimasi Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
                <tr>
                    <td>{{ $d->kode_angkot }}</td>
                    <td>{{ $d->rute }}</td>
                    <td>Rp {{ number_format($d->tarif, 0, ',', '.') }}</td>
                    <td>{{ $d->estimasi }} menit</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection