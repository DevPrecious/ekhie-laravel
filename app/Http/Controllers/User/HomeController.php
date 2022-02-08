<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Orders;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $products = Event::where('user_id', auth()->id())->get();
        // dd($products);
        return view('user.index', compact('products'));
    }

    public function orders()
    {
        $orders = Orders::where('orders.user_id', auth()->user()->id)->get();
        return view('user.orders', compact('orders'));
    }

    public function details($id)
    {
        $product = Orders::where('orders.id', $id)->join('tickets', 'tickets.id', '=', 'orders.id')->first();
        return view('user.details', compact('product'));
    }
}
