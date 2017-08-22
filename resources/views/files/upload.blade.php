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

        {!! Form::open(['route' => 'files.store', 'files' => 'true', 'data-parsley-validate' => '']) !!}        
            
            @include('partials._fileupload')
            
            <!--submit-->
            {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block margin-top mt-3')) }}

        {!! Form::close() !!}
    
    </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('js/parsley.min.js')}}"></script>

@endsection