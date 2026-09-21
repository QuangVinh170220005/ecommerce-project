@extends('frontend.layouts.app')

@section('content')

<section id="form">
    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-offset-2">

                <div class="signup-form">

                    <h2>New User Signup!</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="name" value="" placeholder="Full Name">
                            </div>

                            <div class="col-sm-6">
                                <input type="email" name="email" value="" placeholder="Email Address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="password" name="password" placeholder="Password">
                            </div>

                            <div class="col-sm-6">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="phone" value="" placeholder="Phone">
                            </div>

                            <div class="col-sm-6">
                                <input type="text" name="address" value="" placeholder="Address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <select name="id_country">
                                    <option value="">-- Select Country --</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <input type="file" name="avatar">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-default">
                                Signup
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</section>

@endsection