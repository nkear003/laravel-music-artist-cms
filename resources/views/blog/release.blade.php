<div class="row" id="main-content">
    <!--left side-->
    <div class="col">  
        <!--img-->
        <img src="{{ asset($post->path_to_image) }}" alt="{{ $post->image }}">
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

@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
@endsection