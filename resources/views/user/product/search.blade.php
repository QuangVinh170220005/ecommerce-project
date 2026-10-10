@extends('user.layouts.app')

@section('content')
    <div class="features_items">
        <h2 class="title text-center">Kết quả tìm kiếm cho: "{{ $key }}"</h2>

        @if ($products->count() > 0)
            @foreach ($products as $data)
                @php
                    $image = json_decode($data->image, true);
                @endphp
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('/user/images/product-details/' . $image[0]) }}" alt="" />
                                <h2>${{ $data->price }}</h2>
                                <a class="product-name" href="{{ url('/shop/product/detail/' . $data->id) }}">
                                    {{ $data->name }}
                                </a>
                                <a class="btn btn-default add-to-cart" data-id="{{ $data->id }}">
                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                </a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>${{ $data->price }} </h2>
                                    <a class="product-name" href="{{ url('/shop/product/detail/' . $data->id) }}">
                                        {{ $data->name }}
                                    </a>
                                    <a class="btn btn-default add-to-cart" data-id="{{ $data->id }}">
                                        <i class="fa fa-shopping-cart"></i>Add to cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-sm-12 text-center" style="margin: 50px 0;">
                <p style="font-size: 18px; color: #666;">Không tìm thấy sản phẩm nào phù hợp với từ khóa "<strong>{{ $keyword }}</strong>".</p>
            </div>
        @endif
    </div>
@endsection
