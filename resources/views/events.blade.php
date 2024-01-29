<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <h1 class="main-title">Events Trader</h1>
        <div>
            <button href="">I nostri Sconti</button>
            <button href="">Le nostre polizze</button>
            <button href="">Affitta con noi</button>
        </div>
    </div>
    <div class="container">
        
        <div class="events-container">
            @foreach ($events as $event)
            <div class="events-data-card">
                <a href='{{ url("/events/{$event->id}/subscriber/{$user->id}") }}'>Iscriviti</a>
                <a href='{{ url("/events/{$event->id}/desubscribe/{$user->id}") }}'>Desiscriviti</a>

                    
                <h1 class="events-name">{{$event->name}}</h1> 
                <div class="event-card-links">
                    <button type="button" onclick="window.location='{{ url("events/show/{$event->id}") }}'">Vedi dettagli</button>
                    <button type="button" onclick="window.location='{{ url("events/edit/{$event->id}") }}'">Modifica evento</button>
                    <a href="{{ route('events.delete', [$event->id]) }}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
               
            </div>
            @endforeach
        </div>
        <div>
            <button type="button" onclick="window.location='{{ url("events/form") }}'">Crea il tu evento</button>
        </div>
       
    </div>
 
</body>
</html>

<style scoped>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .header {
        height: 160px;
        width: 100%;
        background-color:  greenyellow;
        display: flex;
        justify-content: space-around;
        align-items: center;
        border-bottom: 3px solid red;
    }
    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 5px;
        flex-wrap: wrap;
       
    }
    .events-container {
        margin: 0 auto;
        width: 80%;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .events-data-card {
        background-color:greenyellow;
        margin: 20px;
        height: 400px;
        width: 25%;
        border: 3px solid red;
    }
    .event-card-links {
        display: flex;
        flex-direction: column;
    }
    .events-name {
        color: red;
        text-align: center;
    }
    .main-title {
        color: red;
        margin: 0;
        padding: 0;
    }
    button {
        margin: 10px;
        color: red;
        cursor: pointer;
        border: 1px solid red;
        padding: 10px;
        opacity: 0,5;
        background-color: greenyellow;
        
    }
    a {
        text-decoration: none;
        color: blue;
        text-align: center;
    }

</style>