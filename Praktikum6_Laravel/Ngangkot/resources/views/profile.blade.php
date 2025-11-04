@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-blue-100 to-blue-50 min-h-screen font-sans">

    <header class="bg-blue-600 text-white text-center py-8 rounded-b-2xl shadow-md">
        <h1 class="text-3xl font-bold mb-2">Profil Pengguna</h1>
        <p>Selamat datang, {{ Auth::user()->name ?? 'Pengguna' }}!</p>
    </header>

    <main class="max-w-3xl mx-auto p-6 space-y-6">

        <!-- Data Profil -->
        <section class="bg-white shadow-lg rounded-xl p-6 border border-gray-200">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                        stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0A8.966 8.966 0 0 1 12 20.25a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-700">{{ Auth::user()->email }}</p>
                    <p class="text-sm text-gray-700">{{ Auth::user()->pekerjaan ?? 'Tidak diketahui' }}</p>
                </div>
            </div>
        </section>

        <!-- Menu Navigasi -->
        <section class="bg-white shadow-lg rounded-xl p-6 border border-gray-200">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Menu Ngangkot</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="{{ url('/lapor') }}" class="block text-blue-600 hover:underline">Lapor Dinas</a>
                <a href="{{ url('/tips') }}" class="block text-blue-600 hover:underline">Tips & FAQ</a>
                <a href="{{ url('/kenali') }}" class="block text-blue-600 hover:underline">Kenali Ngangkot</a>
                <a href="{{ url('/syarat') }}" class="block text-blue-600 hover:underline">Syarat & Ketentuan</a>
                <a href="{{ url('/kebijakan') }}" class="block text-blue-600 hover:underline">Kebijakan Privasi</a>
                <a href="{{ url('/ulasan') }}" class="block text-blue-600 hover:underline">Ulasan</a>
            </div>
        </section>

        <!-- Tombol -->
        <div class="flex justify-center space-x-4">
            <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                Dashboard
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-6 py-3 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
    </main>
</div>
@endsection
