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
        <div class="image">
            <img src="{{ $property->image_url }}" alt="Property Image">
        </div>
        <div class="details">
            <h1>{{ $property->title }}</h1>
            <p><strong>Price:</strong> {{ $property->price }}</p>
            <p><strong>Location:</strong> {{ $property->location }}</p>
            <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
            <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
            <p><strong>Description:</strong> {{ $property->description }}</p>
        </div>
    </div>
</body>
</html>