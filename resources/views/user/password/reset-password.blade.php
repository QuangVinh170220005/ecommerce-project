@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="login-form">
                <h2>Đặt lại mật khẩu</h2>

                <p>Vui lòng nhập mật khẩu mới của bạn.</p>

                <form method="post" action="/shop/reset-password/{{ $user -> id }}">
                    @csrf
                    <input type="password" name="password" placeholder="Mật khẩu mới" required>

                    <input type="password" name="password_confirmation" placeholder="Xác nhận mật khẩu mới" required >

                    <button type="submit" class="btn btn-default">
                        Đổi mật khẩu
                    </button>
                </form>
                <p>
                    <a href="/shop/login">Quay lại đăng nhập</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection