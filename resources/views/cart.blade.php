@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/cart.css" />
<main>
    <div class="container cart-ctn">
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        {{$message}}
      </div>
      @endif
      <h3>Shopping Cart</h3>
      <hr />
      <a href="{{ route('shop') }}">Back</a>
      @foreach ($cartItems as $item)
      <div class="cart-items">
        <div class="cart-item">
          <form action="{{ route('cart.remove') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $item->id }}" name="id">
          <button href="#" class="cancel">x</button>
          </form>
          <img src="{{ asset('shop/' . $item->attributes->image) }}" alt="{{ $item->name }}" />
          <p>{{ $item->name }}</p>
        </div>
        <div class="price"><p>₦{{ $item->price }}</p></div>
        <div class="quantity">
          <div class="">
            <form action="{{ route('cart.update') }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $item->id}}" >
            <input type="number" name="quantity" value="{{ $item->quantity }}" 
            class="w-6 text-center bg-gray-300" />
            <button type="submit" class="btn btn-primary">update</button>
            </form>
          </div>
        </div>
      </div>
      <hr />
      @endforeach

      <div class="total">
        <div class="tot">
          <h4>Cart Totals</h4>
          <div class="calc">
            <p>Subtotal</p>
            <p>₦{{ Cart::getTotal() }}</p>
          </div>
          <form action="{{ route('store.buy') }}" method="POST">
          @csrf
          <button class="btn btn-default checkout">Checkout</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  @endsection