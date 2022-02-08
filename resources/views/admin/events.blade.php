@extends('layouts.admin')
@section('content')

<main class="event-main">
    <div class="board">
        @include('layouts.admindesk')
      <div class="content ctn">
        <!-- <div class="review-content"> -->
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Event Name</th>
              <th scope="col">Date</th>
              <th scope="col">Organizer</th>
              <th scope="col">View</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($events as $event)
           <tr>
            <th scope="row">{{ $event->id }}</th>
            <td>{{ $event->title }}</td>
            <td>{{ $event->start_date }}</td>
            <td>{{ $event->user->name }}</td>
            <td>
              <a href="{{ route('event', $event->id) }}" class="btn btn-default view-btn">Event</a>
            </td>
          </tr>
           @endforeach
          </tbody>
        </table>
        <!-- </div> -->
      </div>
    </div>
  </main>

@endsection