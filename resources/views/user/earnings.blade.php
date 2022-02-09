@extends('layouts.dashboard')
@section('content')
<main>
    <div class="board">
        @include('layouts.desktop')
      <div class="content earnings-content">
        <div class="my-earning">
          <h4>My Earnings</h4>
          <div class="earning-details">
            <p>TOTAL EARNINGS</p>
            <p>#{{ $earnings->balance }}</p>
          </div>
        </div>
      </div>
    </div>
  </main>


  @endsection