@extends('main')

@section('title', ' | posts')

@section('content')

<!--title-->
<div class="row mb-1">
    <div class="col">
        <h1>All posts</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('posts.create') }}">
            <button class="btn btn-primary">New Post</button>
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
                <th>Description</th>
                <th>Released</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Created</th>
                <th></th>
            </thead>
            
            <tbody>
                @foreach($posts as $post)
                
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td><a href="{{route('posts.show', $post->slug)}}">{{$post->title}}</a></td>
                        <td><img src="{{asset($post->image->path_to_image)}}" class="img-thumbnail img-fluid thumb"></td>
                        <td>
                            {{substr($post->description, 0, 50)}}
                            {{ (strlen($post->description) > 50 ? "..." : "") }}
                        </td>
                        <td>{{date('M j, Y', strtotime($post->released))}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{date('M j, Y', strtotime($post->created_at))}}</td>
                        <td>
                            <div class="btn-group-vertical btn-group-sm">
                                <a href="{{route('posts.show', $post->slug)}}" class="btn btn-primary">View</a>
                                <a href="{{route('posts.edit', $post->slug)}}" class="btn btn-success">Edit</a>
                                
                                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' 
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
</div> <!--end posts <row></row>-->

@endsection