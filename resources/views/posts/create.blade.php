@extends('admin')

@section('title', ' | Create New Post')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">

@endsection

@section('content')

<div class="offset-2 col-8">
    
    <h1>Create New Post</h1>
    <hr>

    {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}

        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control ', 'required' => '', 'maxlength' => '256') ) }}
        
        {{ Form::label('body', 'Post Body:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '' ) ) }}
        
        {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block')) }}

    {!! Form::close() !!}
    
</div>

@endsection


@section('scripts')

<script src="parsley.min.js"></script>

@endsection