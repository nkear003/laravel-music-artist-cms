@extends('main')

@section('title', ' | Create New Release')

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">

@endsection

@section('content')

<div class="row">
    <div class="offset-2 col-8">

        <h1 class>Create New Release</h1>

        <hr>

        {!! Form::open(['route' => 'releases.store', 'files' => 'true', 'data-parsley-validate' => '']) !!}

            <!--title-->
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '256') ) }}

            <!--description-->
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('class' => 'form-control') ) }}

            <!--release date-->
            {{ Form::label('released', 'Released:') }}
            {{ Form::date('released', \Carbon\Carbon::now(), array('class' => 'form-control release')) }}

            <!--genre-->
            {{ Form::label('genre', 'Genre:') }}
            {{ Form::text('genre', null, array('class' => 'form-control release')) }}

            <!--soundcloud id-->
            {{ Form::label('soundcloud_id', 'Soundcloud Playlist ID:') }}
            {{ Form::text('soundcloud_id', 72530870, array('class' => 'form-control', 'required' => '')) }}

            @include('partials._fileupload')

            <!--submit-->
            {{ Form::submit('Create Release', array('class' => 'btn btn-primary btn-lg btn-block margin-top mt-3')) }}

        {!! Form::close() !!}

    </div>
</div>

@endsection


@section('scripts')

<script src="{{asset('js/parsley.min.js')}}"></script>

@endsection
