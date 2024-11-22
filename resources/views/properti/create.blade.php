<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Properti</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Buat Properti Baru</h1>
        <form action="{{ route('properti.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="id_kategori" name="id_kategori" required>
                    <option value="1">Subsidi</option>
                    <option value="2">Cluster</option>
                    <option value="3">Take Over</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_kamar_tidur">Jumlah Kamar Tidur</label>
                <input type="number" class="form-control" id="kamar_tidur" name="kamar_tidur" required>
            </div>
            <div class="form-group">
                <label for="jumlah_kamar_mandi">Jumlah Kamar Mandi</label>
                <input type="number" class="form-control" id="kamar_mandi" name="kamar_mandi" required>
            </div>
            <div>
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
