@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/orderdetails.css" />
<main>
    <h3>Order Details</h3>
 <div class="order-details">
    <div class="details-head">
        <p>PRODUCT</p>
        <p>TOTAL</p>
    </div><hr>
    <div class="product-details">
        <p>Holiday package ticket</p>
        <p>#13,000</p>
    </div><hr>
    <div class="sum">
        <div class="all">
        <p>SUBTOTAL : <span class="extra">#13,200</span></p>
        <p>PAYMENT METHOD : <span class="extra">Flutterwave</span></p>
        <p>TOTAL : <span class="extra">#13,200</span></p>
    </div>
    </div>
 </div>
</main>

@endsection