@extends('user.layouts.app')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Step1</h2>
        </div>
        <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div>
        @if(Auth::check())
        <form method="post" action="/shop/checkout/order">
            @csrf

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter your full name" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter your email address" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Enter your phone number" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}" placeholder="Enter your shipping address" required>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-default">Place Order</button>
            </div>
        </form>
        @else
        <form method="post" action="/shop/checkout/register" enctype="multipart/form-data">
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
                    <input type="file" name="avatar" placeholder="Avatar">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <select name="id_country">
                        <option value="">-- Select Country --</option>

                        @foreach ($country as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-default">
                    Register
                </button>
            </div>

        </form>
        @endif

        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product )
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('/user/images/product-details/'.$product['image'][0])}}" width="100" height="100" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $product['name'] }}</a></h4>
                            <p>Web ID: {{ $product['id'] }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div>
    </div>
</section> <!--/#cart_items-->
@endsection