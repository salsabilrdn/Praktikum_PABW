@extends('layouts.main')

@section('title', 'Navigasi Angkot Bandung')

@push('styles')
<!-- Tailwind & custom CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<style>
html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
body, #app {
    height: 100vh;
    min-height: 100vh;
    width: 100vw;
    display: flex;
    flex-direction: row;
    background: #f5f5f5;
}
.sidebar {
    background: #fff;
    box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    width: 400px;
    min-width: 320px;
    max-width: 480px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    padding: 32px;
    border-radius: 0 32px 32px 0;
}
#map {
    flex: 1;
    height: 100vh;
    min-width: 0;
    z-index: 1;
}
.input-wrap {
    position: relative;
    margin-bottom: 24px;
}
.input-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #2563eb;
    font-size: 1.2rem;
    pointer-events: none;
    z-index: 2;
}
.input-box {
    padding-left: 48px !important;
    border-radius: 9999px !important;
    background: #bae6fd !important;
    border: 2px solid #2563eb;
    font-weight: 500;
    color: #2563eb;
    height: 48px;
    width: 100%;
    margin-bottom: 0;
}
.input-box:focus { outline: 2px solid #2563eb; }
.suggestion-box {
    position: absolute;
    left: 0; right: 0; top: 110%;
    background: #fff; border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.07);
    z-index: 50;
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #e0e7ef;
    margin-top: 2px;
}
.suggestion-item {
    padding: 12px 24px;
    cursor: pointer;
    color: #2563eb;
    font-size: 1rem;
    border-radius: 12px;
}
.suggestion-item:hover {
    background: #e0f2fe;
}
</style>
@endpush

@section('content')


<div id="app" class="flex h-screen">
  {{-- Sidebar --}}
  <div class="sidebar bg-white shadow-lg flex flex-col p-8 rounded-r-3xl w-96 min-w-[320px] max-w-[480px]">
    <div class="flex items-center gap-3 mb-8">
      <a href="/" class="back-btn">
        <svg class="w-6 h-6" fill="#" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
      </a>
      <h2 class="text-xl font-bold text-gray-800 mb-0">Mau ke mana hari ini?</h2>
    </div>

    <form id="formCari" class="space-y-4 relative">
      @foreach(['awal' => 'Lokasi awal...', 'tujuan' => 'Lokasi tujuan...'] as $id => $placeholder)
      <div class="relative">
        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-600">
          <!-- icon -->
        </span>
        <input type="text" id="lokasi_{{ $id }}" name="lokasi_{{ $id }}" placeholder="{{ $placeholder }}"
          class="w-full h-12 rounded-full border-2 border-blue-600 bg-blue-100 px-12 text-blue-700 font-medium focus:outline-none focus:ring-2 focus:ring-blue-600"/>
        <div id="suggestion-{{ $id }}" class="suggestion-box hidden absolute bg-white rounded-xl shadow-lg mt-1 max-h-52 overflow-y-auto w-full"></div>
      </div>
      @endforeach

      <button type="submit" class="w-full h-12 bg-blue-500 text-white rounded-full font-bold shadow hover:bg-blue-600 transition">Cari Angkot</button>
    </form>
  </div>

  {{-- Map --}}
  <div id="map" style="height: 500px; width: 100%;"></div>
</div>

@push('scripts')
<script>
    // var map = L.map('map').setView([-6.200000, 106.816666], 13); // koordinat Jakarta

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([-6.200000, 106.816666]).addTo(map)
        .bindPopup('Lokasi Angkot')
        .openPopup();
</script>
@endpush

<style>
#map { flex:1; height:100%; min-width:0; }
.suggestion-box { position:absolute; left:0; right:0; top:110%; z-index:50; }
.suggestion-item { padding:0.75rem 1.5rem; cursor:pointer; }
.suggestion-item:hover { background:#e0f2fe; }
</style>

@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
let lokasiList = @json($lokasi ?? []);

function setupAutocomplete(inputId, suggestionId) {
    const input = document.getElementById(inputId);
    const box = document.getElementById(suggestionId);
    input.addEventListener('input', function() {
        const val = this.value.toLowerCase();
        box.innerHTML = '';
        if (!val) { box.classList.add('hidden'); return; }
        const filtered = lokasiList.filter(l => l.toLowerCase().includes(val)).slice(0, 10);
        if (filtered.length === 0) { box.classList.add('hidden'); return; }
        filtered.forEach(lokasi => {
            const div = document.createElement('div');
            div.textContent = lokasi;
            div.className = 'suggestion-item';
            div.addEventListener('mousedown', function(e){
                e.preventDefault();
                input.value = lokasi;
                box.classList.add('hidden');
            });
            box.appendChild(div);
        });
        box.classList.remove('hidden');
    });
    input.addEventListener('blur', () => setTimeout(() => box.classList.add('hidden'), 180));
}
setupAutocomplete('lokasi_awal','suggestion-awal');
setupAutocomplete('lokasi_tujuan','suggestion-tujuan');

var map = L.map('map').setView([-6.914744, 107.60981], 12);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; OpenStreetMap contributors' }).addTo(map);

document.getElementById('formCari').onsubmit = function(e) {
    e.preventDefault();
    const awal = document.getElementById('lokasi_awal').value;
    const tujuan = document.getElementById('lokasi_tujuan').value;
    const hasilDiv = document.getElementById('hasil');
    if(!awal || !tujuan){
        hasilDiv.innerHTML = `<div class="text-red-600 mt-3">Isi lokasi awal dan tujuan!</div>`;
        return;
    }
    hasilDiv.innerHTML = `<div class="text-gray-500 mt-3">Mencari rute...</div>`;
    fetch(`/cari-angkot?awal=${encodeURIComponent(awal)}&tujuan=${encodeURIComponent(tujuan)}`)
        .then(r => r.json())
        .then(data => {
            if(!data.length){
                hasilDiv.innerHTML = `<div class="text-red-600 mt-3">Tidak ditemukan rute langsung.</div>`;
            } else {
                hasilDiv.innerHTML = data.map(angkot => `
                    <div class="bg-white rounded-xl shadow p-4 mb-4 flex items-center space-x-4">
                        <span class="px-3 py-1 rounded-full font-bold text-white ${angkot.kode_angkot.match(/A/i) ? 'bg-red-500' : 'bg-green-600'}">
                          Angkot ${angkot.kode_angkot}
                        </span>
                        <div class="flex-1">
                          <div class="text-sm text-gray-700">Rute: ${angkot.rute}</div>
                          <div class="flex items-center space-x-4 mt-1">
                            <span class="text-blue-700 font-semibold">Rp ${angkot.tarif}</span>
                            <span class="text-gray-500">${angkot.estimasi} menit</span>
                          </div>
                        </div>
                    </div>
                `).join('');
            }
        });
};
</script>
@endpush