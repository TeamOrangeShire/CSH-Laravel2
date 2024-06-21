
<!DOCTYPE html>
<html lang="en">

	<head>
       @include('admin.components.header', ['title'=> 'Core Support Hub Login'])
	</head>

	<body class="bg-one">
		@include('admin.components.loading')
		<!-- Container start -->
		<div class="container">
			<div class="row justify-content-center ">
				<div class="col-xl-4 col-lg-5 col-sm-6 col-12">
					<form id="login" method="POST" class="my-5">
						@csrf
						<div class="card p-md-4 p-sm-4" style="backdrop-filter: blur(20px); padding: 4%">
							<div class="login-form">
								<a href="{{ route('adminLogin') }}" class="mb-4 d-flex justify-content-center">
									<img src="{{ asset('images/cs_icon2.png') }}" class="img-fluid login-logo" alt="CSH Logo" />
								</a>
								<h2 class="mt-4 mb-4 text-center">Core Support Hub Admin Access</h2>
								<div class="mb-3">
									<label class="form-label">Username</label>
									<input type="text" name="username" id="loginUsername" class="form-control" placeholder="Enter your username" />
									<small id="usernameE" style="display: none" class="text-danger">(Please provide a username)</small>
								</div>
								<div class="mb-3">
									<label class="form-label">Password</label>
									<div class="input-group">
										<input type="password" id="loginPassword"  name="password" class="form-control" placeholder="Enter password" />
										<button type="button" onclick="Support.ShowPass('loginPassword', this)" class="input-group-text">
											<i class="icon-eye"></i>
										</button>
									</div>
									<small id="passwordE" style="display: none" class="text-danger">(Please provide a Password)</small>
								</div>
								
								<div class="d-grid py-3 mt-3">
									<button onclick="Login('{{ route('login') }}', '{{ route('admin') }}')" type="button" class="btn btn-lg btn-success">
										LOGIN
									</button>
								</div>
								
								<div class="text-center pt-4">
									<span>Not registered?</span>
									<a href="{{ route('adminSignup') }}" class="text-success text-decoration-underline">
										SignUp</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Container end -->
        @include('admin.components.scripts')
		<script src="{{ asset('backend/authenticate.js') }}"></script>
	</body>

</html>