@extends('main')

@section('title', ' | Images')

@section('content')

<!--title-->
<div class="row mb-1">
    <div class="col">
        <h1>All Files</h1>
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
                <th>Preview</th>
                <th>Category</th>
                <th>Created</th>
                <th></th>
            </thead>
            
            <tbody>
                @foreach($files as $file)
                
                    <tr>
                        <th scope="row">{{$file->id}}</th>
                        <!--title-->
                        <td>{{$file->title}}</td>
                        <!--img-->
                        <td><img src="{{asset($file->path)}}" class="img-thumbnail img-fluid thumb"></td>
                        <!--category-->
                        <td>{{$file->category->name}}</td>
                        <!--created at-->
                        <td>{{date('M j, Y', strtotime($file->created_at))}}</td>
                        <td>
                            <div class="btn-group-vertical btn-group-sm">
                                
                                {!! Form::open(['route' => ['files.destroy', $file->id], 'method' 
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