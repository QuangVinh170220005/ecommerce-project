@extends('user.layouts.app')

@section('content')

<section id="form">

    <div class="col-sm-4 col-sm-offset-4">

        <div class="login-form">

            <h2>Login to your account</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="post" action="/shop/handleLogin">
                @csrf
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                <input type="password" name="password" placeholder="Password">
                <span>
                    <input type="checkbox" name="remember_me" class="checkbox">
                    Keep me signed in
                </span>
                <button type="submit" class="btn btn-default">
                    Login
                </button>
            </form>
            <div style="margin-top: 20px; text-align: center;">

                <p>Or login with</p>

                <a href="/auth/google"
                   class="btn btn-default"
                   style=" display: block; width: 100%; padding: 10px;border: 1px solid #ddd;
                       border-radius: 4px;
                       background: #fff;
                       color: #333;
                       text-decoration: none;
                   ">

                    <img
                        src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                        alt="Google"
                        width="20"
                        height="20"
                        style="vertical-align: middle; margin-right: 8px;"
                    >
                    Login with Google
                </a>
            </div>
            <p style="margin-top: 15px;">
                <a href="/shop/forgot-password">Forgot password?</a>
            </p>
            <p style="margin-top: 15px;">
                Don't have an account?
                <a href="/shop/register">Register now</a>
            </p>

        </div>

    </div>
</section>

@endsection