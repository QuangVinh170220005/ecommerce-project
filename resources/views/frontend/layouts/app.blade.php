<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('user/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('user/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('user/css/responsive.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('user/images/home/logo.png') }}">
</head>
<body>
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')

    
    <script src="{{ asset('user/js/jquery.js') }}"></script>
	<script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('user/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('user/js/price-range.js') }}"></script>
    <script src="{{ asset('user/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>
</body>
</html>