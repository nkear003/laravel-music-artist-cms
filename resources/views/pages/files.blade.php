@extends('main')


@section('title', ' | Files')


@section('content')

<!--title-->
<div class="row mb-1 col">
    <div class="col">
        <h1>Files</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a href="http://">
            <button class="btn btn-primary">
                Upload File
            </button>
        </a>
    </div>
</div>

<!--table-->
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Size</th>
                <th>Path</th>
            </thead>
            
            <tbody>
                @foreach($files as $file)
                    <tr>
                        <th scope="row">{{$file->id}}</th>
                        <th>{{$file->name}}</th>
                        <th>{{$file->size}}</th>
                        <th>{{$file->path}}</th>
                    </tr>
                @endforeach    
            </tbody>
            
        </table>
    </div>
</div>

@endsection