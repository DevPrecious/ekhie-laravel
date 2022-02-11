@extends('layouts.admin')
@section('content')
<main>
    <div class="board">
      @include('layouts.admindesk')
      <div class="content order-content">
        <table class="order-table">
          <tr>
            <th>Order</th>
            <th>Date</th>
            <th>Status</th>
            <th>Total</th>
            <th>Actions</th>
          </tr>
         @foreach($orders as $order)
         <tr>
            <td>#{{ $order['OrderID'] }}</td>
            <td>{{ $order['created_at']->diffForHumans() }}</td>
            <td>Approved</td>
            <td>#{{ $order['total'] }}</td>
            <td>
              <a href="{{ route('details', $order['id']) }}" class="btn btn-default view-btn">view</a>
            </td>
          </tr>
         @endforeach
        </table>
      </div>
      
    </div>
  </main>

  @endsection