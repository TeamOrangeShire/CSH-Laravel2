
<!DOCTYPE html>
<html lang="en">

	<head>
	    @include('admin.components.header', ['title' => 'User Account'])
	</head>

	<body>
		@include('admin.components.loading')
		@include('admin.components.qrScanner', ['loc'=> 'user']) 
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

                @include('admin.components.nav', ['active' => 'none'])
				<!-- App body starts -->
				<div class="app-body">

					<!-- Container starts -->
					<div class="container">

						<!-- Row start -->
						<div class="row">
							<div class="col-12 col-xl-6">

								<!-- Breadcrumb start -->
								<ol class="breadcrumb mb-3">
									<li class="breadcrumb-item">
										<i class="icon-home lh-1"></i>
										<a href="{{ route('admin') }}" class="text-decoration-none">Dashboard</a>
									</li>
									<li class="breadcrumb-item text-light">Account Settings</li>
								</ol>
								<!-- Breadcrumb end -->
							</div>
						</div>
						<!-- Row end -->
                       @php
						   $account = App\Models\CshUser::where('user_id', $user)->first();
					   @endphp
						<!-- Row start -->
						<div class="row gx-2">
							<div class="col-sm-3">
								<!-- Card start -->
								<div class="card mb-2">
									<div class="card-body">
										<img src="{{ $account->user_pic === 'none' ? asset('assets/user/placeholder.webp') : asset('assets/user/'. $account->user_pic) }}" class="w-100  me-0 rounded-5" alt="Profile Pic" />
									</div>
								</div>
								<!-- Card end -->
							</div>
							<div class="col-sm-9">
								<!-- Card start -->
								<div class="card mb-2">
									<div class="card-body">
										<h1 class="mb-3">{{ $account->user_name }}</h1>
										<p class="text-muted">Employee ID: #{{ $account->user_emp_id }}</p>
										<p class="text-muted">Username: {{ $account->user_username }}</p>
										<p class="text-muted">Position: {{ $account->user_position }}</p>
									</div>
								</div>
								<!-- Card end -->
							</div>
						</div>
						<!-- Row end -->

					</div>
					<!-- Container ends -->

				</div>
				<!-- App body ends -->

			</div>
			<!-- App container ends -->

		</div>
		<!-- Page wrapper end -->

        @include('admin.components.scripts')
	</body>

</html>