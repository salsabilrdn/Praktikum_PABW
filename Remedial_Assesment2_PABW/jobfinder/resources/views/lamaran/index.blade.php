@extends('layouts.main')

@section('content')
<h3>Daftar Lamaran</h3>

<table class="table table-bordered mt-3">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>Lowongan</th>
            @if(auth()->user()->role === 'admin')
                <th>Pelamar</th>
            @endif
            <th>Deskripsi</th>
            <th>CV</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lamarans as $i => $lamaran)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $lamaran->lowongan->posisi }}</td>

            @if(auth()->user()->role === 'admin')
                <td>{{ $lamaran->user->name }}</td>
            @endif

            <td>{{ $lamaran->deskripsi_lamaran }}</td>
            <td>
                <a href="{{ asset('storage/'.$lamaran->cv_file) }}" target="_blank" class="btn btn-sm btn-primary">
                    Lihat CV
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
