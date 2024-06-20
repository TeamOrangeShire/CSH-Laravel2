
<!DOCTYPE html>
<html lang="en">

	<head>
	    @include('admin.components.header', ['title' => 'Account'])
	</head>

	<body>

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
										<a href="index.html" class="text-decoration-none">Home</a>
									</li>
									<li class="breadcrumb-item">Pages</li>
									<li class="breadcrumb-item text-light">Account Settings</li>
								</ol>
								<!-- Breadcrumb end -->
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gx-2">
							<div class="col-xxl-12">
								<div class="card mb-2">
									<div class="card-body">
										<div class="custom-tabs-container">
											<ul class="nav nav-tabs" id="customTab2" role="tablist">
												<li class="nav-item" role="presentation">
													<a class="nav-link active" id="tab-oneA" data-bs-toggle="tab" href="#oneA" role="tab"
														aria-controls="oneA" aria-selected="true">General</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" id="tab-twoA" data-bs-toggle="tab" href="#twoA" role="tab"
														aria-controls="twoA" aria-selected="false">Settings</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" id="tab-threeA" data-bs-toggle="tab" href="#threeA" role="tab"
														aria-controls="threeA" aria-selected="false">Credit Cards</a>
												</li>
											</ul>
											<div class="tab-content h-350">
												<div class="tab-pane fade show active" id="oneA" role="tabpanel">
													<!-- Row start -->
													<div class="row gx-2">
														<div class="col-sm-4 col-12">
															<div id="update-profile" class="mb-3">
																<form action="/upload" class="dropzone sm needsclick dz-clickable"
																	id="update-profile-pic">
																	<div class="dz-message needsclick">
																		<button type="button" class="dz-button">
																			Update Image.
																		</button>
																	</div>
																</form>
															</div>
														</div>
														<div class="col-sm-8 col-12">
															<div class="row gx-2">
																<div class="col-6">
																	<!-- Form Field Start -->
																	<div class="mb-3">
																		<label for="fullName" class="form-label">Full Name</label>
																		<input type="text" class="form-control" id="fullName" placeholder="Full Name" />
																	</div>

																	<!-- Form Field Start -->
																	<div class="mb-3">
																		<label for="contactNumber" class="form-label">Contact</label>
																		<input type="text" class="form-control" id="contactNumber" placeholder="Contact" />
																	</div>
																</div>
																<div class="col-6">
																	<!-- Form Field Start -->
																	<div class="mb-3">
																		<label for="emailId" class="form-label">Email</label>
																		<input type="email" class="form-control" id="emailId" placeholder="Email ID" />
																	</div>

																	<!-- Form Field Start -->
																	<div class="mb-3">
																		<label for="birthDay" class="form-label">Birthday</label>
																		<div class="input-group">
																			<input type="text" class="form-control datepicker-opens-left" id="birthDay"
																				placeholder="DD/MM/YYYY" />
																			<span class="input-group-text">
																				<i class="icon-calendar"></i>
																			</span>
																		</div>
																	</div>
																</div>
																<div class="col-12">
																	<!-- Form Field Start -->
																	<div class="mb-3">
																		<label class="form-label">About</label>
																		<textarea class="form-control" rows="3"></textarea>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!-- Row end -->
												</div>
												<div class="tab-pane fade" id="twoA" role="tabpanel">
													<div class="card-body">
														<!-- Row start -->
														<div class="row gx-2">
															<div class="col-sm-6 col-12">
																<!-- Card start -->
																<div class="card mb-2">
																	<div class="card-body">
																		<ul class="list-group">
																			<li class="list-group-item d-flex justify-content-between align-items-center">
																				Show desktop notifications
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch"
																						id="switchOne" />
																				</div>
																			</li>
																			<li class="list-group-item d-flex justify-content-between align-items-center">
																				Show email notifications
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch" id="switchTwo"
																						checked />
																				</div>
																			</li>
																			<li class="list-group-item d-flex justify-content-between align-items-center">
																				Show chat notifications
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch"
																						id="switchThree" />
																				</div>
																			</li>
																		</ul>
																	</div>
																</div>
																<!-- Card end -->
															</div>
															<div class="col-sm-6 col-12">
																<!-- Card start -->
																<div class="card mb-2">
																	<div class="card-body">
																		<ul class="list-group">
																			<li class="list-group-item d-flex justify-content-between align-items-center">
																				Show purchase history
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch"
																						id="switchFour" />
																				</div>
																			</li>
																			<li class="list-group-item d-flex justify-content-between align-items-center">
																				Show orders
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch"
																						id="switchFive" />
																				</div>
																			</li>
																			<li class="list-group-item d-flex justify-content-between align-items-center">
																				Show alerts
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch"
																						id="switchSix" />
																				</div>
																			</li>
																		</ul>
																	</div>
																</div>
																<!-- Card end -->
															</div>
														</div>
														<!-- Row end -->
													</div>
												</div>
												<div class="tab-pane fade" id="threeA" role="tabpanel">
													<!-- Row start -->
													<div class="row">
														<div class="col-12">
															<div class="table-responsive">
																<table class="table align-middle m-0">
																	<thead>
																		<tr>
																			<th>Bank Name</th>
																			<th>Card Number</th>
																			<th>Card type</th>
																			<th>Expiry Date</th>
																			<th>Credit Balance</th>
																			<th>Actions</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>Bank of America</td>
																			<td>0000 0000 0000 0000</td>
																			<td>Visa</td>
																			<td>10/10/2025</td>
																			<td>$100000</td>
																			<td>
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch"
																						id="cardActive" />
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>Citi Group</td>
																			<td>0000 0000 0000 0000</td>
																			<td>Master</td>
																			<td>02/24/2028</td>
																			<td>$150000</td>
																			<td>
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch" id="cardActive2"
																						checked />
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>Capital One</td>
																			<td>0000 0000 0000 0000</td>
																			<td>Visa</td>
																			<td>05/05/2025</td>
																			<td>$50000</td>
																			<td>
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch" id="cardActive3"
																						checked />
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>Axix</td>
																			<td>0000 0000 0000 0000</td>
																			<td>Visa</td>
																			<td>08/20/2027</td>
																			<td>$100000</td>
																			<td>
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch" id="cardActive4"
																						checked />
																				</div>
																			</td>
																		</tr>
																		<tr>
																			<td>HDFC</td>
																			<td>0000 0000 0000 0000</td>
																			<td>Visa</td>
																			<td>05/08/2029</td>
																			<td>$90000</td>
																			<td>
																				<div class="form-check form-switch m-0">
																					<input class="form-check-input" type="checkbox" role="switch"
																						id="cardActive5" />
																				</div>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
													<!-- Row end -->
												</div>
											</div>
											<div class="d-flex gap-2 justify-content-end">
												<button type="button" class="btn btn-light">
													Cancel
												</button>
												<button type="button" class="btn btn-success">
													Update
												</button>
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