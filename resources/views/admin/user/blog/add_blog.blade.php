@extends('admin.layouts.app')
@section('content')
<div class="card card-body">
    <h4 class="card-title">Add Blog</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="form-horizontal m-t-30" action="/admin/blog/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" value="" name="title">
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" id="image" value="" name="image">
            <img id="preview" src="" alt="" width="100">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" value="" name="description">
        </div>
        <div class="form-group">
            <label>Text area</label>
            <textarea class="form-control" rows="5" id="editor" name="content"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Add Blog
            </button>
        </div>
    </form>
</div>
<script>
    let image = document.getElementById('image');
    image.addEventListener('change', function(e){
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                document.getElementById('preview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    })
</script>
@endsection