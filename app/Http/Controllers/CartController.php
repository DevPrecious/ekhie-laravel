<?php

namespace App\Http\Controllers;

use App\Models\Sold;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'user_id' => auth()->id(),
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function buy()
    {
        // $cartItems = \Cart::getContent();
        //     dd($cartItems);
        $reference = Flutterwave::generateReference();
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => \Cart::getTotal(),
            // 'amount' => 1000,
            'email' => auth()->user()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('shop.callback'),
            'customer' => [
                'email' => auth()->user()->email,
                "phone" => auth()->user()->profile->phone,
                "name" => auth()->user()->name
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
            $cartItems = \Cart::getContent();
            // dd($cartItems);
            foreach ($cartItems as $cart) {
                // print_r($cart);
                Sold::create([
                    'product_id' => $cart->id,
                    'user_id' => auth()->id(),
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                ]);
            }
            \Cart::clear();
            return redirect()->route('shop')->with('success', 'Order Successful');
        } elseif ($status ==  'cancelled') {
            //Put desired action/code after transaction has been cancelled here
            return redirect()->route('shop');
        } else {
            return redirect()->route('shop');
            //Put desired action/code after transaction has failed here
        }
    }
}
