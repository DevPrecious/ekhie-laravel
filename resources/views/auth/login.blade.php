@extends('layouts.app')
@section('content')
<main>
    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="text-center heading">Login</h2>
                                    </div>
                                </div>
                                <div class="form-group form-primary"> <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="" placeholder="Email" id="email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                <div class="form-group form-primary"> <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="" id="password"> </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-md-12"> <input type="submit" class="btn btn-default btn-md btn-block waves-effect text-center  m-b-20 submit-btn" name="submit" value="Login">
                                    </div>
                                </div>
                                <div class="or-container">
                                    <div class="line-separator"></div>
                                    <div class="or-label">or</div>
                                    <div class="line-separator"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Login with Google account</a> </div>
                                </div> <br>
                                <p class="text-inverse text-center">Don't have an account? <a href="signup.html" data-abc="true">Signup</a></p>
                                <p class="text-inverse text-center"><a href="forgotPassword.html" data-abc="true">Forgot password ?</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection