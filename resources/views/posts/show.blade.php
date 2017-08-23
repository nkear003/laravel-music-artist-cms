@extends('main')

@section('title') | {{$post->title}} @endsection


@section('content')
<!--edit buttons-->
<div class="row mb-3 d-flex justify-content-end">
    <div class="card">
        <div class="card-block">
            <div class="btn-group" id="edit_buttons_box">    
                <!--<button type="button" class="btn btn-default" id="hide__edit_buttons_box">Hide</button>-->

                {!! Html::linkRoute('posts.edit', 'Edit', array($post->slug), array('class' => 'btn btn-primary')) !!}

                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete'] ) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}

                <a href="{{route('posts.index')}}" class="btn btn-default">All Posts</a>
            </div>
        </div>
    </div>
</div>
<!--title-->
<div class="row">
    <div class="col"><h1>{{$post->title}}</h1></div>
</div>
<!--main content-->
<div class="row" id="main-content">
    <!--left side-->
    <div class="col">  
        <!--img-->
        <img src="{{ asset($post->image->path) }}" alt="">
        <hr>
        <!--info-->
        <ul>
            <li><strong>Released: </strong>{{ $post->released }}</li>
            <li><strong>Genre: </strong>{{ $post->genre }}</li>
            @if($post->mastered_by)
            <li><strong>Mastering: </strong>{{ $post->mastered_by }}</li>
            @endif
        </ul>
        <!--description-->
        @if($post->description)
        <hr>
        <p class="lead">{{$post->description}}</p>
        @endif
    </div>
    <!--right side-->
    <div class="col">
        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/{{$post->soundcloud_id}}&amp;color=040404&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        <!--downloads-->
        @if($post->wav || $post->mp3)
        <hr>
        <h2>Download</h2>
        @endif
        @if($post->wav)
        <a href="{{ asset('storage/zips/' . $post->wav) }}">
            <button class="btn btn-primary">WAV</button>
        </a>
        @endif
        @if($post->mp3)
        <a href="{{ asset('storage/zips/' . $post->mp3) }}">
            <button class="btn btn-primary">MP3</button>     
        </a>
        @endif
        
    </div>
</div>

<hr class="mb-5 mt-5">

@include('partials._newsletter')

@endsection