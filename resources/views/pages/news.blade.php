@extends('main')

@section('content')

<div id="main-content">

    @include('components._releaseLatest')

    <div id="divider">
        <div class="col">
            <hr>
        </div>
        <div class="col">
            <div>
                <h2>Live</h2>
            </div>
        </div>
        <div class="col">
            <hr>
        </div>
    </div>
    <div id="live">

    </div>


</div>

@endsection
