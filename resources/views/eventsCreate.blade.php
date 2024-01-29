<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ url("/events/new") }}">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        @csrf
        <div>
            <label for="name">Inserisci il nome dell evento</label>
            <input id="name" name="name" value="{{old('name')}}"  type="text">
        </div>
        
        <div>
            <label for="date">Inserisci la data dell evento</label>
            <input id="date" name="date" value="{{old('date')}}" type="date">
        </div>
       
        <div>
            <label for="price">Inserisci il prezzo dell evento</label>
            <input id="price" name="price" step="any" value="{{old('price')}}" type="number">
        </div>
     
        <div>
            <label for="city">Inserisci la citta  dell evento</label>
            <input id="city" name="city" value="{{old('city')}}" type="text">
        </div>
      
        <div>
            <label for="address">Inserisci il luogo dell evento</label>
            <input id="address" name="address" value="{{old('address')}}" type="text">
        </div>
    
        <div>
            <label for="description">Inserisci una descrizione dell evento</label>
            <input id="description" name="description" value="{{old('description')}}" type="text">
        </div>
        
        <button type="button" onclick="window.location='{{ url("events") }}'">Torna agli eventi</button>
        <button type="submit">Crea il tuo evento</button>
    </form>
</body>
</html>