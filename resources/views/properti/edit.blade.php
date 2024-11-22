<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Properti</title>
</head>

<body>
    <h1>Edit Properti</h1>
    <form action="/properti/{{ $properti->id }}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" value="{{ $properti->judul }}" required><br><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" value="{{ $properti->harga }}" required><br><br>

        <label for="lokasi">Lokasi:</label><br>
        <input type="text" id="lokasi" name="lokasi" value="{{ $properti->lokasi }}" required><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="5" required>{{ $properti->deskripsi }}</textarea><br><br>

        <button type="submit">Update</button>
        <a href="/properti">Kembali</a>
    </form>
</body>

</html>
