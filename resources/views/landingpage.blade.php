<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: #f8f9fa;
        }

        .navbar .left,
        .navbar .right {
            display: flex;
            align-items: center;
        }

        .navbar button {
            margin: 0 5px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .property {
            flex: 1 1 calc(33.333% - 20px);
            margin: 10px;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .property img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="left">
            <button onclick="filterProperties('1')">Filter Subsidi</button>
            <button onclick="filterProperties('2')">Filter Cluster</button>
            <button onclick="filterProperties('3')">Filter Takeover</button>
            <button onclick="filterProperties('')">Semua</button>
            <button onclick="/properti"><a href="{{ route('properti.index') }}">Tambah properti</a></button>
        </div>
        <div class="right">
            @if (Auth::check())
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
            @else
                <button onclick="window.location.href='{{ route('login') }}'">Login</button>
                <button onclick="window.location.href='{{ route('register') }}'">Register</button>
            @endif
        </div>
    </div>
    <div class="container">
        @foreach ($properti as $property)
            <div class="property">
                <img src="{{ asset('storage/' . $property->gambar) }}" alt="Property Image">
                <h2>{{ $property->judul }}</h2>
                <p>Price: {{ $property->harga }}</p>
                <p>Location: {{ $property->lokasi }}</p>
                <p>Bedrooms: {{ $property->kamar_tidur }}</p>
                <p>Bathrooms: {{ $property->kamar_mandi }}</p>
                <p>{{ $property->deskripsi }}</p>
            </div>
        @endforeach

    </div>
    <script>
        function filterProperties(type) {
            if (type === '') {
                window.location.href = '{{ route('landingpage') }}';
            } else {
                window.location.href = '{{ route('landingpage') }}?filter=' + type;
            }
        }
    </script>
</body>

</html>
