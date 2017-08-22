@extends('main')

@section('title', ' | Images')

@section('content')

<!--title-->
<div class="row mb-1">
    <div class="col">
        <h1>All images</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('files.create') }}">
            <button class="btn btn-primary">Upload Image</button>
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
                <th>Category</th>
                <th>Created</th>
                <th></th>
            </thead>
            
            <tbody>
                @foreach($posts as $post)
                
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td><a href="{{route('files.show', $post->id)}}">{{$post->title}}</a></td>
                        <td><img src="{{asset($post->path_to_image)}}" class="img-thumbnail img-fluid thumb"></td>
                        <td>{{$post->category->name}}</td>
                        <td>{{date('M j, Y', strtotime($post->created_at))}}</td>
                        <td>
                            <div class="btn-group-vertical btn-group-sm">
                                <a href="{{route('files.show', $post->slug)}}" class="btn btn-primary">View</a>
                                <a href="{{route('files.edit', $post->slug)}}" class="btn btn-success">Edit</a>
                                
                                {!! Form::open(['route' => ['files.destroy', $post->id], 'method' 
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