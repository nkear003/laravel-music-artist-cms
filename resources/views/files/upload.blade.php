@extends('main')

@section('title', ' | Create New Post')

@section('inline-script')

<script>
    function run() {
        var box = document.getElementById("select-box");
        var selection = box.options[box.selectedIndex].text;
        
        if (selection === 'File') {
            $(".release").addClass("hide");
        } else if (selection === 'Release') {
            $(".release").removeClass("hide");
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

        {!! Form::open(['route' => 'images.store', 'files' => 'true', 'data-parsley-validate' => '']) !!}        
            <!--image-->
            {{ Form::label('image', 'Image: ') }}
            {{ Form::file('image', array('class' => 'input-group form-control-file')) }}
            
            <!--Image Type-->
            {{ Form::checkbox('wm') }} WM <br>
            {{ Form::checkbox('poster') }} Poster
            <small id="fileHelp" class="form-text text-muted">Upload image.</small>
            
            <!--wav-->
            {{ Form::label('wav', 'WAV zip: ') }}
            {{ Form::file('wav', array('class' => 'input-group form-control-file')) }}
            <small id="fileHelp" class="form-text text-muted">Upload WAV zip.</small>
                   
            <!--mp3-->
            {{ Form::label('mp3', 'MP3 zip: ') }}
            {{ Form::file('mp3', array('class' => 'input-group form-control-file')) }}
            <small id="fileHelp" class="form-text text-muted">Upload MP3 zip.</small>
            
            <!--submit-->
            {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block margin-top mt-3')) }}

        {!! Form::close() !!}
    
    </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('js/parsley.min.js')}}"></script>

@endsection