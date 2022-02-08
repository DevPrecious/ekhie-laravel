@extends('layouts.dashboard')
@section('content')
<main>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <h3>Order Details</h3>
 <div class="order-details">
    <div class="details-head">
        <p>PRODUCT</p>
        <p>TOTAL</p>
    </div><hr>

    <div class="product-details">
        <p>{{ $product['type'] }}</p>
        <p>#{{ $product['ticket_price'] }}</p>
    </div><hr>
    <div class="sum">
        <div class="all">
        <p>SUBTOTAL : <span class="extra">#{{ $product['total'] }}</span></p>
        <p>PAYMENT METHOD : <span class="extra">Flutterwave</span></p>
        <p>TOTAL : <span class="extra">#{{ $product['ticket_price'] }}</span></p>
    </div>
    </div>

    <div>
       <a class="btn btn-primary" href="{{ route('orders') }}">Back</a>
    </div>
 </div>
</main>

@endsection