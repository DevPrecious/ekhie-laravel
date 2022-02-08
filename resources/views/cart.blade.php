@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/cart.css" />
<main>
    <div class="container cart-ctn">
      <h3>Shopping Cart</h3>
      <hr />
      <div class="cart-items">
        <div class="cart-item">
          <a href="#" class="cancel">x</a>
          <img src="/images/post3.jpg" alt="" />
          <p>Holiday gift package 2</p>
        </div>
        <div class="price"><p>₦100,000</p></div>
        <div class="quantity">
          <div class="pay-btn">
            <button class="minus bt" onclick="handleDecrement()">-</button>
            <div id="amount"></div>
            <button class="add bt" onclick="handleIncrement()">+</button>
          </div>
        </div>
      </div>
      <hr />

      <div class="cart-items">
        <div class="cart-item">
          <a href="#" class="cancel">x</a>
          <img src="/images/post6.jpg" alt="" />
          <p>Shoes & gift boxes</p>
        </div>
        <div class="price"><p>₦5,000</p></div>
        <div class="quantity">
          <div class="pay-btn">
            <button class="minus bt" onclick="handleDecrement()">-</button>
            <div id="amount"></div>
            <button class="add bt" onclick="handleIncrement()">+</button>
          </div>
        </div>
      </div>

      <div class="total">
        <div class="tot">
          <h4>Cart Totals</h4>
          <div class="calc">
            <p>Subtotal</p>
            <p>₦13,000</p>
          </div>
          <button class="btn btn-default checkout">Checkout</button>
        </div>
      </div>
    </div>
  </main>
  @endsection