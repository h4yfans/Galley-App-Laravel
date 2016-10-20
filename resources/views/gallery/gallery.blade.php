@extends('master')

@include('includes.info')

@section('content')

    @if(Auth::check())
        <ul>
            <li><a href="{{route('get.user.logout')}}">Logout</a></li>
        </ul>
    @endif


    <div class="row">
        <div class="col-md-12">
            <h1>My Galleries</h1>
        </div>
    </div>

    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                <ul>
                    <li>{{$error}}</li>
                </ul>
            </div>
        @endforeach

    @endif

    <div class="row">
        <div class="col-md-8">
            @if($galleries->count() > 0 )
                <table class="table table-striped table-bordered table-responsive">
                    <thead>

                    <tr class="info">
                        <th>Name of the gallery</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>{{$gallery->name}}</td>
                            <td><a href="{{route('get.galleryPics', ['id' => $gallery->id]) }}">View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="col-md-4">
            <form action="{{route('post.gallery')}}" class="form" method="post">
                <input type="hidden" name="_token" value="{{Session::token()}}">

                <div class="form-group">
                    <input type="text" name="gallery_name" id="gallery_name" placeholder="Name of the gallery"
                           class="form-control" value="{{old('gallery_name')}}">
                </div>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>



@endsection