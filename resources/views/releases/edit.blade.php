@extends('main')

@section('title') | Edit {{$release->title}} @endsection

@section('content')

{!! Form::model($release, ['route' => ['releases.update', $release->id], 'method' => 'PUT', 'files' => true]) !!}

<!--edit buttons-->

<!--title-->
<div class="row mb-3">
    <div class="col">
       <h1>{{ Form::text('title', null) }}</h1>
    </div>
    <div class="col">
        <div class="btn-group d-flex justify-content-end">
            {!! Html::linkRoute('releases.show', 'Cancel', array($release->slug), ['class' => 'btn btn-danger']) !!}
            {{ Form::submit('Update Release', ['class' => 'btn btn-success']) }}
        </div>
    </div>
</div>

<!--main content-->
<div class="row" id="main-content">
    <!--left side-->
    <div class="col">
        <!--img-->
        <img src="{{ asset('storage/images/' . $release->image) }}" alt="{{ $release->image }}">
        {{ Form::file('image', ['class' => 'input-group form-control-file']) }}
        <small id="fileHelp" class="form-text text-muted">Replace artwork.</small>
        <hr>
        <!--info-->
        <ul>
            <li><strong>Released: </strong>{{ Form::date('released', \Carbon\Carbon::now()) }}</li>
            <li><strong>Genre: </strong>{{ Form::text('genre', null) }}</li>
            <li><strong>Mastering: </strong>{{ Form::text('mastered_by', null) }}</li>
        </ul>
        <hr>
        <p class="lead">{{ Form::textarea('description', null) }}</p>
    </div>
    <!--right side-->
    <div class="col">
        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/{{$release->soundcloud_id}}&amp;color=040404&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        {{ Form::text('soundcloud_id', null) }}
        <small class="form-text text-muted">Change soundcloud id</small>
        <!--downloads-->
        <hr>
        <h2>Download</h2>
        @if($release->wav)
        <a href="{{ asset('storage/zips/' . $release->wav) }}">
            <button class="btn btn-primary">WAV</button>
        </a>
        @elseif(!$release->wav)
        {{ Form::file('wav', array('class' => 'input-group form-control-file')) }}
        <small id="fileHelp" class="form-text text-muted">Upload WAV zip.</small>
        @endif
        @if($release->mp3)
        <a href="{{ asset('storage/zips/' . $release->mp3) }}">
            <button class="btn btn-primary">MP3</button>     
        </a>    
        @elseif(!$release->mp3)
        {{ Form::file('mp3', array('class' => 'input-group form-control-file')) }}
        <small id="fileHelp" class="form-text text-muted">Upload MP3 zip.</small>
        @endif

    </div>
</div>

{!! Form::close() !!}

<hr>

@include('partials._newsletter')


@endsection


@section('scripts')
<script src="{{asset('js/parsley.min.js')}}"></script>
@endsection