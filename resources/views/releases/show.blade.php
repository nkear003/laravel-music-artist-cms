@extends('main')

@section('title') | {{$release->title}} @endsection


@section('content')

<div class="row title">
    <div class="col"><h1>{{$release->title}}</h1></div>
</div>

<div class="row main-content">
    <div class="col">        
        <img src="{{ asset('storage/images/' . $release->image) }}" alt="{{ $release->image }}">
        <hr>
        <ul>
            <li><strong>Released: {{ $release->released }}</strong></li>
            <li><strong>Genre: {{ $release->genre }} </strong></li>
            <li><strong>Mastering: </strong></li>
        </ul>
        <hr>
        <h2>Download</h2>
        <button class="btn btn-primary">MP3</button>    
        <button class="btn btn-primary">WAV</button>
        
    </div>
    <div class="col">
        <?php $playlist = 263481094; ?>
        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/{{$playlist}}&amp;color=040404&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
    </div>
</div>
    <hr>
    <div class="row">
        <div class="col">
            <h2>Newsletter</h2>
            <hr>
        </div>
        <div class="col">
            <h2>Instragram</h2>
            <hr>
        </div>
    </div>


<p class="lead"> {{ $release->description }} </p>

@endsection