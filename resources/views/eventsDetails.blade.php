<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>DATI EVENTO</h1>
        <div class="event-container">
            <ul class="event-details">
                <li>{{$eventDetails->name}}</li>
                <li>{{$eventDetails->date}}</li>
                <li>{{$eventDetails->price}}€ a persona</li>
                <li>{{$eventDetails->city}}</li>
                <li>{{$eventDetails->address}}</li>
                <li>{{$eventDetails->description}}</li>
            </ul>
            <div class="button-container">
                <button type="button" onclick="window.location='{{ url("events/{$eventDetails->id}/products") }}'">Agiungi prodotti per il tuo evento</button>
                <button type="button" onclick="window.location='{{ url("events") }}'">Torna agli eventi</button>
                <button type="button" onclick="window.location='{{ url("events/form") }}'">Creane uno</button>
                <button><a href="{{ route('events.delete', [$eventDetails->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a></button>
            </div>
            <div class="static-cont">
                @foreach ($products as $product)
            
                <div class="container-product">
                    <ul class="event-details-product">
                        <li>{{$product->name ?? '----'}}</li
                        <li>{{$product->price ?? '----'}}</li>
                        <li>{{$product->materials ?? '----'}}</li>
                        <li>{{$product->weight ?? '----'}}</li>
                        <li>{{$product->description ?? '----'}}</li>
                        <a class="ciccio" href="{{ route('product.delete', [$product->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        <button class="ciccio" type="button" onclick="window.location='{{ url("events/products/$product->id/edit") }}'">Modifica Prodotto</button>
                    </ul>
                </div>
               
                @endforeach
            </div>
            <div class="static-cont">
                @foreach ($subby as $subscriber)
            
                <div class="container-product">
                    <ul class="event-details-product">
                        <li>{{$subscriber->name ?? '----'}}</li
                        <li>{{$subscriber->age ?? '----'}}</li>
                        <li>{{$subscriber->sex}}</li>
                    </ul>
                </div>
               
                @endforeach
            </div>
        
        </div>
       
      
        
       
        
    </div>
  
</body>
</html>

<style>
.zzz {
    display: flex;
    flex:
    justify-content: space-around;
}
.static-cont {
    display: flex;
    padding: 10px
}
.container-product {
    padding: 10px;
}
.event-details {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    list-style: none;
    padding: 0;
    color: red;
    font-size: 30px;
}
.event-details-product {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    list-style: none;
    padding: 0;
    color: red;
    font-size: 15px;
    
}
a.ciccio {
    padding: 0px ; 
    margin: 0;
}
button.ciccio {
    padding: 0px;
    width: 100%
}
.event-container {
    text-align: center;
    background-color: greenyellow;
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 500px;
    padding: 30px;
    border: 5px solid red;
}
.container {
    margin: 0 auto;
    width: 80%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}
button {
    width: 50%;
    display: block;
    background-color: red;
    color: greenyellow;
    border: 2px solid red;
    cursor: pointer;
    padding: 10px;
}
a {
    text-decoration: none;
    color: greenyellow;
    background-color: red;
    padding: 10px;
    border: 2px solid red;
    margin-bottom: 20px;
    cursor: pointer;
}
.button-container {
    display: flex;
    
}
</style>