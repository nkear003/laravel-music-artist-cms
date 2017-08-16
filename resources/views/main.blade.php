<!DOCTYPE html>
<html lang="en">
    @include('partials._head')
    
    <body>

        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            </div>
        </nav>

        @include('partials._navbar')

        <!-- Content -->
        <div class="container-fluid">

            <div class="row">

                <div class="offset-1 col-10">

                    @include('partials._messages')

                    @yield('content')

                </div>

            </div>

        </div>

        @include('partials._footer')

    </body>
    
</html>