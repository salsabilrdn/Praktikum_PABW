@extends('layouts.main')

@section('title', 'Profil Pengguna')

@push('styles')
    <style>
        /* CSS kustom untuk konsistensi kartu */
        .card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid #e2e8f0;
        }
        .icon-text-row {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .icon-text-row svg {
            margin-right: 0.5rem;
            color: #6b7280;
        }
        .profile-header {
            background-color: #4C6EF5;
            color: white;
            padding: 2rem 1rem;
            border-radius: 0.75rem;
            text-align: center;
        }
        .profile-header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .profile-header p {
            font-size: 1rem;
            font-weight: 500;
        }
        .edit-profile-btn {
            background-color: #dbeafe;
            color: #2563eb;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease-in-out;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            border: 1px solid #bfdbfe;
        }
        .edit-profile-btn:hover {
            background-color: #bfdbfe;
        }
    </style>
@endpush

@section('content')
<div class="bg-gradient-to-r from-blue-100 to-blue-50 min-h-screen font-sans">

<header class="profile-header text-semi-bold text-center">
    <h1>Profil Pengguna</h1>
    <p>Selamat datang, {{ session('user_name', 'Pengguna') }}!</p>
</header>

<main class="max-w-4xl mx-auto p-4 space-y-6">

    <!-- Section: Profil -->
    <section class="card flex items-center justify-between p-6">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0A8.966 8.966 0 0 1 12 20.25a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">{{ session('user_name', 'Pengguna') }}</h2>
                <p class="text-sm text-gray-900">{{ session('user_email', '-') }}</p>
                <p class="text-xs text-gray-900">{{ session('user_job', '-') }}</p>
            </div>
        </div>
    </section>

        <!-- Section: Lapor Dinas dan Tips & FAQ -->
        <section class="card p-6">
            <h3 class="text-xl font-semibold text-gray-800">
            <a href="{{ route('lapor') }}" class="text-blue-600 hover:underline">Lapor Dinas</a><br>
                <a href="{{ route('tipsfaq') }}" class="text-blue-600 hover:underline">Tips & FAQ</a>
            </h3>
        </section>

        <!-- Section: Seputar Ngangkot -->
        <section class="card p-6">
            <h3 class="text-xl font-semibold text-gray-800">Seputar Ngangkot</h3>
            <div class="space-y-6 mt-4">
                @php
                    $infoItems = [
                        ['icon'=>'M3 5h18M3 10h18M3 15h18M3 20h18', 'text'=>'Kenali Ngangkot'],
                        ['icon'=>'M12 2v20M5 12h14', 'text'=>'Syarat & Ketentuan'],
                        ['icon'=>'M19 9l-7 7-7-7', 'text'=>'Kebijakan Privasi'],
                        ['icon'=>'M8 9l3 3-3 3', 'text'=>'Ulasan'],
                    ];
                @endphp
                @foreach($infoItems as $item)
                <div class="flex items-center space-x-3 hover:text-blue-600 transition duration-300">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" />
                        </svg>
                    </div>
                    <p class="text-left text-xl font-medium">{{ $item['text'] }}</p>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Section: Logout & Dashboard -->
        <section class="flex justify-center space-x-8 mt-8 mb-6">
            <a href="{{ route('index') }}" class="px-8 py-3 bg-blue-600 hover:bg-blue-900 text-white font-semibold rounded-lg shadow-md transition duration-200 text-center">
    Dashboard
</a>
<a href="{{ route('logout') }}" class="px-8 py-3 bg-blue-600 hover:bg-blue-800 text-white font-semibold rounded-lg shadow-md transition duration-200 text-center">
    Logout
</a>

        </section>

    </main>
</div>
@endsection