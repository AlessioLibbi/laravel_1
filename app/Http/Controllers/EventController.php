<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Mail\EmailFranz;
use App\Models\Event;
use App\Models\Product;
use App\Models\User;
use App\Models\Subscriber;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Mail\Mailable ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $events = Event::all();
        $products = Product::all();
        return view('events', compact("events", "user"));
    }
    public function show()
    {

        return view('eventsCreate');
    }
    public function details($id)
    {
        $eventDetails = Event::find($id);
        $subby = $eventDetails->subscribers;
        $products = $eventDetails->products;
        return view('eventsDetails', compact("eventDetails", "products", "subby"));
    }
    public function updateView($id)
    {
        $userAuth = Auth::user();
        $eventDetails = Event::find($id);
        $productDetails = Product::find($id);
        $eventId = $eventDetails->id;
        if ($userAuth->id === $eventDetails->user_id) {
            return view('eventsEdit', compact('eventDetails', 'eventId', 'productDetails'));
        } else {
            return redirect('events');
        }
    }
    public function update(EventRequest $request, $id)
    {
        $userAuth = Auth::user();
        $eventDetails = Event::find($id);
        if ($userAuth->id === $eventDetails->user_id) {
            Event::where('id', $id)->update([
                'name' => $request->name,
                'date' => $request->date,
                'price' => $request->price,
                'city' => $request->city,
                'address' => $request->address,
                'description' => $request->description,
            ]);
        }
        return redirect('events');
    }
    public function subscriberSignup($id, $userId)
    {
        
        $user = User::find($userId);
        $user->eventsSubscriber()->attach($id);
        Mail::to($user->email)->send(new EmailFranz($user));
        return redirect('events');
    }
    public function desubscribeSignup($id, $userId)
    {
        
        $user = User::find($userId);
        $user->eventsSubscriber()->detach($id);
        return redirect('events');
    }
    public function store(EventRequest $request)
    {
        $userAuth = Auth::user();
        Event::insert([
            'name' => $request->name,
            'date' => $request->date,
            'price' => $request->price,
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
            'user_id' => $userAuth->id
        ]);
        return redirect('events');
    }
    public function delete($id)
    {
        $userAuth = Auth::user();
        $events = Event::findOrFail($id);
        if ($userAuth->id === $events->user_id) {
            DB::table('products')->delete($id);
            DB::table('events')->delete($id);
            return redirect('events');
        } else {
            return redirect('events');
        }
    }
}
