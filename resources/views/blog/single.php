<div class="row" id="main-content">
    <!--left side-->
    <div class="col">  
        <!--img-->
        <img src="{{ asset($post->path_to_image) }}" alt="{{ $post->image }}">
        <hr>
        <!--description-->
        @if($post->body)
        <hr>
        <p class="lead">{{$post->description}}</p>
        @endif
    </div>
</div>

<hr class="mb-5 mt-5">

@include('partials._newsletter')

@endsection

@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
@endsection