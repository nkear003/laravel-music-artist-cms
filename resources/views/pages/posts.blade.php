@extends('main')


@section('title', ' | Posts')


@section('content')

<div class="row">
    <div class="col">
        <h1>{{$post->title}}</h1>
        <p class="lead">Posted in: {{$post->category->name}}</p>
    </div>
</div>

@endsection