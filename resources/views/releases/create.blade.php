@extends('admin')

@section('title', ' | Create New Post')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/') }}">

@endsection

@section('content')

<div class="offset-2 col-8">
    
    <h1>Create New Release</h1>
    
    <hr>

    {!! Form::open(['route' => 'releases.store', 'files' => 'true', 'data-parsley-validate' => '']) !!}

        {{ Form::label('title', 'Title:') }}
        {{ Form::text('title', null, array('class' => 'form-control ', 'required' => '', 'maxlength' => '256') ) }}
        
        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description', null, array('class' => 'form-control') ) }}
        
        {{ Form::label('released', 'Released:') }}
        {{ Form::date('released', \Carbon\Carbon::now(), array('class' => 'form-control')) }}
        
        {{ Form::label('genre', 'Genre:') }}
        {{ Form::text('genre', null, array('class' => 'form-control')) }}
        
        {{ Form::label('image', 'Image: ') }}
        {{ Form::file('image', array('class' => 'input-group form-control-file')) }}
        <small id="fileHelp" class="form-text text-muted">Upload your sick artwork.</small>
        
        {{ Form::submit('Create Release', array('class' => 'btn btn-primary btn-lg btn-block')) }}

    {!! Form::close() !!}
    
</div>

@endsection


@section('scripts')

<script src="parsley.min.js"></script>

@endsection