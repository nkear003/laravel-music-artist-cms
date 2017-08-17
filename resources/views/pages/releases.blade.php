@extends('main')

@section('title', ' | Releases')

@section('content')
    
<div class="row">

    <div class="col">
        @foreach($posts as $post)
            @if($post->is_featured)
            <a href="{{route('posts.show', $post->slug)}}">
                <img class="img-fluid img-thumbnail" src="{{asset('/storage/images/' . $post->image)}}" alt="">
            </a>
            @elseif(!$post->is_featured)
            <a href="{{route('posts.show', $post->slug)}}">
                <img class="img-fluid img-thumbnail" src="{{asset('/storage/images/' . $post->image)}}" alt="">
            </a>
            @endif
            
        @endforeach
    </div>
    
</div>
    


@endsection