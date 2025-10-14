@extends('layouts.main')

@section('title', 'Lihat Trayek')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        overflow: hidden;
        height: 100vh;
        background: #f8fafc;
    }
    
    #map { 
        height: 100vh; 
        position: fixed;
        top: 0;
        right: 0;
        width: calc(100vw - 400px);
        z-index: 1;
    }
    
    .sidebar {
        background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
        position: fixed;
        top: 0;
        left: 0;
        height: 100vh;
        width: 400px;
        overflow: hidden;
        z-index: 10;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    
    .trayek-card {
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid #e2e8f0;
    }
    
    .leaflet-routing-container {
        display: none;
    }
    
    .route-direction {
        max-height: calc(100vh - 500px);
        overflow-y: auto;
        padding-right: 8px;
    }
    
    .route-direction::-webkit-scrollbar {
        width: 6px;
    }
    
    .route-direction::-webkit-scrollbar-track {
        background: rgba(59, 130, 246, 0.1);
        border-radius: 3px;
    }
    
    .route-direction::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.4);
        border-radius: 3px;
    }
    
    .route-direction::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.6);
    }
    
    .route-step {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid rgba(59, 130, 246, 0.1);
    }
    
    .route-step:last-child {
        border-bottom: none;
    }
    
    .step-dot {
        width: 10px;
        height: 10px;
        background: rgba(59, 130, 246, 0.7);
        border-radius: 50%;
        margin-right: 15px;
        flex-shrink: 0;
    }
    
    .step-dot.terminal {
        background: #3b82f6;
        width: 12px;
        height: 12px;
        box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
    }
    
    .direction-toggle {
        background: rgba(59, 130, 246, 0.1);
        color: #1e40af;
        border: 1px solid rgba(59, 130, 246, 0.2);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px 16px;
        border-radius: 12px;
        cursor: pointer;
        width: 100%;
    }
    
    .direction-toggle:hover {
        background: rgba(59, 130, 246, 0.2);
        color: #1e40af;
        transform: translateY(-1px);
    }
    
    .direction-toggle:active {
        transform: translateY(0);
    }
    
    .scrollable-content {
        overflow-y: auto;
        height: calc(100vh - 220px);
    }
    
    .scrollable-content::-webkit-scrollbar {
        width: 4px;
    }
    
    .scrollable-content::-webkit-scrollbar-track {
        background: rgba(59, 130, 246, 0.1);
        border-radius: 2px;
    }
    
    .scrollable-content::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.3);
        border-radius: 2px;
    }
    
    .detail-container {
        height: calc(100vh - 280px);
        overflow-y: auto;
    }

    .header-section {
        background: rgb(0, 76, 197);
        color: white;
        display: flex;
        align-items: center;
        height: 80px;
        padding: 0 24px;
    }

    .search-section {
        background: rgba(59, 130, 246, 0.05);
        border-bottom: 1px solid rgba(59, 130, 246, 0.1);
    }
</style>

<div class="flex h-screen">
    <aside class="sidebar flex flex-col">
        <div class="flex items-center h-20 bg-blue-600 text-white px-6">
            <a href="{{ url('/') }}" class="text-white/80 hover:text-white transition mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </a>
            <h1 class="text-xl font-bold">Lihat Trayek Angkot</h1>
        </div>

        <div class="p-4 search-section">
            <div class="relative">
                <input type="text" id="search-trayek" placeholder="Cari trayek..." 
                       class="w-full px-4 py-3 rounded-xl bg-white border border-blue-200 text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
                <div class="absolute right-3 top-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div id="trayek-list" class="flex-1 scrollable-content p-4 space-y-3">
            @foreach($trayek as $t)
                <div class="trayek-card rounded-xl p-4 cursor-pointer hover:scale-105 transition-all duration-200 hover:shadow-lg"
     onclick="selectTrayek('{{ $t['idtrayek'] }}')">
    <div class="flex items-center justify-between">
        <div class="flex-1">
            <h3 class="text-lg font-bold text-blue-600">
                {{ $t['titik_awal'] }} - {{ $t['titik_akhir'] }}
            </h3>
        </div>
    </div>
</div>

                        <div class="text-blue-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="detail-view" class="hidden flex-1 flex flex-col">
            <div class="p-4 text-center border-b border-blue-100">
                <div class="w-full h-40 flex items-center justify-center p-0 m-0">
                    <img id="trayek-image" src="" class="w-full h-40 object-contain m-0 p-0"
                        style="background:transparent; box-shadow:none; border:none; border-radius:0;" alt="Gambar trayek">
                </div>
            </div>

            <div class="p-4 border-b border-blue-100">
                <button onclick="switchDirection()" class="direction-toggle">
                    <div class="flex items-center justify-center space-x-3">
                        <svg class="w-5 h-5 transition-transform duration-300" id="direction-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                        </svg>
                        <div class="text-center">
                            <div class="text-xs text-blue-600/70 font-medium" id="direction-label">ARAH PERJALANAN</div>
                            <div class="font-semibold" id="direction-text">Stasiun Hall → Gunung Batu</div>
                        </div>
                    </div>
                </button>
            </div>

            <div class="flex-1 p-4 detail-container">
                <div class="flex items-center justify-between mb-4">
                    <div class="text-xs text-blue-600/70 font-semibold">JALAN YANG DILALUI</div>
                    <div class="text-xs text-blue-600/70">
                        <svg class="w-4 h-4 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"></path>
                        </svg>
                    </div>
                </div>
                <div id="route-steps" class="route-direction"></div>
            </div>
        </div>
    </aside>

    <main class="flex-1">
        <div id="map"></div>
        <div id="map-loading" class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-6 rounded-xl shadow-2xl z-50">
            <div class="flex items-center space-x-3">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-600"></div>
                <span class="font-medium text-gray-700">Memuat rute...</span>
            </div>
        </div>
    </main>
</div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script>
    let trayekData = @json($trayek);
</script>
<script src="{{ asset('js/lihattrayek.js') }}"></script>
@endsection