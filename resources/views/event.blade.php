@extends('layouts.app')
@section('content')

<main>
  <div class="top">
    <div class="header">
      <h2>{{ $event->title }}</h2>
      <div class="line"></div>
    </div>
  </div>
  <div class="desc">
    <h3>Event Description</h3>
  </div>


  <div class="desc-info">
    <img src="/storage/{{ $event->event_image }}" alt="">
    <div class="desc-box">
      <div class="container">
        <div class="row">
          <div class="col-md-6 left-part">
            <h4><i class="far fa-calendar-alt"></i>Details</h4>
            <p class="date">Date : {{ \Carbon\Carbon::parse($event->start_date)->startOfMinute() }}</p>
            <p class="time">Time : {{ $event->start_time }}</p>
            <p class="cost">Cost : ₦5000</p>
          </div>
          <div class="col-md-6 right-part">
            <h4><i class="fas fa-users"></i>Organisers</h4>
            <p class="name">Name : {{ $event->name }}</p>
            <p class="phone">Phone : {{ $event->phone }}</p>
            <p class="email">Email : {{ $event->email }}</p>
          </div>
        </div>
        <div class="venue">
          <h4><i class="fas fa-map-marker-alt"></i>Venue</h4>
          <p class="location">{{ $event->location }}, {{ $event->city }}, {{ $event->state }}, {{ $event->country }}</p>
        </div>
        <div class="short-desc">
          <h4>Event Description</h4>
          <p>{{ $event->description }}</p>
        </div>
      </div>
    </div>
    <!--payment button and price range-->
    <div class="pay">
      <!--regular ticket price and button-->

      <form action="{{ route('store') }}" method="POST">
        <input type="hidden" name="event" value="{{ $event->id }}">
        @foreach($tickets as $ticket)
        @csrf
      <div class="pay-reg">
        <div class="pay-type">
          <p class="ticket-type">{{ $ticket->ticket_type }}</p>
          <input type="text" placeholder="Quantity" name="qty[]">
          <input type="hidden" name="type[]" value="{{ $ticket->ticket_type }}">
          <input type="hidden" name="price[]" value="{{ $ticket->ticket_price }}">
        </div>
        <div class="pay-price">
          <p>#{{ $ticket->ticket_price }}</p>
        </div>
      </div>
      @endforeach
      <div class="pay-button">
        <button wire:click="store" class="btn btn-default">
          Buy Ticket
        </button>
      </div>
      </form>



    </div>

  </div>


</main>




@endsection