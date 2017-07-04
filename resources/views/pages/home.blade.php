@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col">
        @yield('post_thumbnail')
    </div>
    <div class="col">
        <img src="{{URL::asset('images/strange2.png')}}" alt="Strange Matter Poster">
    </div>
</div>

@stop