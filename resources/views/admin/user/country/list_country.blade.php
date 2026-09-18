@extends('admin.layouts.app')
@section('content')
<section>
    <div class="card-body">
        <h3 class="card-title">Country</h3>
        <div class="table-responsive">
            <a href="/admin/country/add" class="btn btn-primary">
                Add Country
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $vl )
                    <tr>
                        <th scope="row">{{ $vl -> id }}</th>
                        <td>{{ $vl -> name }}</td>
                        <td>
                            <a href="/admin/country/delete/{{ $vl -> id }}">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection