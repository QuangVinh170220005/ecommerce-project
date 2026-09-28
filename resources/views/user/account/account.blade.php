@extends('user.layouts.app')
@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Account</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->


						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">account</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">My product</a></h4>
							</div>
						</div>

					</div><!--/category-products-->


				</div>
			</div>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Update user</h2>
					<div class="signup-form"><!--sign up form-->
						<h2>Update User</h2>
						<form class="form-horizontal form-material" method="post" action="/shop/account/update" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label class="col-md-12">Avatar</label>
								<div class="col-md-12">
									<input type="file" id="image" name="avatar" class="form-control form-control-line">
									<img id="preview" src="{{ asset('admin/assets/images/users/' . $user->avatar) }}" class="rounded-circle" width="150" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Full Name</label>
								<div class="col-md-12">
									<input type="text" value="{{ $user->name }}" name="name" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label for="example-email" class="col-md-12">Email</label>
								<div class="col-md-12">
									<input type="email" value="{{ $user->email }}" class="form-control form-control-line" name="email" id="example-email" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Password</label>
								<div class="col-md-12">
									<input type="password" name="password" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Phone</label>
								<div class="col-md-12">
									<input type="text" value="{{ $user->phone }}" name="phone" placeholder="123 456 7890" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Address</label>
								<div class="col-md-12">
									<textarea rows="5" class="form-control form-control-line" name="address">{{ $user -> address }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-12">Select Country</label>
								<div class="col-sm-12">
									<select class="form-control form-control-line" name="id_country">
										<option value="">-- Select Country --</option>
										@foreach ($country as $ctr)
										<option value="{{ $ctr->id }}" @selected($user->id_country == $ctr->id)>
											{{ $ctr->name }}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-success">Update Account</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	const image = document.getElementById('image');
	image.addEventListener('change', function(e){
		const file = e.target.files[0];
		if(file){
			const reader = new FileReader();
			reader.onload = function(e){
				document.getElementById('preview').src = e.target.result
			}
			reader.readAsDataURL(file);
		}
	})	
</script>
@endsection