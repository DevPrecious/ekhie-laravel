@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="css/orderdetails.css" />
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
    @foreach($array as $product)
    <div class="product-details">
        <p>{{ $product['type'] }}</p>
        <p>#{{ $product['price'] }}</p>
    </div><hr>
    @endforeach
    <div class="sum">
        <div class="all">
        <p>SUBTOTAL : <span class="extra">#{{ $product['total'] }}</span></p>
        <p>PAYMENT METHOD : <span class="extra">Flutterwave</span></p>
        <p>TOTAL : <span class="extra">#{{ $product['total'] }}</span></p>
    </div>
    </div>

    <div>
        <form action="{{ route('clear') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Back</button>
        </form>
    </div>
 </div>
</main>

@endsection