<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>JobFinder Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-primary text-white p-3">
    <div class="container">
        <h4>JobFinder – Portal Lowongan Kerja Kabupaten Bandung</h4>
    </div>
</header>

@include('profile.partials.navbar')

<main class="container my-4">
    @yield('content')
</main>

<footer class="bg-light text-center p-3 mt-4">
    © 2025 JobFinder Bandung
</footer>

</body>
</html>
