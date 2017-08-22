@extends('main')

@section('title', ' | Weekend Mixtapes')

@section('content')
    
<div class="row">
    <h1>This is the Weekend Mixtapes page.</h1>
</div>
    
<div class="row">

    @for($i = 0; $i < count($posts); $i++)
    <div class="col">
        <img class="img-fluid rounded-circle img-thumbnail" src="{{$posts[$i]->path_to_image}}" alt="">
    </div>    
    @if($i == 2 || $i == 5)
</div>
<div class="row mt-3">
    @endif
    @endfor       
</div>
    
@endsection