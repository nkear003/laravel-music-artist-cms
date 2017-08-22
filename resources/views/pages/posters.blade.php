@extends('main')

@section('title', ' | Posters')

@section('content')

<div class="row">
    <h1>This is the posters page.</h1>
</div>    
    
<div class="row">

    @for($i = 0; $i < count($posts); $i++)
    <div class="col">
        <img class="img-fluid img-thumbnail" src="{{$posts[$i]->path_to_image}}" alt="">
    </div>    
    @if( $i > 0 && ($i ==1 || $i == 3 || $i == 5))
</div>
<div class="row mt-3">
    @endif
    @endfor       
</div>
    

@endsection