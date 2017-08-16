@extends('main')

@section('title', ' | Releases')

@section('content')
    
<div class="row">

    <div class="grid col">
        @foreach($posts as $post)
            @if($post->is_featured)
            <a href="{{route('posts.show', $post->slug)}}">
                <img class="img-fluid featured grid-item img-thumbnail" src="{{asset('/storage/images/' . $post->image)}}" alt="">
            </a>
            @elseif(!$post->is_featured)
            <a href="{{route('posts.show', $post->slug)}}">
                <img class="img-fluid post img-thumbnail grid-item" src="{{asset('/storage/images/' . $post->image)}}" alt="">
            </a>
            @endif
            
        @endforeach
    </div>
    
</div>
    


@endsection


@section('scripts')

<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/script.min.js')}}"></script>

@endsection