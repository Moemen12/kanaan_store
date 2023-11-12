@extends('../layout/app')

@section('content')
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form action="{{ route('login.store') }}" method="POST">
					@csrf
					@error('email')
					<p style="margin-bottom:5px;" class="alert alert-danger">{{ $message }}</p>
				   @enderror
					<input name="email" type="email" placeholder="Email Address" required=" " >
					<input name="password" type="password" placeholder="Password" required=" " >
					
					<input style="background:#fe9126" type="submit" value="Login">
				</form>
			</div>
		
		</div>
	</div>
<!-- //login -->
@endsection