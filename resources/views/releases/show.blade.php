@extends('main')

@section('title') | {{$release->title}} @endsection

@section('content')
    
<!--edit buttons-->
<div class="row mb-3 d-flex justify-content-end">
    <div class="card">
        <div class="card-block">
            <div class="btn-group" id="edit_buttons_box">
                {!! Html::linkRoute('releases.edit', 'Edit', array($release->slug), array('class' => 'btn btn-primary')) !!}
                {!! Form::open(['route' => ['releases.destroy', $release->id], 'method' => 'delete'] ) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                <a href="{{route('releases.index')}}" class="btn btn-default">All Releases</a>
            </div>
        </div>
    </div>
</div>

<!--title-->
<div class="row">
    <div class="col"><h1>{{$release->title}}</h1></div>
</div>

<!--main content-->
<div class="row" id="main-content">
    <!--left side-->
    <div class="col">
        <!--img-->
        @if(!empty($release->image_id))<img src="{{ asset($release->image->path) }}" alt="">@endif
        <hr>
        <!--info-->
        <ul>
            <li><strong>Released: </strong>{{ $release->released }}</li>
            <li><strong>Genre: </strong>{{ $release->genre }}</li>
            @if($release->mastered_by)
            <li><strong>Mastering: </strong>{{ $release->mastered_by }}</li>
            @endif
        </ul>
        <!--description-->
        @if($release->body)
        <hr>
        <p class="lead">{{$release->body}}</p>
        @endif
    </div>
    <!--right side-->
    <div class="col">
        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/{{$release->soundcloud_id}}&amp;color=040404&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_rereleases=false"></iframe>
        <!--downloads-->
        @if($release->wav || $release->mp3)
        <hr>
        <h2>Download</h2>
        @endif
        @if($release->wav_id)
        <a href="{{ route('download', ['id' => $release->wav_id]) }}">
            <button class="btn btn-primary">WAV</button>
        </a>
        @endif
        @if($release->mp3_id)
        <a href="{{ route('download', ['id' => $release->mp3_id]) }}">
            <button class="btn btn-primary">MP3</button>
        </a>
        @endif

    </div>
</div>

<hr class="mb-5 mt-5">

@include('partials._newsletter')

@endsection
