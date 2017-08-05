@extends('main')

@section('title', ' | News')

@section('content')

<div class="row">
    <div class="col">
        {{ Html::image('images/ss.jpg') }}
        <h6>Title Goes Here</h6>
    </div>
    <div class="col">
        <h3>Title Goes Here</h3>
        {{ Html::image('images/dr.png') }}
    </div>
    <div class="col">
        <h3>Title Goes Here</h3>
        {{ Html::image('images/2011.png') }}
    </div>
</div>

@endsection