@extends('layouts.dashboard')
@section('content')

<main class="product-main">
    <div class="board">
        @include('layouts.desktop')
      <div class="content product-content">
        <h4>Products overview</h4>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Amount</th>
              <th scope="col">View</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($products as $product)
              @foreach ($product->tickets as $prd)
            <tr>
              <th scope="row">{{ $prd->id }}</th>
              <td>{{ $prd->ticket_type }}</td>
              <td>#{{ $prd->ticket_price }}</td>
              <td><a href="{{ route('event', $product->id) }}">View</a></td>
            </tr>
            @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

@endsection
