<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata</title>
</head>
<body>
    <h1>Form Biodata</h1>
    <form action="/proses" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama"><br><br>
        <label>Umur:</label>
        <input type="number" name="umur"><br><br>
        <label>Alamat:</label>
        <input type="text" name="alamat"><br><br>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>
