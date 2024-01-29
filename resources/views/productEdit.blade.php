<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{url("/events/products/$productDetails->id/edit")}}">
        @csrf
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        <div>
            <label for="name">Inserisci il nome dell eprodotto</label>
            <input id="name" name="name" value="{{$productDetails->name}}"  type="text">
        </div>
        
        <div>
            <label for="price">Inserisci il prezzo dell prodotto</label>
            <input id="price" name="price" step="any" value="{{$productDetails->price}}" type="number">
        </div>
     
        <div>
            <label for="materials">Inserisci  il materiale dell prodotto</label>
            <input id="materials" name="materials" value="{{$productDetails->materials}}" type="text">
        </div>
      
        <div>
            <label for="weight">Inserisci il peso dell prodotto</label>
            <input id="weight" name="weight" value="{{$productDetails->weight}}" type="text">
        </div>
    
        <div>
            <label for="description">Inserisci una descrizione dell prodotto</label>
            <input id="description" name="description" value="{{$productDetails->description}}" type="text">
        </div>
        <button type="submit">Modifica l evento</button>
        </form>
</body>
</html>