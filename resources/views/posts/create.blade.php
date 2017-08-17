@extends('main')

@section('title', ' | Create New Post')

@section('inline-script')

<script>
    function run() {
        var box = document.getElementById("select-box");
        var selection = box.options[box.selectedIndex].text;
//        console.log(selection);
        
        if (selection === 'Post' || selection === 'File') {
            $(".release").addClass("hide");
        }
    }
    
</script>

@endsection

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">

@endsection

@section('content')

<div class="row">
    <div class="offset-2 col-8">
    
        <h1 class>Create New Post</h1>

        <hr>

        {!! Form::open(['route' => 'posts.store', 'files' => 'true', 'data-parsley-validate' => '']) !!}
            
            {{ Form::select('type', ['Release', 'Post', 'File'], null, ['class' => 'form-control mb-5', 'id' => 'select-box', 'onchange' => 'run()']) }}
                
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '256') ) }}

            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', null, array('class' => 'form-control') ) }}

            {{ Form::label('released', 'Released:', ['class' => 'release']) }}
            {{ Form::date('released', \Carbon\Carbon::now(), array('class' => 'form-control release')) }}

            {{ Form::label('genre', 'Genre:', ['class' => 'release']) }}
            {{ Form::text('genre', null, array('class' => 'form-control release')) }}

            {{ Form::label('soundcloud_id', 'Soundcloud Playlist ID:') }}
            {{ Form::text('soundcloud_id', 72530870, array('class' => 'form-control', 'required' => '')) }}

            {{ Form::label('image', 'Image: ') }}
            {{ Form::file('image', array('class' => 'input-group form-control-file')) }}
            
            {{ Form::checkbox('wm') }} WM <br>
            {{ Form::checkbox('poster') }} Poster
            <small id="fileHelp" class="form-text text-muted">Upload image.</small>
            
            
            {{ Form::label('wav', 'WAV zip: ') }}
            {{ Form::file('wav', array('class' => 'input-group form-control-file release')) }}
            <small id="fileHelp" class="form-text text-muted">Upload WAV zip.</small>
                        
            {{ Form::label('mp3', 'MP3 zip: ') }}
            {{ Form::file('mp3', array('class' => 'input-group form-control-file release')) }}
            <small id="fileHelp" class="form-text text-muted">Upload MP3 zip.</small>

            {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block margin-top mt-3')) }}

        {!! Form::close() !!}
    
    </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('js/parsley.min.js')}}"></script>

@endsection