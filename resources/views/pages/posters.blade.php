@extends('main')

@section('title', ' | Releases')

@section('content')

<div class="row">
    <h1>This is the posters page.</h1>
</div>    
    
<div class="row">

    @for($i = 0; $i < count($releases); $i++)
    <div class="col">
        <img class="img-fluid img-thumbnail" src="{{$releases[$i]->path}}" alt="">
    </div>    
    @if( $i > 0 && ($i ==1 || $i == 3 || $i == 5))
</div>
<div class="row mt-3">
    @endif
    @endfor       
</div>
    

@endsection