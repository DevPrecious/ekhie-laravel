<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Orders;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::all()->where('is_active', 1);
        return view('index', compact('events'));
    }

    public function event($id)
    {
        $event = Event::where('events.id', $id)->join('users', 'events.user_id', '=', 'users.id')
            ->join('profiles', 'events.user_id', '=', 'profiles.user_id')
            ->first();
        $tickets  = Ticket::where('event_id', $id)->get();
        if($event->is_active == 0){
            return redirect()->route('homepage');
        }
        // dd($event);
        return view('event', compact('event', 'tickets'));
    }

    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);
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
            $data['price'][$i] = $price[$i];
            // $data['price'][$i] = $price[$i];
        }
        $data['user'] = $user;
        // dd($data);
        

        return view('buy', $data);
    }

    public function purchase(Request $request){
        $quantity = $request->input('qty');
        $type = $request->input('type');
        $price = $request->input('indvprice');
        $array = [];
        for($i = 0; $i < count($type); $i++) {
            $datatosave = [
                'type' => $type[$i],
                'qty' => $quantity[$i],
                'price' => $price[$i],
                'event_id' => $request->input('event_id'),
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'total' => $request->input('price'),
                // 'user_id' => $request->input('user_id'),
            ];
            $array[] = $datatosave;
        }
        session()->put('data', $array);
        // dd(session()->get('data'));
        

        $reference = Flutterwave::generateReference();
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => 500,
            'email' => $request->input('email'),
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => $request->input('email'),
                "phone" => $request->input('phone'),
                "name" => $request->input('firstname')
            ],
        ];

        $payment = Flutterwave::initializePayment($data);

        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);

        
    }

    public function callback()
    {
        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
        
        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        foreach(session()->get('data') as $key => $value) {
            $data = [
                'type' => $value['type'],
                'qty' => $value['qty'],
                'event_id' => $value['event_id'],
                'firstname' => $value['firstname'],
                'lastname' => $value['lastname'],
                'email' => $value['email'],
                'phone' => $value['phone'],
                'total' => $value['total'],
                'orderID' => rand(),
                'user_id' => auth()->user()->id,
                // 'user_id' => $value['user_id'],
                // 'transaction_id' => $transactionID,
            ];
            Orders::create($data);
        }
        return redirect()->route('order')->with('success', 'Order Successful');
        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
        }
        else{
            //Put desired action/code after transaction has failed here
        }
    }

    public function order()
    {
        $array = [];
        foreach(session()->get('data') as $key => $value) {
            $data = [
                'type' => $value['type'],
                'qty' => $value['qty'],
                'event_id' => $value['event_id'],
                'firstname' => $value['firstname'],
                'lastname' => $value['lastname'],
                'email' => $value['email'],
                'phone' => $value['phone'],
                'total' => $value['total'],
                'price' => $value['price'],
                // 'user_id' => $value['user_id'],
                // 'transaction_id' => $transactionID,
            ];
            $array[] = $data;
        }
        // dd($array);
        return view('orders', compact('array'));
    }
    
    public function clear()
    {
        session()->forget('data');
        return redirect()->route('homepage');
    }
}
