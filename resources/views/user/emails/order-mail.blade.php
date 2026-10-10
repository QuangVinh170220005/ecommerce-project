<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <H1>Xác nhận đơn hàng</H1>
    <form>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $data['data']['name'] }}"
                        placeholder="Enter your full name" required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ $data['data']['email'] }}" placeholder="Enter your email address" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $data['data']['phone'] }}"
                        placeholder="Enter your phone number" required>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="address">Shipping Address</label>
                    <input type="text" id="address" name="address" class="form-control"
                        value="{{ $data['data']['address'] }}" placeholder="Enter your shipping address" required>
                </div>
            </div>
        </div>
    </form>

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
                @foreach ($data['product'] as $product)
                    <tr>
                        <td class="cart_product">
                            <img
                                src="{{ $message->embed(public_path('/user/images/product-details/' . $product['image'][0])) }}">
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
</body>

</html>