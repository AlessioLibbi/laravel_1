<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ url("/product/calc") }}">
        @csrf
        @error('first_number')
        <h1>{{$message}}</h1> 
        @enderror
        @error('second_number')
        <h1>{{$message}}</h1> 
        @enderror
        <input name="first_number" value=" {{old('first_number')}}" id="first_number">
        <input  name="second_number" value=" {{old('second_number')}}" id="second_number">

        <button type="submit">Calcola</button>
    </form>
</body>
</html>