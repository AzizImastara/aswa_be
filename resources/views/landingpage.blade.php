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
        .navbar .left, .navbar .right {
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
            <button onclick="filterProperties('subsidy')">Filter Subsidi</button>
            <button onclick="filterProperties('cluster')">Filter Cluster</button>
            <button onclick="filterProperties('takeover')">Filter Takeover</button>
        </div>
        <div class="right">
            @if(Auth::check())
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
            @else
                <button onclick="window.location.href='{{ route('login') }}'">Login</button>
                <button onclick="window.location.href='{{ route('register') }}'">Register</button>
            @endif
        </div>
    </div>
    <div class="container">
        @foreach ($properties as $property)
            <div class="property">
                <img src="{{ $property->image_url }}" alt="Property Image">
                <h2>{{ $property->title }}</h2>
                <p>Price: {{ $property->price }}</p>
                <p>Location: {{ $property->location }}</p>
                <p>Bedrooms: {{ $property->bedrooms }}</p>
                <p>Bathrooms: {{ $property->bathrooms }}</p>
                <p>{{ $property->description }}</p>
            </div>
        @endforeach
    </div>
    <script>
        function filterProperties(type) {
            window.location.href = '{{ route('landingpage') }}?filter=' + type;
        }
    </script>
</body>
</html>