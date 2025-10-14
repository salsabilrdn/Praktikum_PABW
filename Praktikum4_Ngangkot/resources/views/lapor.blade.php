@extends('layouts.main')

@section('title', 'Lapor Dinas!')

@section('content')
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* --- semua CSS kamu aku biarkan utuh --- */
    .popup-notification {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 123, 255, 0.8);
      color: white;
      padding: 4px 12px;
      text-align: center;
      font-weight: bold;
      font-size: 14px;
      border-radius: 4px;
      box-shadow: none;
      z-index: 1002;
      display: none;
      animation: fadeIn 0.5s ease-in-out;
    }
    .popup-notification .close-btn {
      display: inline-block;
      margin-top: 5px;
      color: white;
      font-weight: bold;
      cursor: pointer;
      text-decoration: underline;
      transition: color 0.3s ease;
    }
    .popup-notification .close-btn:hover { color: #d1fae5; }
    @keyframes fadeIn {
      from { opacity: 0; transform: translate(-50%, -60%); }
      to { opacity: 1; transform: translate(-50%, -50%); }
    }

    .history-icon-container {
      position: fixed;
      top: 1rem;
      right: 1rem;
      z-index: 1000;
      background-color: white;
      padding: 0.5rem;
      border-radius: 9999px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .history-icon-container a { color: #374151; transition: color 0.2s; }
    .history-icon-container a:hover { color: #1d4ed8; }
  </style>

  <body class="bg-gradient-to-r from-blue-100 to-blue-50 min-h-screen flex flex-col font-sans">

  <header class="bg-white p-4 shadow-sm">
      <div class="max-w-4xl mx-auto flex items-center justify-between">
          <h1 class="text-xl font-bold text-blue-800">Lapor Dinas!</h1>
          <p class="text-sm text-black-600">Halo, {{ session('user_name', 'Pengguna') }}!</p>
      </div>
  </header>

  {{-- Pop-Up Notifikasi --}}
  @if(request()->get('notif') == 'success')
    <div id="popupNotification" class="popup-notification">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="mx-auto">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m-7 8a9 9 0 1 1 18 0 9 9 0 0 1-18 0Z" />
      </svg>
      <p>Laporan berhasil dikirim!</p>
      <span class="close-btn" onclick="closePopup()">Tutup</span>
    </div>
  @endif

  {{-- Ikon Riwayat --}}
  <div class="history-icon-container">
      <a href="{{ url('/history') }}" class="text-gray-600 hover:text-gray-800 transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
      </a>
  </div>

  {{-- Form --}}
  <main class="flex-grow max-w-4xl mx-auto p-4 w-full">
    <form action="{{ url('/submit-lapor') }}" method="POST" enctype="multipart/form-data" 
      class="bg-white rounded-xl p-8 shadow-lg border border-blue-200 max-w-md mx-auto">
      @csrf
      <h2 class="text-2xl font-bold text-blue-700 mb-8 text-center">Form Lapor Dinas</h2>

      <fieldset class="mb-6">
          <label for="tujuan" class="font-semibold text-blue-700 mb-3 block">Pilih Tujuan</label>
          <select id="tujuan" name="tujuan" required class="w-full p-3 rounded-lg border border-blue-300">
            <option value="D 1234 AB">D 1234 AB</option>
            <option value="B 5678 CD">B 5678 CD</option>
            <option value="F 9012 EF">F 9012 EF</option>
            <option value="D 3456 GH">D 3456 GH</option>
            <option value="B 7890 IJ">B 7890 IJ</option>
            <option value="F 1230 KL">F 1230 KL</option>
          </select>
      </fieldset>

      <div class="mb-6">
        <label for="keluhan" class="font-semibold text-blue-700 block mb-2">Isi keluhan</label>
        <textarea id="keluhan" name="keluhan" rows="6" placeholder="Tuliskan keluhan Anda" required
          class="w-full p-3 rounded-lg border border-blue-300 resize-none"></textarea>
      </div>

      <div class="mb-8">
        <label for="lampiran" class="font-semibold text-blue-700 block mb-2">Lampiran</label>
        <input id="lampiran" name="lampiran" type="file" class="hidden" />
        <label for="lampiran" 
          class="inline-block cursor-pointer rounded-md bg-blue-600 text-white px-4 py-2 hover:bg-blue-700 transition duration-200 select-none">
          Pilih File
        </label>
        <span id="fileName" class="ml-3 text-sm text-gray-600 select-text">Belum ada file dipilih</span>
      </div>

      <div class="text-center">
        <button type="submit" 
          class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
          Kirim Laporan
        </button>
      </div>
    </form>
  </main>

  <section class="flex justify-center space-x-8 mt-8 mb-6">
      <a href="{{ url('/') }}" class="px-8 py-3 bg-blue-600 hover:bg-blue-900 text-white font-semibold rounded-lg shadow-md transition duration-200 text-center">
          Dashboard
      </a>
  </section>

  <script>
    const inputFile = document.getElementById('lampiran');
    const fileNameSpan = document.getElementById('fileName');
    inputFile.addEventListener('change', () => {
      const fileName = inputFile.files.length > 0 ? inputFile.files[0].name : 'Belum ada file dipilih';
      fileNameSpan.textContent = fileName;
    });

    function closePopup() {
      const popup = document.getElementById('popupNotification');
      if (popup) popup.style.display = 'none';
    }

    @if(request()->get('notif') == 'success')
      setTimeout(() => {
        const popup = document.getElementById('popupNotification');
        if (popup) {
          popup.style.display = 'block';
          setTimeout(() => popup.style.display = 'none', 5000);
        }
      }, 500);
    @endif
  </script>
@endsection