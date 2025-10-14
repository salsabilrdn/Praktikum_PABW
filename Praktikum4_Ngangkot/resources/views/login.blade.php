@extends('layouts.main')

@section('title', 'Login - Ngangkot')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Ngangkot</title>
  <style>
    /* CSS Anda tetap di sini, tidak saya ulangi untuk keringkasan */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    body, html {
      height: 100%;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      display: flex; /* Untuk menengahkan container */
      align-items: center; /* Vertikal tengah */
      justify-content: center; /* Horizontal tengah */
    }

    .container {
      display: flex;
      /* height: 100vh; Dihapus agar bisa menyesuaikan konten jika lebih pendek */
      max-height: 90vh; /* Batasi tinggi agar tidak terlalu besar di layar besar */
      background-color: white;
      max-width: 900px;
      width: 90%; /* Agar responsif di layar kecil */
      /* margin: auto; Dihapus karena body sudah menengahkan */
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
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
      max-width: 300px;
      line-height: 1.6;
    }

    .right {
      flex: 1;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .right h2 {
      font-size: 28px;
      margin-bottom: 10px;
      font-weight: 600;
      color: #333;
    }

    .right p.subtitle-form { /* Tambahkan kelas untuk subjudul form */
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
      color: #444;
    }

    .form-group input {
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: border-color 0.3s ease;
    }
    .form-group input:focus {
        border-color: #2575fc;
        outline: none;
        box-shadow: 0 0 0 2px rgba(37, 117, 252, 0.2);
    }

    .login-btn {
      background-color: #2a5298;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
      margin-top: 10px;
      transition: background-color 0.3s ease;
    }

    .login-btn:hover {
      background-color: #1e3c72;
    }

    .signup-link {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #555;
    }

    .signup-link a {
      color: #2a5298;
      text-decoration: none;
      font-weight: bold;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
    
    /* CSS untuk Pesan Error/Sukses (Sama seperti di register) */
    .message {
        padding: 12px 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
    }
    .success { /* Mungkin tidak dipakai di login, tapi jaga-jaga */
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
      body, html {
          align-items: flex-start;
          padding-top: 20px;
      }
      .container {
        flex-direction: column;
        height: auto;
        border-radius: 0; /* Atau biarkan rounded jika preferensi */
        max-height: none;
        width: 100%; /* Full width di mobile */
        margin-top: 0;
      }

      .left, .right {
        flex: none;
        width: 100%;
        padding: 32px 25px;
        text-align: center; /* Untuk .left */
      }
      .right {
          text-align: left; /* Form tetap rata kiri */
      }

      .left h1 {
        font-size: 30px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="left">
    <h1>NGANGKOT</h1>
    <p>Sistem Informasi Angkutan Kota<br/>Solusi transportasi modern untuk kota Anda</p>
  </div>
  <div class="right">
    <h2>Login</h2>
    <p class="subtitle-form">Selamat datang kembali! Silakan masuk ke akun Anda.</p>

    {{-- Pesan error dari controller --}}
    @if(session('error'))
      <div class="message error">
        {{ session('error') }}
      </div>
    @endif

    {{-- Form login --}}
    <form method="POST" action="{{ route('login.proses') }}">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Alamat Email" 
          value="{{ old('email') }}" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Kata Sandi" required>
      </div>

      <button class="login-btn" type="submit">Masuk</button>
    </form>

    <div class="signup-link">
      Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
    </div>
  </div>
</div>
@endsection