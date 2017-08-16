<!DOCTYPE html>
<html lang="en">
    
    @include('partials._head')
    
    <body>
       
        @include('partials._adminbar')
        
        <div class="container-fluid" id="content"> 
            
            <div class="row">
                <div class="offset-2 col-8">
                    @include('partials._messages')
                </div>
            </div>
            @yield('content')
        </div>

    @include('partials._footer')
    
    </body>
</html>