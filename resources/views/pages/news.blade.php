@extends('main')

@section('content')

<div class="row" id="release">
    <h1>Latest Release: <a href="{{route('releases.show', $release->slug)}}">{{$release->title}}</a></h1>
</div>
<div class="row">
    <img src="{{asset($release->image->path)}}" alt={{$release->title}}>
</div>

@endsection
