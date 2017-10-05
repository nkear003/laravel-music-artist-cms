@extends('main')

@section('content')

<div class="row" id="release">
    <h1>Latest Release</h1>
    <hr>
    <a href="{{route('releases.show', $release->slug)}}">{{$release->title}}</a>
</div>
<div class="row">
    <a href="{{route('releases.show', $release->slug)}}">
        <img src="{{asset($release->image->path)}}" alt={{$release->title}}>
    </a>
</div>

@endsection
