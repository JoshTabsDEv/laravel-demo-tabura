<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>IT Equipment Discount Calculator</h1>
    <form action="{{route('compute')}}" method="post">
        @csrf
        <label for="price">Item Price</label>
        <input type="number" id="price" name="price" autofocus required>
        <br><br>
        
        <label for="senior">Senior</label>   
        <input type="checkbox" name="senior" id="senior"><br>
        <label for="student">Student</label>
        <input type="checkbox" name="student" id="student"><br>

        <button type="submit" id="submit">Calculate Discount</button>
    </form>

    @if($newPrice)
       
            <p>Input Price: {{$input}}</p>
            <p>Discount Criteria {{$type}} <span>{{$discount}}</span> </p>
         

        <p>Discounted Price: {{$newPrice}}</p>
    @endif
</body>
</html>