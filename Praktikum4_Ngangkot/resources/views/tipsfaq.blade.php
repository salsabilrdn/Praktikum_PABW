@extends('layouts.main')

@section('title', 'Pusat Edukasi Ngangkot - Tips & FAQ')

@push('styles')
<style>
/* CSS khusus untuk tampilan tips & FAQ */
details[open] summary::after {
  content: "▲";
  float: right;
  font-weight: bold;
}
summary::after {
  content: "▼";
  float: right;
  font-weight: bold;
}
.tip-item:nth-child(odd) { background: #e0f2fe; }
.tip-item:nth-child(even) { background: #bae6fd; }
.tip-item {
  transition: all 0.3s ease;
  cursor: pointer;
}
.tip-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(59, 130, 246, 0.3);
}
.faq-item {
  transition: background-color 0.3s ease;
  cursor: pointer;
}
.faq-item:hover { background-color: #dbeafe; }
</style>
@endpush

@section('content')
<main class="flex-grow max-w-4xl mx-auto p-4 w-full">
  <!-- Header Description -->
  <div class="text-center mb-6">
    <h1 class="text-2xl font-bold text-blue-800 mb-2">Pusat Edukasi Ngangkot</h1>
    <p class="text-gray-600 text-sm">
      Temukan tips berguna dan jawaban atas pertanyaan seputar angkot untuk perjalanan yang aman dan nyaman
    </p>
  </div>

  <!-- Search Box -->
  <div class="mb-6 max-w-md mx-auto w-full">
    <input id="searchInput" type="search" placeholder="Cari jawaban seputar angkot..." 
      class="w-full px-4 py-3 rounded-lg border border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
      onkeyup="filterContent()" />
  </div>

  <!-- Tabs -->
  <div class="flex justify-center mb-8 space-x-4">
    <button id="tabTips" onclick="showTab('tips')" 
      class="px-5 py-2 rounded-full font-semibold bg-blue-500 text-white shadow-md hover:bg-blue-600 transition">
      Tips
    </button>
    <button id="tabFaq" onclick="showTab('faq')" 
      class="px-5 py-2 rounded-full font-semibold bg-blue-100 text-blue-600 hover:bg-blue-200 transition">
      FAQ
    </button>
  </div>

  <!-- Tips Section -->
  <section id="contentTips" class="space-y-5">
    <h2 class="text-xl font-bold text-blue-700 mb-4 text-center">Tips Aman & Nyaman Naik Angkot</h2>
    <div class="grid md:grid-cols-2 gap-6">
      @foreach ($tips as $tip)
      <div class="rounded-xl p-5 shadow-lg border border-blue-300 tip-item">
        <h3 class="font-semibold text-blue-800 mb-2">{{ $tip['judul'] }}</h3>
        <p class="text-gray-700 text-sm leading-relaxed">{{ $tip['deskripsi'] }}</p>
      </div>
      @endforeach
    </div>
  </section>

  <!-- FAQ Section -->
  <section id="contentFaq" class="hidden space-y-4">
    <h2 class="text-xl font-bold text-blue-700 mb-4 text-center">Pertanyaan yang Sering Diajukan (FAQ)</h2>
    <div>
      @foreach ($faq as $f)
      <details class="rounded-xl p-5 shadow-md border border-blue-300 faq-item">
        <summary class="font-semibold text-blue-800 text-lg">{{ $f['pertanyaan'] }}</summary>
        <p class="mt-3 text-gray-700 text-sm leading-relaxed">{{ $f['jawaban'] }}</p>
      </details>
      @endforeach
    </div>
  </section>
</main>

<!-- Tombol Dashboard -->
<section class="flex justify-center mt-8 mb-6">
  <a href="{{ route('index') }}" 
     class="px-8 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition duration-200 text-center">
     Dashboard
  </a>
</section>

@push('scripts')
<script>
function showTab(tab) {
  const tipsSection = document.getElementById('contentTips');
  const faqSection = document.getElementById('contentFaq');
  const tabTipsBtn = document.getElementById('tabTips');
  const tabFaqBtn = document.getElementById('tabFaq');

  if (tab === 'tips') {
    tipsSection.classList.remove('hidden');
    faqSection.classList.add('hidden');
    tabTipsBtn.classList.add('bg-blue-500', 'text-white');
    tabFaqBtn.classList.remove('bg-blue-500', 'text-white');
  } else {
    tipsSection.classList.add('hidden');
    faqSection.classList.remove('hidden');
    tabFaqBtn.classList.add('bg-blue-500', 'text-white');
    tabTipsBtn.classList.remove('bg-blue-500', 'text-white');
  }
}

function filterContent() {
  const input = document.getElementById('searchInput').value.toLowerCase();
  const tipsVisible = !document.getElementById('contentTips').classList.contains('hidden');

  if (tipsVisible) {
    document.querySelectorAll('.tip-item').forEach(item => {
      const text = item.innerText.toLowerCase();
      item.style.display = text.includes(input) ? '' : 'none';
    });
  } else {
    document.querySelectorAll('.faq-item').forEach(item => {
      const text = item.innerText.toLowerCase();
      item.style.display = text.includes(input) ? '' : 'none';
    });
  }
}
</script>
@endpush
