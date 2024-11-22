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
    <div class="container">
        <div class="image">
            <img src="{{ $property->image_url }}" alt="Property Image" style="width:100%;">
        </div>
        <div class="details">
            <h1>{{ $property->title }}</h1>
            <p>Price: {{ $property->price }}</p>
            <p>Location: {{ $property->location }}</p>
            <p>Bedrooms: {{ $property->bedrooms }}</p>
            <p>Bathrooms: {{ $property->bathrooms }}</p>
            <div class="buttons">
                <button onclick="window.location.href='{{ route('property.show', $property->id) }}'">View</button>
                @if(Auth::check() && Auth::user()->is_admin)
                    <button onclick="window.location.href='{{ route('property.edit', $property->id) }}'">Edit</button>
                    <form action="{{ route('property.destroy', $property->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</body>
</html>