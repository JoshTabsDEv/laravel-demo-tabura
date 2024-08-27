<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>This is Index</h1>
    <br>
    <a href="{{route('calculator')}}">
        <button>
            Calculator
        </button>
    </a>
    <a href="{{route('gallery')}}">
        <button class="border border-red-500">
            Gallery
        </button>
    </a>
    <br>
    <a href="{{route('index')}}">
        <button>
            Home
        </button>
    </a>
    <br>
    <a href="{{route('services')}}">
        <button>
            Services
        </button>
    </a>
</body>
</html>