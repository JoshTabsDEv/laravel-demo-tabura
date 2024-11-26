<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="mx-auto text-center">
    <h1 class="font-bold mt-2">This is Calculator</h1>
    <form action="{{route('calculateAnswer')}}">
        @csrf
        <label for="number1" class="mt-5">Number 1:</label>
        <input type="text" name="number1" id="number1" autofocus>
        @if ($errors->has('number1'))
            <span class='text-red-500'>{{$errors->first('number1')}}</span>
        @endif
        <div class="mt-4"></div>
        <label for="number2">Number 2:</label>
        <input type="text" name="number2" id="number2" >
        @if ($errors->has('number2'))
            <span class='text-red-500'>{{$errors->first('number2')}}</span>
        @endif
        <div class="mt-4"></div>
        <button class="bg-blue-500 px-4 hover:bg-blue-800" type="submit">ADD</button>
        
    </form>
        @if($result != null)
        <h3 class="text-xl">Result:{{$result}}</h3>
        @else
        <h3 class="text-xl">Result: Not yet Calculated</h3>
        @endif
    </div>
    
    
</body>

</html>