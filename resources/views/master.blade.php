<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery App | Laravel</title>


    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/bootstrap-material-design.css">
    <link rel="stylesheet" type="text/css"
          href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/ripples.css">
    <link rel="stylesheet" href="{{URL::to('css/lightbox.css')}}">
    <script>
        var baseUrl = "{{url('/')}}";
    </script>
</head>
<body>
<div class="container">
    @if(Session::has('flash_message'))
        <div class="alert alert-success">{{Session::get('flash_message')}}</div>
    @endif

    @if(Session::has('flash_error'))
        <div class="alert alert-danger">{{Session::get('flash_error')}}</div>
    @endif

    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="{{URL::to('js/lightbox.min.js')}}"></script>
<script src="{{URL::to('js/styles.js')}}"></script>
<script src="{{URL::to('js/ripples.min.js')}}"></script>
<script src="{{URL::to('js/material.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script src="{{URL::to('js/dropzone.js')}}"></script>

</body>
</html>