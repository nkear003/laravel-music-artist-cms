<!DOCTYPE html>
<html lang="en">
    @include('partials._head')
    <body>
        @include('partials._navbar')
        <!-- Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="offset-2 col-8">
                    @include('partials._messages')
                    @yield('content')
                </div>
            </div>
        </div>
        @include('partials._footer')
    <script src="{{asset('js/script.min.js')}}"></script>
    </body>
</html>
