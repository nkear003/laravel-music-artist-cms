@extends('main')

@section('title') | Edit {{$post->title}} @endsection

@section('content')

{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

<!--edit buttons-->
<div class="row mb-3 d-flex justify-content-end">
    <div class="card">
        <div class="card-block">
            <div class="btn-group" id="edit_buttons_box">    
                <!--<button type="button" class="btn btn-default" id="hide__edit_buttons_box">Hide</button>-->
                
                {!! Html::linkRoute('posts.show', 'Cancel', array($post->slug), ['class' => 'btn btn-danger']) !!}

                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete'] ) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}

                <a href="{{route('posts.index')}}" class="btn btn-default">All Posts</a>
            </div>
        </div>
    </div>
</div>

<!--title-->
<div class="row mb-3">
    <div class="col">
       <h1>{{ Form::text('title', null) }}</h1>
    </div>
    <div class="col">
        <div class="btn-group d-flex justify-content-end">
            {!! Html::linkRoute('posts.show', 'Cancel', array($post->slug), ['class' => 'btn btn-danger']) !!}
            {{ Form::submit('Update Release', ['class' => 'btn btn-success']) }}
        </div>
    </div>
</div>

<!--main content-->
<div class="row" id="main-content">
    <!--left side-->
    <div class="col">
        <!--img-->
        <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->image }}">
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
        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/{{$post->soundcloud_id}}&amp;color=040404&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        {{ Form::text('soundcloud_id', null) }}
        <small class="form-text text-muted">Change soundcloud id</small>
        <!--downloads-->
        <hr>
        <h2>Download</h2>
        @if($post->wav)
        <a href="{{ asset('storage/zips/' . $post->wav) }}">
            <button class="btn btn-primary">WAV</button>
        </a>
        @elseif(!$post->wav)
        {{ Form::file('wav', array('class' => 'input-group form-control-file')) }}
        <small id="fileHelp" class="form-text text-muted">Upload WAV zip.</small>
        @endif
        @if($post->mp3)
        <a href="{{ asset('storage/zips/' . $post->mp3) }}">
            <button class="btn btn-primary">MP3</button>     
        </a>    
        @elseif(!$post->mp3)
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