@extends('main')


@section('title', ' | Admin Dashboard')


@section('content')

<!--content-->
<div class="row">
    <div class="col">
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-block btn-lg pb-5 pt-5">Create New Release</a>
    </div>
    <div class="col">
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-block btn-lg pb-5 pt-5">Upload File</a>
    </div>
</div>
<div class="row mt-5">
    <div class="col">
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-block btn-lg pb-5 pt-5">Write a Blog Post</a>
    </div>
    <div class="col">
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-block btn-lg pb-5 pt-5">-</a>
    </div>
</div>

@endsection