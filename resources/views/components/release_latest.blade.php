<div id="release">
    <div class="row">
        {{-- <div class="col">
            <h2>Latest Release</h2>
        </div> --}}
    </div>
    <div class="row">
        <div class="col bg-load">
            <a href="{{route('releases.show', $release->slug)}}">
                <img src="{{asset($release->image->path)}}" alt={{$release->title}}>
            </a>
        </div>
        <div class="col bg-load">
            @include('releases._soundcloud')
        </div>
    </div>
</div>
