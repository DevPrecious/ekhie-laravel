<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Orders;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('index', compact('events'));
    }

    public function event($id)
    {
        $event = Event::where('events.id', $id)->join('users', 'events.user_id', '=', 'users.id')
            ->join('profiles', 'events.user_id', '=', 'profiles.user_id')
            ->first();
        $tickets  = Ticket::where('event_id', $id)->get();
        // dd($event);
        return view('event', compact('event', 'tickets'));
    }

    public function store(Request $request)
    {
        $quantity = $request->input('qty');
        $price = $request->input('price');
        $type = $request->input('type');
        $event_id = $request->input('event');
        $total = 0;
        for($i = 0; $i < count($quantity); $i++) {
            $n_quantity = (int)$quantity[$i];
            $n_price = (int)$price[$i];
            $total += $n_quantity * $n_price;
        }
       
        $data = [
            'total' => $total,
            'event_id' => $event_id,
        ];

        for($i = 0; $i < count($type); $i++) {
            $data['type'][$i] = $type[$i];
            $data['qty'][$i] = $quantity[$i];
            // $data['price'][$i] = $price[$i];
        }
        // dd($data);
        

        return view('buy', $data);
    }

    public function purchase(Request $request){
        $quantity = $request->input('qty');
        $type = $request->input('type');

        for($i = 0; $i < count($type); $i++) {
            $datatosave = [
                'type' => $type[$i],
                'qty' => $quantity[$i],
                'event_id' => $request->input('event_id'),
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'total' => $request->input('price'),
                // 'user_id' => $request->input('user_id'),
            ];
            Orders::create($datatosave);
        }
        return redirect()->route('order')->with('success', 'Order Successfully');
        
    }

    public function order()
    {
        return view('orders');
    }
}
