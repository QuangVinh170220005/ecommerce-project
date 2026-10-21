@extends('admin.layouts.app')
@section('content')
<div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-horizontal form-material" method="post" action="/admin/user/update/{{ $user -> id }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-12">Avatar</label>
                    <div class="col-md-12">
                        <input type="file" name="avatar" class="form-control form-control-line">
                        <img src="{{ asset('admin/assets/images/users/' . $user->avatar) }}" class="rounded-circle" width="150" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label for="example-email" class="col-md-12">Email</label>
                    <div class="col-md-12">
                        <input type="email" value="{{ $user->email }}" class="form-control form-control-line" name="email" id="example-email" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Password</label>
                    <div class="col-md-12">
                        <input type="password" name="password" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Phone</label>
                    <div class="col-md-12">
                        <input type="text" value="{{ $user->phone }}" name="phone" placeholder="123 456 7890" class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Address</label>
                    <div class="col-md-12">
                        <input type="text" value="{{ $user->address }}" name="address" placeholder="Tam Xuân .." class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Select Country</label>
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="id_country">
                            <option value="">-- Select Country --</option>
                            @foreach ($country as $ctr)
                            <option value="{{ $ctr->id }}" @selected($user->id_country == $ctr->id)>
                                {{ $ctr->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection