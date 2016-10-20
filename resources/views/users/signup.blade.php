@extends('master')

@include('includes.info')

@section('content')

    <div class="jumbotron col-sm-6 col-sm-push-3" style="margin-top: 5em;">
        <h1>Sign Up</h1>

        <form action="{{route('post.user.signup')}}" method="post">
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control">
            </div>

            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="Enter your email" class="form-control">
            </div>

            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Enter your secret password"
                       class="form-control">
            </div>

            <div class="form-group">
                <input type="password" name="password_repeat" id="password" placeholder="Enter your secret password"
                       class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" value="Sign Up" name="login" id="login-btn" class="btn btn-primary">
            </div>

            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>

@endsection