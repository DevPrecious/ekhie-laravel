@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/shop.css" />
<main>
    <div class="container shop-ctn">
      <div class="top">
        <h3>Products</h3>
        <a href="cart.html">
        <button class="btn btn-default">
          <i class="fas fa-cart-plus cart-icon"></i>Cart(0)
        </button>
      </a>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 prd">
          <a href="#" class="cover">
            <div class="card">
              <img src="/images/holiday.jpg" class="card-img-top" alt="..." />
              <div class="card-body text-center">
                <p class="card-text">Some quicacard's content.</p>
                <p class="card-text price">₦300,000</p>
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

        <div class="col-md-3 col-sm-6 col-xs-12 prd">
          <a href="#" class="cover">
            <div class="card">
              <img src="/images/post1.jpg" class="card-img-top" alt="..." />
              <div class="card-body text-center">
                <p class="card-text">Some quicacard's content.</p>
                <p class="card-text price">₦300,000</p>
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

        <div class="col-md-3 col-sm-6 col-xs-12 prd">
          <a href="#" class="cover">
            <div class="card">
              <img src="/images/post2.jpg" class="card-img-top" alt="..." />
              <div class="card-body text-center">
                <p class="card-text">Some quicacard's content.</p>
                <p class="card-text price">₦300,000</p>
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

        <div class="col-md-3 col-sm-6 col-xs-12 prd">
          <a href="#" class="cover">
            <div class="card">
              <img src="/images/post3.jpg" class="card-img-top" alt="..." />
              <div class="card-body text-center">
                <p class="card-text">Some quicacard's content.</p>
                <p class="card-text price">₦300,000</p>
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
      </div>
    </div>
  </main>
@endsection