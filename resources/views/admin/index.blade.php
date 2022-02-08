@extends('layouts.admin')
@section('content')

<main class="review-main">
      <div class="board">
        @include('layouts.admindesk')
        <div class="content ctn review-content">
          @if(session('success'))
          <div class="alert alert-success">
            {{session('success')}}
          </div>
          @endif
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Event Name</th>
                <th scope="col">Organizer</th>
                <th scope="col">View</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $event)
              <tr>
                <th scope="row">{{ $event->id }}</th>
                <td>{{ $event->title }}</td>
                <td>{{ $event->user->name }}</td>
                <td>
                  <a href="{{ route('admin.event', $event->id) }}" class="btn btn-default view-btn">Event</a>
                </td>
                <td>
                  <a href="{{ route('admin.accept', $event->id) }}" class="btn btn-default view-btn2">
                    <i class="fas fa-check"></i>
                  </a>
                  <a href="{{ route('admin.reject', $event->id) }}" class="btn btn-default view-btn3">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      </div>
    </main>

@endsection