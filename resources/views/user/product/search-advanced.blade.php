@extends('user.layouts.app')

@section('content')

<div class="advanced-search" style="margin-bottom: 30px; padding: 25px; background: #fff; border: 1px solid #e5e5e5; border-radius: 5px;">
    <h2 style="margin-top: 0; margin-bottom: 25px; font-size: 22px; text-align: center;">
        Advanced Search
    </h2>

    <form class="searchAdvanced">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="search_name">Product Name</label>
                    <input type="text" id="search_name" name="name" class="form-control" placeholder="Enter product name">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="search_price">Price Range</label>
                    <select id="search_price" name="price" class="form-control">
                        <option value="">-- Tất cả mức giá --</option>
                        <option value="0-200000">Under 200000</option>
                        <option value="200000">Over 200000</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="search_category">Category</label>
                    <select id="search_category" name="category" class="form-control">
                        <option  value="">-- Select category --</option>
                        @foreach ($category as $cate )
                        <option value="{{$cate['id']}}">{{ $cate['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="search_brand">Brand</label>
                    <select id="search_brand" name="brand" class="form-control">
                        <option value="">-- Tất cả thương hiệu --</option>
                        @foreach ($brand as $br )
                        <option value="{{$br['id']}}">{{ $br['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="search_status">Status</label>
                    <select id="search_status" name="status" class="form-control">
                        <option value="">-- Select status --</option>
                        <option value="1">Sale</option>
                        <option value="0">New</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-6" style="padding-top: 25px;">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-search"></i> Search
                </button>

                <button type="reset" class="btn btn-default">
                    <i class="fa fa-refresh"></i> Reset
                </button>
            </div>
        </div>
    </form>
</div>

<div class="features_items">
</div>
<script>
    $(document).ready(function() {
        $('.searchAdvanced').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: "{{ url('/shop/search-advanced') }}",
                data: $('.searchAdvanced').serialize() + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
                success: function(res) {
                    const products = res.data.data;
                    console.log(products)
                    let html = `
                        <h2 class="title text-center">Features Items</h2>
                    `;
                    products.forEach(function (item) {
                        const image = JSON.parse(item.image);
                        html += `
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/user/images/product-details/${image[0]}">

                                            <h2>$${item.price}</h2>

                                            <a class="product-name" href="/shop/product/detail/${item.id}">
                                                ${item.name}
                                            </a>

                                            <a class="btn btn-default add-to-cart" data-id="${item.id}">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </a>
                                        </div>

                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$${item.price}</h2>

                                                <a class="product-name" href="/shop/product/detail/${item.id}">
                                                    ${item.name}
                                                </a>

                                                <a class="btn btn-default add-to-cart" data-id="${item.id}">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    $('.features_items').html(html);
                }
            });
        });
    });
</script>
@endsection