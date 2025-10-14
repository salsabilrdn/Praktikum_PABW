@extends('layouts.main') {{-- kalau kamu punya layout utama --}}

@section('title', 'Register Ngangkot')

@section('content')
<div class="container flex max-w-4xl bg-white rounded-2xl shadow-lg overflow-hidden mx-auto my-10">
  {{-- Bagian kiri --}}
  <div class="left bg-gradient-to-br from-blue-800 to-blue-600 text-white flex flex-col justify-center items-center w-1/2 p-10">
    <h1 class="text-4xl font-bold mb-4">NGANGKOT</h1>
    <p class="text-center text-sm leading-relaxed">Sistem Informasi Angkutan Kota<br/>Bergabunglah dengan layanan transportasi modern untuk kota Anda</p>
  </div>

  {{-- Bagian kanan --}}
  <div class="right w-1/2 p-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-1">Lengkapi data diri Anda</h2>
    <p class="text-gray-500 text-sm mb-4">Untuk mendaftar akun Ngangkot</p>

    {{-- Pesan sukses / error --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-700 border border-green-300 p-3 rounded mb-3 text-center">
        {{ session('success') }}
      </div>
    @elseif(session('error'))
      <div class="bg-red-100 text-red-700 border border-red-300 p-3 rounded mb-3 text-center">
        {{ session('error') }}
      </div>
    @endif

    {{-- Form Register --}}
    <form method="POST" action="{{ route('register.store') }}">
      @csrf

      <div class="mb-4">
        <label for="namapeng" class="block text-gray-700 font-semibold text-sm mb-1">Nama Lengkap *</label>
        <input type="text" id="namapeng" name="namapeng" value="{{ old('namapeng') }}" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        @error('namapeng')
          <small class="text-red-500 text-xs">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold text-sm mb-1">Email *</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        @error('email')
          <small class="text-red-500 text-xs">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="block text-gray-700 font-semibold text-sm mb-1">Password *</label>
        <input type="password" id="password" name="password" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        @error('password')
          <small class="text-red-500 text-xs">{{ $message }}</small>
        @enderror
      </div>

      <div class="mb-4">
        <label for="pekerjaan" class="block text-gray-700 font-semibold text-sm mb-1">Pekerjaan *</label>
        <select id="pekerjaan" name="pekerjaan" required
          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
          <option value="">Pilih pekerjaan Anda</option>
          <option value="Pelajar" {{ old('pekerjaan') == 'Pelajar' ? 'selected' : '' }}>Pelajar</option>
          <option value="Mahasiswa" {{ old('pekerjaan') == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
          <option value="Pegawai" {{ old('pekerjaan') == 'Pegawai' ? 'selected' : '' }}>Pegawai</option>
          <option value="Wirausaha" {{ old('pekerjaan') == 'Wirausaha' ? 'selected' : '' }}>Wirausaha</option>
          <option value="Lainnya" {{ old('pekerjaan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
        </select>
        @error('pekerjaan')
          <small class="text-red-500 text-xs">{{ $message }}</small>
        @enderror
      </div>

      <div class="flex items-start mb-4">
        <input type="checkbox" id="agree" name="agree" class="mt-1" {{ old('agree') ? 'checked' : '' }} required>
        <label for="agree" class="ml-2 text-sm text-gray-600">
          Saya setuju dengan <a href="#" class="text-blue-600 underline">Syarat & Ketentuan</a> serta 
          <a href="#" class="text-blue-600 underline">Kebijakan Privasi</a>
        </label>
      </div>

      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-lg transition">
        Daftar Sekarang
      </button>
    </form>
  </div>
</div>
@endsection
