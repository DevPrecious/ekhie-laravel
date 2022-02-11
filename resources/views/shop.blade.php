@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/shop.css" />
<main>
    <div class="container shop-ctn">
      <div class="top">
        <h3>Products</h3>
        <a href="">
        <button class="btn btn-default">
          <i class="fas fa-cart-plus cart-icon"></i>Cart(0)
        </button>
      </a>
      </div>
      <div class="row">
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
                <a href="#" class="list-group-item cart">
                  <p class="cart-text">Add to cart</p>
                  <p><i class="fas fa-cart-plus cart-icon"></i></p>
                </a>
              </ul>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </main>
@endsection