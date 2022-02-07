@extends('layouts.app')
@section('content')

<main>
    <form action="{{ route('purchase') }}" method="POST">
        @csrf
        <div class="container-fluid buy-ticket">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <h3>Ticket information will be sent to this details</h3>
                        <label for="buyer-info">Buyer Information</label><br />
                        <div class="fields">
                            <input type="text" name="firstname" value="{{ $user->profile->firstname ?? '' }}" placeholder="First name" />
                            <input type="text" name="lastname" value="{{ $user->profile->lastname ?? '' }}" placeholder="Last name" />
                            <input type="tel" name="phone" value="{{ $user->profile->phone ?? '' }}" placeholder="Enter phone number" />
                            <input type="email" name="email" value="{{ $user->email ?? '' }}" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="subtotal">
                        <h3>Ticket Order</h3>
                        <div class="ticket-select">
                            <div class="test">
                                <h5>SubTotal</h5>
                            </div>
                            <div class="price">
                                <p>
                                   <!-- Loop through session qtyy from controller -->
                                    {{$total}}
                                    @foreach ($qty as $item)
                                        <input type="hidden" name="qty[]" value="{{ $item }}">
                                    @endforeach
                                    @foreach ($type as $item)
                                    <input type="hidden" name="type[]" value="{{ $item }}">
                                    @endforeach
                                    <input type="hidden" name="price" value="{{$total}}">
                                    <input type="hidden" name="event_id" value="{{$event_id}}">
                                    
                                </p>
                            </div>
                        </div>
                        <button class="btn btn-default pay-btn">Make Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

@endsection