@extends('layouts.app')
@section('content')
<main>
    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center heading">Signup</h3>
                                    </div>
                                </div>
                                <div class="form-group form-primary"> <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Display name" id="first_name">
                                @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                                <div class="form-group form-primary"> <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="Email" id="email">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                                <div class="form-group form-primary"> <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="" id="password"> 
                                @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                                <div class="form-group form-primary"> <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat password" value="" id="password_confirm"> </div>
                                <div class="row">
                                    <div class="col-md-12"> <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" name="submit" value="Signup">
                                    </div>
                                </div>
                                <div class="or-container">
                                    <div class="line-separator"></div>
                                    <div class="or-label">or</div>
                                    <div class="line-separator"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Signup using Google account</a> </div>
                                </div> <br>
                                <p class="text-inverse text-center">Already have an account? <a href="login.html" data-abc="true">Login</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection