<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Details</title>
    <style>
        .container {
            display: flex;
        }

        .image {
            flex: 1;
        }

        .details {
            flex: 2;
            padding-left: 20px;
        }

        .buttons {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="add-property-btn">
        <button onclick="window.location.href='{{ route('properti.create') }}'">Tambah Properti</button>
    </div>
    <div class="container">
        {{-- @if (Auth::check()) --}}
        {{--     {{ dd(Auth::user()->role) }} --}}
        {{-- @endif --}}
        @foreach ($properti as $item)
            <div class="image">
                <img src="{{ asset('storage/' . $item->gambar) }} " alt="Property Image" style="width:100%;">
            </div>
            <div class="details">
                <h1>{{ $item->judul }}</h1>
                <p>Price: {{ $item->harga }}</p>
                <p>Location: {{ $item->lokasi }}</p>
                <p>Bedrooms: {{ $item->kamar_tidur }}</p>
                <p>Bathrooms: {{ $item->kamar_mandi }}</p>
                <div class="buttons">
                    <button
                        onclick="window.location.href='{{ route('properti.show', $item->id_properti_jual) }}'">View</button>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <button
                            onclick="window.location.href='{{ route('properti.edit', $item->id_properti_jual) }}'">Edit</button>
                        <form action="{{ route('properti.destroy', $item->id_properti_jual) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
</body>

</html>
