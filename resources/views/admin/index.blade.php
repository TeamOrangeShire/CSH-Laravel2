
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'CSH - Dashboard'])
	</head>

	<body>
		@include('admin.components.qrScanner') 
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'dashboard'])

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
										<i class="icon-house_siding lh-1"></i>
										<a href="index.html" class="text-decoration-none">Home</a>
									</li>
									<li class="breadcrumb-item text-light">Dashboard</li>
								</ol>
								<!-- Breadcrumb end -->
							</div>
						</div>
						<!-- Row end -->

						<div class="row gx-2">
							<div class="col-xl-6 col-12">
								<!-- Row start -->
								<div class="row gx-2">
									<div class="col-12">
										<div class="card mb-2">
											<div class="card-header">
												<h5 class="card-title">Tickets</h5>
											</div>
											<div class="card-body">
												<div id="ticketsData"></div>
											</div>
										</div>
									</div>
									
								</div>
								<!-- Row end -->
							</div>
							<div class="col-xl-6 col-12">
								<div class="row gx-2">
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape1.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-book-open"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">27</h3>
												<h6 class="m-0 fw-light text-light">Active</h6>
											</div>
										</div>
									</div>
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape2.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-check-circle"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">18</h3>
												<h6 class="m-0 fw-light text-light">Solved</h6>
											</div>
										</div>
									</div>
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape3.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-x-circle"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">12</h3>
												<h6 class="m-0 fw-light text-light">Closed</h6>
											</div>
										</div>
									</div>
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape4.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-add_task"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">3</h3>
												<h6 class="m-0 fw-light text-light">Open</h6>
											</div>
										</div>
									</div>
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape5.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-alert-triangle"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">5</h3>
												<h6 class="m-0 fw-light text-light">Critical</h6>
											</div>
										</div>
									</div>
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape6.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-access_time"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">7</h3>
												<h6 class="m-0 fw-light text-light">High</h6>
											</div>
										</div>
									</div>
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape6.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-access_time"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">7</h3>
												<h6 class="m-0 fw-light text-light">High</h6>
											</div>
										</div>
									</div>
									<div class="col-sm-4 col-6">
										<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
											<div class="position-relative shape-block">
												<img src="assets/images/shape6.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
												<i class="icon-access_time"></i>
											</div>
											<div class="ms-2">
												<h3 class="m-0 fw-semibold">7</h3>
												<h6 class="m-0 fw-light text-light">High</h6>
											</div>
										</div>
									</div>
							
								</div>
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