<!--adminbar-->
<nav class="navbar navbar-toggleable-md navbar-light">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
        <div class="navbar-nav">
            <div class="nav-item"><a href="{{url('/')}}" class="nav-link {{ Request::is('/') ? "active" : "" }}">Home</a></div>
            <div class="nav-item"><a class="nav-link {{ Request::is('releases') ? "active" : "" }}" href="{{url('/releases')}}">Releases</a></div>
            <div class="nav-item"><a class="nav-link {{ Request::is('posters') ? "active" : ""}}" href="{{url('/posters')}}">Posters</a></div>
            <div class="nav-item"><a class="nav-link {{ Request::is('wm') ? "active" : ""}}" href="{{url('/wm')}}">WM</a></div>
        </div>
    </div>
</nav>
