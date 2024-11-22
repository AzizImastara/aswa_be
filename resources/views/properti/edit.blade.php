<div class="container">
    <h1>Edit Properti</h1>
    <form action="{{ route('properti.update', $properti->id_properti_jual) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $properti->judul }}"
                required>
        </div>

        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                value="{{ $properti->no_telepon }}" required>
        </div>

        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">

            <img src="{{ asset('storage/' . $properti->gambar) }}" alt="Gambar Properti" width="100">

        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $properti->lokasi }}"
                required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="{{ $properti->harga }}"
                required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="1" {{ $properti->kategori == 'subsidi' ? 'selected' : '' }}>Subsidi</option>
                <option value="2" {{ $properti->kategori == 'cluster' ? 'selected' : '' }}>Cluster</option>
                <option value="3" {{ $properti->kategori == 'take_over' ? 'selected' : '' }}>Take Over</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jumlah_kamar_tidur">Jumlah Kamar Tidur</label>
            <input type="number" class="form-control" id="kamar_tidur" name="kamar_tidur"
                value="{{ $properti->kamar_tidur }}" required>
        </div>

        <div class="form-group">
            <label for="jumlah_kamar_mandi">Jumlah Kamar Mandi</label>
            <input type="number" class="form-control" id="kamar_mandi" name="kamar_mandi"
                value="{{ $properti->kamar_mandi }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Properti</button>
    </form>
</div>
