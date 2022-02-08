@extends('layouts.admin')
@section('content')

<main class="organisers-main">
    <div class="board">
        @include('layouts.admindesk')
      <div class="content ctn">
          @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Events</th>
              <th scope="col">control</th>
            </tr>
          </thead>
          <tbody>
            @foreach($organizers as $organizer)
            <tr>
              <th scope="row">{{ $organizer->id }}</th>
              <td>{{ $organizer->name }}</td>
              <td>{{ $organizer->email }}</td>
              <td>{{ $organizer->events->count() }}</td>
              <td>
                {{-- <a href="#" class="edit">Edit</a> --}}
                <a href="{{ route('admin.delete', $organizer->id) }}" class="delete">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

@endsection