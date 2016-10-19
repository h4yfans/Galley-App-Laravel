@extends('master')

@section('content')

    <div class="jumbotron col-sm-6 col-sm-push-3" style="margin-top: 5em;">
        <h1>Login</h1>

        <form action="{{route('user.signin')}}" method="post">
            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="Enter your email" class="form-control">
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Enter your secret password"
                       class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="Login" name="login" id="login-btn" class="btn btn-primary">
                <a href="{{route('user.signup')}}">sign up!</a>
            </div>

            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>

@endsection