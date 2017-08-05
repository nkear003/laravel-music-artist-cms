<!DOCTYPE html>
<html lang="en">
    
    @include('partials._head')
    
    <body>
       
        @include('partials._navbar')
        
        <div class="container-fluid"> <!-- Content -->
           
            <div class="offset-1 col-10">

               @include('partials._messages')
               
               @yield('content')
           
            </div>
            
        </div>

    @include('partials._footer')
    
    </body>
</html>