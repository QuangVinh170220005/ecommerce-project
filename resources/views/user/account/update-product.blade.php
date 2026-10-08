@extends('user.layouts.app')
@section('content')
<div class="blog-post-area">
					<h2 class="title text-center">Update user</h2>
					<div class="signup-form"><!--sign up form-->
						<h2>Update Product</h2>
						@if ($errors->any())
						<div
							style="color: #721c24; background-color: #f8d7da; ">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						@if (session('error'))
						<div style="color: #721c24; background-color: #f8d7da; ">
							{{ session('error') }}
						</div>
						@endif

						<form action="/shop/account/update-product/{{ $data->id }}" method="post"
							enctype="multipart/form-data">
							@csrf
							<label for="name">Name</label>
							<input type="text" placeholder="Name" name="name" id="name" value="{{ $data->name }}" />

							<label for="price">Price</label>
							<input type="number" placeholder="Price" name="price" id="price"
								value="{{ $data->price }}" />

							<label for="id_category">Category</label>
							<select name="id_category" id="id_category">
								<option value="">Select Category</option>
								@foreach ($category as $ct)
								<option value="{{ $ct->id }}" @selected($data->id_category == $ct->id)>
									{{ $ct->name }}
								</option>
								@endforeach
							</select>
							<label for="id_brand">Brand</label>
							<select name="id_brand" id="id_brand">
								<option value="">Select Brand</option>
								@foreach ($brand as $br)
								<option value="{{ $br->id }}" @selected($data->id_brand == $br->id)>
									{{ $br->name }}
								</option>
								@endforeach
							</select>

							<label for="status">Status</label>
							<select name="status" id="status">
								<option value="0">New</option>
								<option value="1">Sale</option>
							</select>

							<div id="sale-box" style="display: none;">
								<label for="sale">Giá sale (%)</label>
								<input type="number" name="sale" id="sale" placeholder="Nhập giá sale">
							</div>

							<label for="company">Company</label>
							<input type="text" placeholder="Company" name="company" id="company"
								value="{{ $data->company }}" />

							<label for="files">Select files:</label>
							<input type="file" id="files" name="image[]" multiple><br>

							@php
							$images = json_decode($data->image, true);
							@endphp

							@foreach ($images as $img)
							<div style="display: flex;">
								<img src="{{ asset('user/images/product-details/' . $img) }}" width="80" height="80"
									alt="">
								<input type="checkbox" name="rmImage[]" width="100px" value="{{ $img }}">
							</div>
							@endforeach

							<label for="detail">Detail</label>
							<textarea name="detail" id="detail"
								placeholder="Nhập chi tiết sản phẩm">{{ $data->detail }}</textarea>

							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
				</div>
<script>
	let status = document.getElementById('status');
	let sale = document.getElementById('sale-box');

	status.addEventListener('change', function() {
		if (this.value == '1') {
			sale.style.display = 'block';
		} else {
			sale.style.display = 'none';
		}
	})
</script>
@endsection