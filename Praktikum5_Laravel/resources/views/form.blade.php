<!DOCTYPE html>
<html>
<head>
    <title>Form Input Mahasiswa</title>
</head>
<body>
    <h2>Input Data Mahasiswa</h2>

    <form action="/simpan" method="POST">
        @csrf
        <label>Nama:</label><br>
        <input type="text" name="nama"><br>

        <label>NIM:</label><br>
        <input type="text" name="nim"><br>

        <label>Jurusan:</label><br>
        <input type="text" name="jurusan"><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>