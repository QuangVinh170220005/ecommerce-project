@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h2>Quản lý người dùng</h2>
            <p>Quản lý tài khoản Admin và Member trong hệ thống.</p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><i class="fa fa-users"></i> Danh sách Admin</h4>
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Quyền</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    @if ($user->level == 1)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <img src="{{ asset('admin/assets/images/users/' . $user->avatar) }}" alt="">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td><span class="label label-danger">Admin</span></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-6">
                    <h4><i class="fa fa-user"></i> Danh sách Member</h4>
                </div>
            </div>
        </div>
        <div class="panel-body table-responsive">
            <table class="table table-bordered table-hover" id="memberTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Quyền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if ($user->level == 0)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <img src="{{ asset('admin/assets/images/users/' . $user->avatar) }}" width="100px" height="100px" alt="">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->address }}</td>
                        <td><span class="label label-success">Member</span></td>
                        <td>
                            <a href="/admin/user/edit/{{ $user -> id }}" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Sửa
                            </a>
                            <button type="button" class="btn btn-dark btn-xs btn-delete" data-id="{{ $user->id }}">
                                <i class="fa fa-trash"></i> Xóa
                            </button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            Danh sách tài khoản Member
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-delete', function() {
            let button = $(this);
            let id = button.data('id');

            if (confirm('Bạn có chắc chắn muốn xóa tài khoản này không?')) {
                $.ajax({
                    url: '/admin/user/delete',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        button.closest('tr').remove();
                    }
                });
            }
        });
    });
</script>
@endsection