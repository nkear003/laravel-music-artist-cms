@extends('admin')

@section('title', ' | Create New Post')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">

@endsection

@section('content')

<div class="row">
    <div class="offset-2 col-8">
    
        <h1 class>Create New Release</h1>

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

            {{ Form::label('soundcloud_id', 'Soundcloud Playlist ID:') }}
            {{ Form::text('soundcloud_id', 72530870, array('class' => 'form-control', 'required' => '')) }}

            {{ Form::label('image', 'Image: ') }}
            {{ Form::file('image', array('class' => 'input-group form-control-file')) }}
            <small id="fileHelp" class="form-text text-muted">Upload your sick artwork.</small>
            
            {{ Form::label('wav', 'WAV zip: ') }}
            {{ Form::file('wav', array('class' => 'input-group form-control-file')) }}
            <small id="fileHelp" class="form-text text-muted">Upload WAV zip.</small>
                        
            {{ Form::label('mp3', 'MP3 zip: ') }}
            {{ Form::file('mp3', array('class' => 'input-group form-control-file')) }}
            <small id="fileHelp" class="form-text text-muted">Upload MP3 zip.</small>

            {{ Form::submit('Create Release', array('class' => 'btn btn-primary btn-lg btn-block margin-top mt-3')) }}

        {!! Form::close() !!}
    
    </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('js/parsley.min.js')}}"></script>

@endsection