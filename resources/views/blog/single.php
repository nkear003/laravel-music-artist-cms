<div class="row" id="main-content">
    <!--left side-->
    <div class="col">  
        <!--img-->
        <img src="{{ asset($release->path) }}" alt="{{ $release->image }}">
        <hr>
        <!--description-->
        @if($release->body)
        <hr>
        <p class="lead">{{$release->description}}</p>
        @endif
    </div>
</div>

<hr class="mb-5 mt-5">

@include('partials._newsletter')

@endsection

@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
@endsection