<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)">Brand</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">User Management
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li><a href="javascript:void(0)">Another action</a></li>
                        <li><a href="javascript:void(0)">Something else here</a></li>
                        <li class="divider"></li>
                        @if(Auth::check())
                                <li><a href="{{route('get.user.logout')}}">Logout</a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>