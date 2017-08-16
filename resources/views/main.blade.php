<!DOCTYPE html>
<html lang="en">
    
    @include('partials._head')
    
    <body>
       
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