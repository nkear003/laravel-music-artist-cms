<div class="row" id="main-content">
    <!--left side-->
    <div class="col">  
        <!--img-->
        <img src="{{ asset($release->path) }}" alt="{{ $release->image }}">
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
        @if($release->description)
        <hr>
        <p class="lead">{{$release->description}}</p>
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
        @if($release->wav)
        <a href="{{ asset('storage/zips/' . $release->wav) }}">
            <button class="btn btn-primary">WAV</button>
        </a>
        @endif
        @if($release->mp3)
        <a href="{{ asset('storage/zips/' . $release->mp3) }}">
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