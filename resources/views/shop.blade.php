@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/shop.css" />
<main>
    <div class="container shop-ctn">
      <div class="top">
        <h3>Products</h3>
        <a href="">
        <a href="{{ route('cart.list') }}" class="btn btn-default">
          <i class="fas fa-cart-plus cart-icon"></i>Cart({{ Cart::getTotalQuantity()}})
        </a>
      </a>
      </div>
      <div class="row">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{ Session::get('success') }}
        </div>
        @endif
        @foreach ($shops as $item)
        <div class="col-md-3 col-sm-6 col-xs-12 prd">
          <a href="#" class="cover">
            <div class="card">
              <img src="{{ asset('shop/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" />
              <div class="card-body text-center">
                <p class="card-text">{{ $item->name }}</p>
                <p class="card-text price">₦{{ $item->price }}</p>
              </div>
              <ul class="list-group list-group-flush">
                  <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $item->id }}" name="id">
                    <input type="hidden" value="{{ $item->name }}" name="name">
                    <input type="hidden" value="{{ $item->price }}" name="price">
                    <input type="hidden" value="{{ $item->image }}"  name="image">
                    <input type="hidden" value="{{ auth()->id() }}"  name="user_id">
                    <input type="hidden" value="1" name="quantity">
                    @auth
                    <button class="btn btn-default">Add To Cart</button>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-default">Add To Cart</a>
                    @endauth
                    {{-- <p><i class="fas fa-cart-plus cart-icon"></i></p> --}}
                </form>
              </ul>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </main>
@endsection