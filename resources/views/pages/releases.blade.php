@extends('main')

@section('title', ' | Releases')

@section('content')
    
<div class="row">

    <div class="grid col">
        @foreach($releases as $release)

            <a href="{{route('releases.show', $release->slug)}}">
                <img class="img-fluid release grid-item" src="{{asset('/storage/images/' . $release->image)}}" alt="">
            </a>
            
        @endforeach
    </div>
    
</div>
    


@endsection


@section('scripts')

<script src="{{asset('js/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js/script.min.js')}}"></script>

@endsection