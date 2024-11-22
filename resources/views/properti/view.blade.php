<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Properti</title>
</head>

<body>
    <h1>Daftar Properti</h1>
    <a href="/properti/create">Tambah Properti</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Contoh Data -->
            <tr>
                <td>1</td>
                <td>Rumah Indah</td>
                <td>500000000</td>
                <td>Jakarta</td>
                <td>
                    <a href="/properti/1/edit">Edit</a>
                    <form action="/properti/1" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
