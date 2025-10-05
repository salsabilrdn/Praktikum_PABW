<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Laporan Ngangkot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            padding: 40px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #16a34a;
            margin-bottom: 20px;
        }
        p {
            font-size: 15px;
            margin: 10px 0;
        }
        strong {
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 6px;
            background: #2563eb;
            color: white;
            font-weight: bold;
        }
        a:hover {
            background: #1e40af;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Laporan Ngangkot</h2>
        <p><strong>Nama Pelapor:</strong> {{ $nama }}</p>
        <p><strong>Trayek Angkot:</strong> {{ $trayek }}</p>
        <p><strong>Nomor Angkot:</strong> {{ $nomor }}</p>
        <p><strong>Keluhan / Catatan:</strong> {{ $keluhan }}</p>

        <a href="/lapor">⬅️ Kembali ke Form</a>
    </div>
</body>
</html>
