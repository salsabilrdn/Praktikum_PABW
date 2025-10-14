<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ngangkot')</title>
    <link rel="stylesheet" href="{{ asset('css/style_dashboard_ngangkot.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    {{-- Bagian konten halaman --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Jika ada JS global --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>