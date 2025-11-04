// --- Rute Publik ---
Route::get('/', function () {
    // Menampilkan halaman 'welcome' (default Laravel). Ini adalah halaman utama yang bisa diakses siapa saja.
    return view('welcome');
});

// --- Rute Protected (Dilindungi) ---
Route::get('/dashboard', function () {
    // Menampilkan halaman dashboard setelah user berhasil login.
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); // Memerlukan middleware 'auth' (sudah login) dan 'verified' (email sudah diverifikasi) untuk diakses.

// --- Rute Pengaturan Profil (Dilindungi) ---
Route::middleware('auth')->group(function () {
    // Mengelompokkan semua rute di dalam kurung kurawal agar semuanya otomatis dilindungi oleh middleware 'auth'.
    
    // Rute GET untuk menampilkan form edit profil user yang sedang login.
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Rute PATCH untuk memproses data perubahan profil (Update data).
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // Rute DELETE untuk menghapus akun user.
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// --- Rute Auth Breeze ---
require __DIR__.'/auth.php'; // Memuat semua rute Autentikasi yang disediakan oleh Laravel Breeze (Login, Register, Password Reset, Logout).
*/


<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome'); // Route langsung Views tanpa controller
});

// Auth Routes
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::resource('kontaks', KontakController::class); // routes mengunakan controller yakni akses controller 'KontakController' dengan akses link ‘/kontaks’

    Route::resource('mahasiswa', MahasiswaController::class)->except(['show']); // Route ‘/mahasiswa’
    Route::get('/mahasiswa/get-data', [MahasiswaController::class, 'getData'])->name('mahasiswa.get-data'); // Route JSON ‘/mahasiswa/get-data’

});
