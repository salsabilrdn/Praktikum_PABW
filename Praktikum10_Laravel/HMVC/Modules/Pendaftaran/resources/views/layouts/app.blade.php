<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Wajib untuk AJAX POST --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pendaftaran</title>

    {{-- Style tambahan dari @push('styles') --}}
    @stack('styles')
</head>
<body>

    {{-- Tempat konten index.blade.php --}}
    @yield('content')

    {{-- Script tambahan dari @push('scripts') --}}
    @stack('scripts')

</body>
</html>
