@extends('main')

@section('title', ' | Weekend Mixtapes')

@section('content')

<div class="row">
    @for($i = 0; $i < count($releases); $i++)
    <div class="col">
        <img class="img-fluid rounded-circle img-thumbnail" src="{{$releases[$i]->path}}" alt="">
    </div>
    @if($i == 2 || $i == 5)
</div>

<div class="row mt-3">
    @endif
    @endfor
</div>

@endsection
