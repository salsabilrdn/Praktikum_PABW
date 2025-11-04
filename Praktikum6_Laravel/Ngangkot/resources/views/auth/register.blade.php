@extends('layouts.app')

@section('content')
<style>
/* ====== CSS Register kamu dari PHP lama ====== */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', sans-serif;
}
body, html {
  min-height: 100%; 
  background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
  display: flex; 
  align-items: center; 
  justify-content: center; 
  padding: 20px 0; 
}
.container {
  display: flex;
  max-width: 900px;
  width: 90%; 
  background-color: white;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}
.left {
  background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
  color: white;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 40px;
  text-align: center;
}
.left h1 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 20px;
}
.left p {
  font-size: 16px;
  max-width: 280px;
  line-height: 1.6;
}
.right {
  flex: 1;
  padding: 40px;
  overflow-y: auto; 
}
.right h2 {
  font-size: 24px;
  margin-bottom: 10px;
  color: #333;
}
.right p.subtitle-form {
  font-size: 14px;
  color: #666;
  margin-bottom: 20px;
}
.form-group {
  margin-bottom: 16px;
}
.form-group label {
  display: block;
  margin-bottom: 6px;
  font-size: 14px;
  font-weight: 500;
  color: #444;
}
.form-group input,
.form-group select {
  width: 100%;
  padding: 10px 12px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 14px;
  transition: border-color 0.3s ease;
}
.form-group input:focus,
.form-group select:focus {
  border-color: #2575fc;
  outline: none;
  box-shadow: 0 0 0 2px rgba(37, 117, 252, 0.2);
}
.checkbox-group {
  display: flex;
  align-items: flex-start;
  gap: 10px;
  margin-top: 12px;
  margin-bottom: 20px;
  font-size: 14px;
}
.checkbox-group input[type="checkbox"] {
  margin-top: 3px;
  flex-shrink: 0;
}
.checkbox-group label {
  font-weight: normal;
  color: #555;
  line-height: 1.5;
}
.checkbox-group a {
  color: #2a5298;
  text-decoration: none;
  font-weight: 500;
}
.checkbox-group a:hover {
  text-decoration: underline;
}
.submit-btn {
  background-color: #2a5298;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  font-size: 16px;
  cursor: pointer;
  width: 100%;
  margin-top: 20px;
  transition: background-color 0.3s ease;
}
.submit-btn:hover {
  background-color: #1e3c72;
}
.message {
  padding: 12px 15px;
  margin-bottom: 20px;
  border-radius: 8px;
  font-size: 14px;
  font-weight: 500;
  text-align: center;
}
.success {
  background-color: #d1e7dd; 
  color: #0f5132;
  border: 1px solid #badbcc;
}
.error {
  background-color: #f8d7da;
  color: #842029;
  border: 1px solid #f5c2c7;
}
@media (max-width: 768px) {
  .container {
    flex-direction: column;
    width: 95%;
  }
  .left, .right {
    width: 100%;
    padding: 30px 25px;
  }
}
</style>

<div class="container">
  <div class="left">
    <h1>NGANGKOT</h1>
    <p>Sistem Informasi Angkutan Kota<br/>Bergabunglah dengan layanan transportasi modern untuk kota Anda</p>
  </div>

  <div class="right">
    <h2>Lengkapi data diri anda</h2>
    <p class="subtitle-form">untuk mendaftar akun Ngangkot</p>

    {{-- Pesan error atau sukses --}}
    @if ($errors->any())
      <div class="message error">
        <ul style="list-style:none; padding:0;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (session('success'))
      <div class="message success">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-group">
        <label for="name">Nama Lengkap *</label>
        <input type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap Anda" value="{{ old('name') }}" required>
      </div>

      <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required>
        <small>Gunakan email aktif untuk verifikasi akun</small>
      </div>

      <div class="form-group">
        <label for="password">Password *</label>
        <input type="password" id="password" name="password" placeholder="Minimal 6 karakter" required>
      </div>

      <div class="checkbox-group">
        <input type="checkbox" id="agree" required>
        <label for="agree">
          Saya setuju dengan <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a>
        </label>
      </div>

      <button type="submit" class="submit-btn">Daftar Sekarang</button>
    </form>
  </div>
</div>
@endsection
