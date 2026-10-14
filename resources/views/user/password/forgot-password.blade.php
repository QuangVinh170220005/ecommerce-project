@extends('user.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="login-form">
                <h2>Quên mật khẩu</h2>
                <p>
                    Nhập email của bạn để nhận liên kết
                    đặt lại mật khẩu.
                </p>
                <form action="/shop/forgot-password" method="post">
                    @csrf
                    <input type="email" name="email" placeholder="Nhập email của bạn" required>

                    <button type="submit" class="btn btn-default">
                        Gửi mail
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