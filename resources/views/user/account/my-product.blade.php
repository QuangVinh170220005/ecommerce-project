@extends('user.layouts.app')
@section('content')
<div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Id</td>
                                <td class="description">name</td>
                                <td class="image">Image</td>
                                <td class="price">price</td>
                                <td class="total">action</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $product)
                            @php
                                $images = json_decode($product['image'], true);
                            @endphp
                            <tr>
                                <td class="cart_description">
                                    <h4><a href="">{{ $product['id'] }}</a></h4>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $product['name'] }}</a></h4>
                                </td>
                                <td class="cart_product">
                                    <img src="{{ asset('user/images/product-details/' . $images[0]) }}" width="100px" alt="">
                                </td>
                                <td class="cart_price">
                                    <p>{{ $product['price'] }}</p>
                                </td>
                                <td class="cart_total">
                                    <a href="/shop/account/edit-product/{{ $product['id']}}">edit</a>
                                    <a href="/shop/account/delete-product/{{ $product['id']}}">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
@endsection