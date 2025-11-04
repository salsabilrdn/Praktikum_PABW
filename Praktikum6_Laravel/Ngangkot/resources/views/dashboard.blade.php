@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-4 text-blue-700">Selamat Datang di Dashboard Ngangkot</h1>
    <p class="text-gray-700">Halo, {{ Auth::user()->name ?? 'Pengguna' }}! Anda berhasil login.</p>

    <div class="mt-6">
        <a href="{{ route('profile') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Lihat Profil</a>
        <a href="{{ route('logout') }}" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 ml-2">Logout</a>
    </div>
</div>
@endsection
