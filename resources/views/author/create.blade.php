@extends('layouts.master')

@section('content')
<div class="row">
    <div class="card">
    <div class="col-md-12">
        <h1>Create new post</h1>
        <form enctype='multipart/form-data' action="{{ route('author.create') }}" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="info">Info</label>
                <input type="text" class="form-control" id="info" name="info">
            </div>
            <div class="form-group">
                <label for="info">Price</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="form-group">      
                    <label for="Upload">Select image to upload</label><br>
                    <form action="{{ URL ::to('upload')}} method="post" enctype="multipart/form-data">
                    <input type="file" name="imagePath" id="imagePath" required>
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
            </div>
                    {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>
@endsection