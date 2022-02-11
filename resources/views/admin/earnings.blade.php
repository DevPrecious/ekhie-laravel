@extends('layouts.admin')
@section('content')
<main>
    <div class="board">
        @include('layouts.admindesk')
      <div class="content earnings-content">
        <div class="my-earning">
          <h4>My Earnings</h4>
          <div class="earning-details">
            <p>TOTAL EARNINGS</p>
            @if(empty($balance))
            <p>#0</p>
            @else
            <p>#{{ $earnings->balance }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </main>


  @endsection