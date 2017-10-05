@extends('main')

@section('content')

<div class="row" id="release">
    <div class="col">
        <h2>Latest Release</h2>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="{{route('releases.show', $release->slug)}}">
            <img src="{{asset($release->image->path)}}" alt={{$release->title}}>
        </a>
    </div>
    <div class="col">
        @include('releases._soundcloud')
    </div>
</div>

@endsection
