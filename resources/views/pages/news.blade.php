@extends('main')


@section('content')

<div class="row">
    <div class="col">
        <img src="{{asset($wm)}}" class="rounded-circle mb-3">
        <img src="{{asset($poster)}}" class="mb-3">
    </div>
    <div class="col">
        <img src="{{asset($wm2)}}" class="rounded-circle mb-3">
        <img src="{{asset($release)}}" class="mb-3">
        <img src="{{asset($wm3)}}" class="rounded-circle mb-3">
    </div>
    <div class="col">
        <img src="{{asset($release)}}" class="mb-3">
        <img src="{{asset($poster2)}}" class="mb-3">
    </div>
    <div class="col">
        <img src="{{asset($poster)}}" class="mb-3">
        <img src="{{asset($release2)}}" class="mb-3">
    </div>
</div>

@endsection
