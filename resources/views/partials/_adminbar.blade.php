<!--adminbar-->
<nav class="navbar navbar-toggleable-md navbar-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="{{url('/')}}" class="nav-link {{ Request::is('admin') ? "active" : "" }}">Home</a></li> 
            <li class="nav-item"><a class="nav-link" href="{{url('/posts')}}">Posts Index</a></li>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Files</a>
                <div class="dropdown-menu">
                    <a href="{{route('files.create')}}" class="dropdown-item">Upload File</a>
                    <a href="{{route('files.index')}}" class="dropdown-item">Files Index</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item {{ Request::is('releases') ? "active" : "" }}" href="{{url('/releases')}}">Releases</a>
                    <a class="dropdown-item {{ Request::is('posters') ? "active" : ""}}" href="{{url('/posters')}}">Posters</a>
                    <a class="dropdown-item {{ Request::is('wm') ? "active" : ""}}" href="{{url('/wm')}}">WM</a>
                </div>
            </div>
        </ul>
    </div>
</nav>