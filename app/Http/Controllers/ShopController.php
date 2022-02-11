<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $shops = Shop::all();
        return view('shop', compact('shops'));
    }

    public function cart()
    {
        return view('cart');
    }
}
