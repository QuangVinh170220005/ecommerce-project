@extends('user.layouts.app')
@section('content')
<section id="cart_items">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('/user/images/product-details/'.$cart['image'][0])}}" width="100px" height="100px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cart['name'] }}</a></h4>
                            <p>Web ID:{{$cart['id']}}</p>
                        </td>
                        <td class="cart_price">
                            <p>${{$cart['price']}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart['qty'] }}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">${{ $cart['price']*$cart['qty'] }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" id="{{ $cart['id'] }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</section> <!--/#cart_items-->

<section id="do_action">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span class="subTotal"></span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
</section>
<script>
    function updateItem(item, check) {
        let tr = item.closest('tr');
        let getId = tr.querySelector('.cart_description p').textContent.trim();
        let id = getId.replace("Web ID:", "");
        let price = tr.querySelector('.cart_price').textContent.trim().replace("$", "");
        let totalPrice = tr.querySelector('.cart_total_price');
        let quantity = tr.querySelector('input');
        if (check) {
            quantity.value = Number(quantity.value) + 1;
        } else {
            if (Number(quantity.value) <= 1) {
                alert('không xóa product cuối');
                return;
            }
            quantity.value = Number(quantity.value) - 1;
        }

        setPrice = Number(quantity.value) * Number(price);
        totalPrice.textContent = '$' + setPrice;

        $.ajax({
            
            type: 'POST',
            url: '{{ url("/shop/cart/update-quantity") }}',
            data: {
                id: id,
                check: check,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function(res) {
                console.log(res);
            }
        })
    }

    function totalPrice() {
        let total = document.querySelector('.subTotal');
        let price = document.querySelectorAll('.cart_total_price');

        let sum = 0;

        price.forEach(function(item) {
            let value = item.textContent.trim().replace("$", "");
            sum += Number(value);
        });

        total.textContent = '$' + sum;
    }



    const cartUp = document.querySelectorAll('.cart_quantity_up').forEach(function(e) {
        e.addEventListener('click', function(up) {
            up.preventDefault()
            updateItem(this, true);
            totalPrice();
        })
    })

    const cartDown = document.querySelectorAll('.cart_quantity_down').forEach(function(e) {
        e.addEventListener('click', function(down) {
            down.preventDefault();
            updateItem(this, false);
            totalPrice();
        })
    })

  const deleteProduct = document.querySelectorAll('.cart_quantity_delete');
    deleteProduct.forEach(function(e){
        e.addEventListener('click', function(dl){
            let tr = this.closest('tr');
            let id = this.getAttribute('id');

            $.ajax({
                type: 'POST',
                url: '{{ url('/shop/cart/delete') }}',
                data: {
                    id: id,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(res){
                    console.log(res);
                    tr.remove();
                    totalPrice();
                }
            })
        })
  })
    totalPrice();
</script> 
@endsection