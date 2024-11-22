<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Details</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .image {
            text-align: center;
        }

        .image img {
            max-width: 100%;
            height: auto;
        }

        .details {
            margin-top: 20px;
        }

        .details h1 {
            margin-bottom: 10px;
        }

        .details p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- @foreach ($properti as $item) --}}
        <div class="image">
            <img src="{{ asset('storage/' . $properti->gambar) }}" alt="Property Image">
        </div>
        <div class="details">
            <h1>{{ $properti->judul }}</h1>
            <p><strong>Price:</strong> {{ $properti->harga }}</p>
            <p><strong>Location:</strong> {{ $properti->lokasi }}</p>
            <p><strong>Bedrooms:</strong> {{ $properti->kamar_tidur }}</p>
            <p><strong>Bathrooms:</strong> {{ $properti->kamar_mandi }}</p>
            <p><strong>Description:</strong> {{ $properti->deskripsi }}</p>
        </div>
        {{-- @endforeach --}}
    </div>
</body>

</html>
