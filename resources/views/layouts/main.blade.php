<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
    
  </head>
  <body>
   
    @include('layouts.partials._navigation')
   
    @yield('content')
    
    @include('layouts.partials._footer')

  </body>
</html>