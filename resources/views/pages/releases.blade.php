@extends('main')

@section('title', ' | Releases')

@section('content')

<div class="row">

    @for($i = 0; $i < count($releases); $i++)
    <div class="col">
        <div class="overlay">
            <a href="{{route('releases.show', $releases[$i]->slug)}}">
                <img class="img-fluid" src="{{$releases[$i]->image->path}}" alt="{{$releases[$i]->image->title}}">
            </a>
            <div class="overlay-content">
                <h3 class="text-white text-center align-middle">{{$releases[$i]->title}}</h3>
            </div>
        </div>
    </div>
    @if( $i > 0 && ($i == 1 || $i % 3 == 0))
</div>
<div class="row mt-3">
    @endif
    @endfor
</div>


@endsection
