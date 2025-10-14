@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="app-layout">
        <header class="app-header">
            <div class="header-brand">
                <i class="fas fa-bus-alt logo-icon"></i>
                <h1 class="app-name">Ngangkot</h1>
            </div>
          
            <div class="header-user-menu">
                <button class="notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="badge">2</span>
                </button>

                <div class="user-avatar-container">
                    <img src="{{ asset('images/user-avatar.jpg') }}" alt="User Avatar" class="user-avatar">
                    <span class="user-name">{{ $namaPengguna ?? 'Pengguna' }}</span>
                    <i class="fas fa-chevron-down dropdown-arrow"></i>

                    <div class="dropdown-menu">
                        <a href="{{ url('/profil') }}">Profil Saya</a>
                        <a href="#">Riwayat Perjalanan</a>
                        <a href="#">Pengaturan</a>
                        <a href="{{ url('/logout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="main-content">
            <section class="hero-section">
                <div class="hero-text">
                    <h2>Halo, {{ $namaPengguna ?? 'Pengguna' }}!</h2>
                    <p>Siap untuk memulai perjalanan Anda berikutnya?</p>
                    <div class="quick-search-container">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" placeholder="Masukkan tujuan Anda...">
                        <button class="search-button">Cari Angkot</button>
                    </div>
                </div>
            </section>

            <section class="quick-access-cards">
                <div class="card">
                    <div class="card-icon" style="background-color: #e6f7ff; color: #1890ff;">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Mulai Perjalanan</h3>
                    <p>Rencanakan dan mulai perjalanan Anda sekarang.</p>
                    <a href="{{ url('/navigasi') }}" class="card-link">Mulai Sekarang <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon" style="background-color: #f9f0ff; color: #722ed1;">
                        <i class="fas fa-map-signs"></i>
                    </div>
                    <h3>Lihat Trayek</h3>
                    <p>Jelajahi semua trayek angkot yang tersedia.</p>
                    <a href="{{ url('/lihattrayekposisi') }}" class="card-link">Lihat Semua Trayek <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon" style="background-color: #fffbe6; color: #faad14;">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>Edukasi</h3>
                    <p>Pelajari tips dan informasi seputar transportasi.</p>
                    <a href="{{ url('/tipsfaq') }}" class="card-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="card">
                    <div class="card-icon" style="background-color: #e6fffb; color: #13c2c2;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3>Lapor Dinas</h3>
                    <p>Sampaikan keluhan atau masukan Anda.</p>
                    <a href="{{ url('/lapor') }}" class="card-link">Buat Laporan <i class="fas fa-arrow-right"></i></a>
                </div>
            </section>

            <section class="current-trip-info">
                <h3>Perjalanan Anda Saat Ini</h3>
                <div class="trip-card empty">
                    <i class="fas fa-info-circle"></i>
                    <p>Anda tidak memiliki perjalanan aktif saat ini.</p>
                    <a href="#" class="btn-primary">Mulai Perjalanan Baru</a>
                </div>
            </section>
        </main>

        <footer class="app-footer">
            <p>&copy; 2025 Ngangkot - Solusi Transportasi Anda. Hak Cipta Dilindungi.</p>
            <div class="footer-links">
                <a href="#">Tentang Kami</a> |
                <a href="#">Kebijakan Privasi</a> |
                <a href="#">Kontak</a>
            </div>
        </footer>
    </div>

    <script>
        // Dropdown toggle
        const userAvatarContainer = document.querySelector('.user-avatar-container');
        if (userAvatarContainer) {
            userAvatarContainer.addEventListener('click', function() {
                this.classList.toggle('active');
            });
            document.addEventListener('click', function(event) {
                if (!userAvatarContainer.contains(event.target)) {
                    userAvatarContainer.classList.remove('active');
                }
            });
        }
    </script>
@endsection