<!DOCTYPE html>
<html lang="en">
    
    @include('partials._head')
    
    <body>
       
        @include('partials._adminbar')
        
        <div class="container-fluid" id="content"> 
            <div class="offset-1 col-10">
               @yield('content')   
            </div>
        </div>

    @include('partials._footer')
    
    </body>
</html>