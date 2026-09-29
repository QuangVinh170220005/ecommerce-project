@extends('admin.layouts.app')
@section('content')
<section>
    <div class="card card-body">
        <h4 class="card-title">Add Brand</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form-horizontal m-t-30" action="/admin/brand/store" method="post">
            @csrf
            <div class="form-group">
                <label>Brand Name</label>
                <input type="text" class="form-control" value="" name="name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Add Brand
                </button>
            </div>
        </form>
    </div>
</section>
@endsection