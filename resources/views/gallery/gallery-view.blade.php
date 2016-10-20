@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{$gallery->name}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{route('post.doUpload')}}" method="post" class="dropzone" id="addImages">
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <a href="{{route('get.gallery')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection