@extends('frontend.layouts.app')

@section('content')

<section id="form">
    <div class="container">
        <div class="row">

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

                    <form method="POST" action="">

                        @csrf

                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">

                        <input type="password" name="password" placeholder="Password">

                        <span>
                            <input type="checkbox" name="remember" class="checkbox">
                            Keep me signed in
                        </span>

                        <button type="submit" class="btn btn-default">
                            Login
                        </button>

                    </form>

                    <p style="margin-top: 15px;">
                        Don't have an account?
                        <a href="">Register now</a>
                    </p>

                </div>

            </div>

        </div>
    </div>
</section>

@endsection