@extends('admin.layouts.app')
@section('content')
<div class="card card-body">
    <h4 class="card-title">Edit Country</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-horizontal m-t-30" action="/admin/blog/update/{{ $data-> id }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" value="{{ $data -> title }}" name="title">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" id="image" value="" name="image">
            <img id="" src="{{ asset('admin/assets/images/blogs/' . $data->image) }}" alt="" width="100">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" value="{{ $data->description }}" name="description">
        </div>
        <div class="form-group">
            <label>Text area</label>
            <textarea class="form-control" name="content" rows="5" id="editor">{{ $data -> content }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Update Blogs
            </button>
        </div>
    </form>
</div>
@endsection