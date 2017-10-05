<div id="release">
    <div class="row">
        {{-- <div class="col">
            <h2>Latest Release</h2>
        </div> --}}
    </div>
    <div class="row">
        <div class="col">
            <div class="overlay">
                <a href="{{route('releases.show', $release->slug)}}">
                    <img class="img-fluid bg-load" src="{{asset($release->image->path)}}" alt={{$release->title}}>
                </a>
                <div class="overlay-content">
                    Schlagen
                </div>
            </div>
        </div>
        <div class="col">
            @include('components._soundcloud')
        </div>
    </div>
</div>
