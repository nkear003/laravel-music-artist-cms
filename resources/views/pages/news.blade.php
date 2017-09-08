@extends('main')


@section('content')

<div class="row">
    @for($i = 0; $i < count($files) - 1; $i+=3)
    <hr>
    <div class="col">
      <img src="{{asset($files[$i]->path)}}"
        class="{{ $files[$i]->category_id == 3 ? 'rounded-circle' : ''}} mb-3">
      <img src="{{asset($files[$i+1]->path)}}"
        class="{{ $files[$i+1]->category_id == 3 ? 'rounded-circle' : ''}} mb-3">
      <img src="{{asset($files[$i+2]->path)}}"
        class="{{ $files[$i+2]->category_id == 3 ? 'rounded-circle' : ''}} mb-3">
    </div>
    @endfor
</div>

@endsection
