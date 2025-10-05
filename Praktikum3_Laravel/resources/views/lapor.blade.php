<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Angkot Bandung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            margin: 0;
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
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input, textarea, button {
            width: 100%;
            margin-top: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }
        textarea {
            resize: none;
            height: 80px;
        }
        button {
            background: #2563eb;
            color: white;
            font-weight: bold;
            border: none;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.2s;
        }
        button:hover {
            background: #1e40af;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Laporan Angkot Bandung</h2>
        <form action="/proses" method="POST">
            @csrf
            <label for="nama">Nama Pelapor:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="trayek">Trayek Angkot:</label>
            <input type="text" id="trayek" name="trayek" required>

            <label for="nomor">Nomor Angkot:</label>
            <input type="text" id="nomor" name="nomor" required>

            <label for="keluhan">Keluhan / Catatan:</label>
            <textarea id="keluhan" name="keluhan" required></textarea>

            <button type="submit">Kirim Laporan</button>
        </form>
    </div>
</body>
</html>
