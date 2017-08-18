@extends('main')

@section('title', ' | Releases')

@section('content')
    
<div class="row">


    @for($i = 0; $i < count($releases); $i++)
    <div class="col">
        <a href="{{route('posts.show', $releases[$i]->slug)}}">
            <img class="img-fluid img-thumbnail" src="{{$releases[$i]->path_to_image}}" alt="">
        </a>
    </div>    
    @if( $i > 0 && ($i == 1 || $i % 3 == 0))
</div>
<div class="row mt-3">
    @endif
    @endfor       
</div>
    
@endsection