@extends('admin.layouts.app')
@section('content')
<section>
    <div class="card-body">
        <h3 class="card-title">Blogs</h3>
        <div class="table-responsive">
            <a href="/admin/blog/add" class="btn btn-primary">
                Add Blogs
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">Content</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $vl )
                    <tr>
                        <th scope="row">{{ $vl -> id }}</th>
                        <td>{{ $vl -> title }}</td>
                        <td>
                            <img src="{{ asset('admin/assets/images/blogs/' . $vl->image) }}" width="100" />
                        </td>
                        <td>{{ $vl -> description }}</td>
                        <td>{{ $vl -> content }}</td>
                        <td>
                            <a href="/admin/blog/edit/{{ $vl->id }}">Edit</a>
                            |
                            <a href="/admin/blog/delete/{{ $vl->id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection