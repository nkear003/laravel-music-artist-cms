<!--adminbar-->
<nav class="navbar navbar-toggleable-md navbar-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{url('/')}}" class="nav-link {{ Request::is('admin') ? "active" : "" }}">Home</a></li> 
            <li class="nav-item"><a class="nav-link" href="{{url('/posts')}}">Posts Index</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('files.index')}}">Files Index</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('releases') ? "active" : "" }}" href="{{url('/releases')}}">Releases</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('posters') ? "active" : ""}}" href="{{url('/posters')}}">Posters</a></li>
            <li class="nav-item"><a class="nav-link {{ Request::is('wm') ? "active" : ""}}" href="{{url('/wm')}}">WM</a></li>
            <li class="nav-item"><a href="#" id="show_user_nav" class="nav-link">Show User Nav</a></li>
        </ul>
    </div>
</nav>