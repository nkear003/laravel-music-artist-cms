@extends('main')


@section('content')

<!-- round 1 -->
<div class="row">
    <div class="col">
        <img src="{{asset($wm)}}" class="rounded-circle">
    </div>
    <div class="col">
        <img src="{{asset($release)}}">
    </div>
    <div class="col">
        <img src="{{asset($poster)}}">
    </div>
</div>

<!--round2-->
<div class="row">
    <div class="col">
        <img src="{{asset($release2)}}">
    </div>
    <div class="col">
        <img src="{{asset($wm2)}}" class="rounded-circle">
    </div>
    <div class="col">
        <img src="{{asset($poster2)}}">
    </div>
</div>

@endsection