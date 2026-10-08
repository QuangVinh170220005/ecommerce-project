@extends('user.layouts.app')
@section('content')
<div class="blog-post-area">
					<h2 class="title text-center">Update user</h2>
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="/shop/account/store" method="post" enctype="multipart/form-data">
							@csrf

							<label for="name">Name</label>
							<input type="text" placeholder="Name" name="name" id="name" />

							<label for="price">Price</label>
							<input type="number" placeholder="Price" name="price" id="price" />

							<label for="id_category">Category</label>
							<select name="id_category" id="id_category">
								<option value="">Select Category</option>
								@foreach ($category as $ct)
								<option value="{{ $ct->id }}">{{ $ct->name }}</option>
								@endforeach
							</select>

							<label for="id_brand">Brand</label>
							<select name="id_brand" id="id_brand">
								<option value="">Select Brand</option>
								@foreach ($brand as $br)
								<option value="{{ $br->id }}">{{ $br->name }}</option>
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
							<input type="text" placeholder="Company" name="company" id="company" />

							<label for="files">Select files:</label>
							<input type="file" id="files" name="image[]" multiple><br><br>

							<label for="detail">Detail</label>
							<textarea name="detail" id="detail" placeholder="Nhập chi tiết sản phẩm"></textarea>

							<button type="submit" class="btn btn-default">Add Product</button>
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