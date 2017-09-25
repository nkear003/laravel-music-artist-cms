@extends('main')

@section('title', ' | releases')

@section('content')

<!--title-->
<div class="row mb-1">
    <div class="col">
        <h1>All releases</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="{{ route('releases.create') }}">
            <button class="btn btn-primary">New Release</button>
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
                @foreach($releases as $release)
                
                    <tr>
                        <th scope="row">{{$release->id}}</th>
                        <td><a href="{{route('releases.show', $release->slug)}}">{{$release->title}}</a></td>
                        <td><img src="{{asset($release->image->path)}}" class="img-thumbnail img-fluid thumb"></td>
                        <td>
                            {{substr($release->description, 0, 50)}}
                            {{ (strlen($release->description) > 50 ? "..." : "") }}
                        </td>
                        <td>{{date('M j, Y', strtotime($release->released))}}</td>
                        <td>{{$release->slug}}</td>
                        <td>{{$release->category->name}}</td>
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
</div> <!--end releases <row></row>-->

@endsection