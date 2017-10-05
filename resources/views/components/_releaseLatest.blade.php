<div id="release">
    <div class="row">
        <div class="col">
            <div class="overlay">
                <a href="{{route('releases.show', $release->slug)}}">
                    <img class="img-fluid bg-load" src="{{asset($release->image->path)}}" alt={{$release->title}}>
                </a>
                <div class="overlay-content">
                    <h3 class="text-white text-center align-middle">{{$release->title}}</h3>
                </div>
            </div>
        </div>
        <div class="col">
            @include('components._soundcloud')
        </div>
    </div>
</div>
