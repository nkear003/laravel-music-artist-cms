@extends('main')

@section('title') | {{$post->title}} @endsection


@section('content')

<!--edit buttons-->
<div class="btn-group btn-group-sm float-right" id="edit_buttons_box">
    <button type="button" class="btn btn-default" id="hide__edit_buttons_box">Hide</button>
    {!! Html::linkRoute('posts.edit', 'Edit', array($post->slug), array('class' => 'btn btn-primary')) !!}
    {!! Html::linkRoute('posts.destroy', 'Delete', array($post->slug), array('class' => 'btn btn-danger')) !!}
</div>

<!--title-->
<div class="row">
    <div class="col"><h1>{{$post->title}}</h1></div>
</div>

<!--content-->
<div class="row">
    <div class="col-5">
        <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->image }}" class="post-img">
    </div>
    <div class="col-7">
        <!--body-->
        <p class="lead"> {{ $post->body }} </p>
        <!--playlist-->
        @if($post->playlist)
        <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/{{$post->playlist}}&amp;color=040404&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        @endif
    </div>
</div>


<hr>
@include('partials._newsletter')

@section('scripts')
<script src="{{asset('js/script.js')}}"></script>
@endsection

@endsection