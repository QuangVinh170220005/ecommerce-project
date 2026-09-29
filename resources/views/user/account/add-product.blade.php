@extends('user.layouts.app')
@section('content')
    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Update user</h2>
						 <div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="#">
							<input type="text" placeholder="Name" name="name"/>
							<input type="number" placeholder="Price" name="price"/>
							<input type="text" name="category" id="">
							<input type="text" placeholder="Branch" name="branch"/>
							<input type="number" placeholder="Sale" name="sale"/>
							<input type="text" placeholder="Company" name="company"/>
							<input type="file" placeholder="Branch" name="image"/>

							
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection