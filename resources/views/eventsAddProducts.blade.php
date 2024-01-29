<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <ul>
            <li>{{$eventDetails->name}}</li>
            <li>{{$eventDetails->date}}</li>
            <li>{{$eventDetails->price}}</li>
            <li>{{$eventDetails->city}}</li>
            <li>{{$eventDetails->address}}</li>
            <li>{{$eventDetails->description}}</li>
        </ul>
        <button type="button" onclick="window.location='{{ url("events") }}'">Torna agli eventi</button>
    <button type="button" onclick="window.location='{{ url("events/form") }}'">Creane uno</button>
    <a href="{{ route('events.delete', [$eventDetails->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
  
        <ul>
            <h1>Crea Prodotti personalizzati per il tuo evento</h1>
           
            <form method="POST" action="{{url ("events/$eventId/products")}}">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                @csrf
                <div>
                    <label for="name">Nome Prodotto</label>
                    <input id="name" name="name" placeholder="Inserisci nome prodotto"  type="text">
                </div>
                
           
                <div>
                    <label for="materials">Materiali Prodotto</label>
                    <input id="materials" name="materials" step="any" placeholder="Inserire materiale" type="text">
                </div>
             
                <div>
                    <label for="price">Prezzo Prodotto</label>
                    <input id="price" name="price" placeholder="Inserisci prezzo prodotto" type="number">
                </div>
               
                <div>
                    <label for="weight">Peso prodotto</label>
                    <input id="weight" name="weight" placeholder="Inserisci peso prodotto" type="text">
                </div>
              
                <div>
                    <label for="description">Descrizione Prodotto</label>
                    <input id="description" name="description" placeholder="inserisci descrizione prodotto" type="text">
                </div>
            
               
                <button type="submit">Aggiungi Prodotto</button>
                </form>
           
            
        </ul>
       
        
    </div>

    
</body>
</html>