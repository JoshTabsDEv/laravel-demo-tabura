<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="mx-auto text-center mt-10-">
        <form action="{{route('login_form')}}" method="POST">
            @csrf
            <input type="text"name="username" placeholder="Enter Username" required><br>
            <input type="password"name="password" placeholder="Enter Password" required><br>
            
            <button type="submit" class="text-white border-black bg-blue-600 hover:bg-blue-500">Login</button>
        </form>
        @if($errors->any())
            <div-><strong class="text-red-500">{{$errors->first()}}</strong></div->    
        @endif
    </div>
</body>
</html>