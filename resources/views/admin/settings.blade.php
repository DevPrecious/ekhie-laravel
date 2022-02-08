@extends('layouts.admin')
@section('content')

<main>
    <div class="board">
        @include('layouts.admindesk')
        <div class="content setting-content">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('admin.setting') }}">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example1">First name</label>
                            <input type="text" id="form6Example1" value="{{ $profile->firstname ?? '' }}" name="firstname" class="form-control" />
                            @error('firstname') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <label class="form-label" for="form6Example2">Last name</label>
                            <input type="text" id="form6Example2" value="{{ $profile->lastname ?? '' }}" name="lastname" class="form-control" />
                            @error('lastname') <span class="text-danger"> {{ $message }} </span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <!-- Text input -->
                    <div class="col">
                        <label class="form-label" for="form6Example3">Display name</label>
                        <input type="text" id="form6Example3" value="{{ $user->name }}" name="name" class="form-control" />
                        @error('name') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>

                    <div class="col">
                        <label class="form-label" for="form6Example3">Phone Number</label>
                        <input type="number" id="form6Example3" value="{{ $profile->phone ?? '' }}" name="phone" class="form-control" />
                        @error('phone') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example4">Email Address</label>
                    <input type="Email" value="{{ $user->email }}" id="form6Example4" name="email" class="form-control" />
                    @error('email') <span class="text-danger"> {{ $message }} </span> @enderror
                </div>

                <h4 class="password-change">Password Change</h4>
                <hr>

                <!-- password input -->
                <!-- <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example5">Current Password</label>
                    <input type="password" id="form6Example5" class="form-control" />
                </div> -->

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example6">New Password</label>
                    <input type="password" name="password" id="form6Example6" class="form-control" />
                    @error('password') <span class="text-danger"> {{ $message }} </span> @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form6Example6">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="form6Example6" class="form-control" />
                </div>


                <!-- Submit button -->
                <button type="submit" class="btn btn-default view-btn btn-block mb-4">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
</main>

@endsection