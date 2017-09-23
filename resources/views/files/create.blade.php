@extends('main')

@section('title', ' | Create New Post')

@section('css')

<link rel="stylesheet" href="{{ asset('css/parsley.min.css') }}">

@endsection

@section('content')

<div class="row">
    <div class="offset-2 col-8">
    
        <h1 class>Create New Post</h1>

        <hr>

        {!! Form::open(['route' => 'files.store', 'files' => 'true', 'data-parsley-validate' => '']) !!}        
            
            @include('partials._fileupload')
            
            <!--submit-->
            {{ Form::submit('Upload File', array('class' => 'btn btn-primary btn-lg btn-block margin-top mt-3')) }}

        {!! Form::close() !!}
    
    </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('js/parsley.min.js')}}"></script>

@endsection