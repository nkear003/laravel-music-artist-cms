@extends('main')

@section('title', ' | Posts')

@section('content')

<!--title-->
<div class="row mb-1">
    <div class="col">
        <h1>All posts</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('posts.create') }}">
            <button href="{{ route('posts.create') }}" class="btn btn-primary">New Post</button>
        </a>
    </div>
</div>

<!--table-->
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Body</th>
                <th>Slug</th>
                <th>Created</th>
                <th>Playlist ID</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$release->id}}</th>
                    <td><a href="{{route('releases.show', $release->slug)}}">{{$release->title}}</a></td>
                    <td><img src="{{asset('storage/images/' . $release->image)}}" class="img-thumbnail img-fluid thumb"></td>
                    <td>
                        {{substr($release->description, 0, 50)}}
                        {{ (strlen($release->description) > 50 ? "..." : "") }}
                    </td>
                    <td>{{date('M j, Y', strtotime($release->released))}}</td>
                    <td>{{$release->genre}}</td>
                    <td>{{$release->slug}}</td>
                    <td>{{date('M j, Y', strtotime($release->created_at))}}</td>
                    <td>
                        <div class="btn-group-vertical btn-group-sm">
                            <a href="{{route('releases.show', $release->slug)}}" class="btn btn-primary">View</a>
                            <a href="{{route('releases.edit', $release->slug)}}" class="btn btn-success">Edit</a>

                            {!! Form::open(['route' => ['releases.destroy', $release->id], 'method' 
                            => 'DELETE' ]) !!}

                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger btn-block']) !!}

                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection