<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif


    @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
    @endif

    @if(count($errors) > 0 )
        @foreach($errors->all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
        @endforeach
    @endif

</div>
