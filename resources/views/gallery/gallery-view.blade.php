@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{$gallery->name}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{route('get.gallery')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection