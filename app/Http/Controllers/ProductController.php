<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Event;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $eventDetails = Event::find($id);
        $eventId = $eventDetails->id;
        return view('eventsAddProducts', compact('eventDetails', 'eventId'));
    }


    public function updateView($id)
    {
        $userAuth = Auth::user();
        $productDetails = Product::find($id);
        $user_id = $productDetails->event->user_id;
        if ($userAuth->id === $user_id) {
            return view('productEdit', compact('productDetails'));
        } else {
            return redirect('events');
        }
    }
    public function update(ProductRequest $request, $id)
    {
        Product::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'materials' => $request->materials,
            'weight' => $request->weight,
            'description' => $request->description,
        ]);
        return redirect("events");
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, $id)
    {

        $userAuth = Auth::user();
        $event = Event::find($id);
    
        if($userAuth->id === $event->user_id) {
            Product::insert([
                'name' => $request->name,
                'price' => $request->price,
                'materials' => $request->materials,
                'weight' => $request->weight,
                'description' => $request->description,
                'event_id' => $id
            ]);
            return redirect('events');
        } else {
            return redirect('events');
        }
      
       
    }


    public function delete($id)
    {
        $prod = Product::find($id);
        $event = $prod->event;
        $userAuth = Auth::user();
        if($userAuth->id === $event->user_id) {
            DB::table('products')->delete($id);
            return redirect('events');
        }
    }
}
