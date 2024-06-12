
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'CSH - Attendance'])
	</head>

	<body>
	
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'attendance'])

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
										<a href="index.html" class="text-decoration-none">Dashboard</a>
									</li>
									<li class="breadcrumb-item text-light">Attendance</li>
								</ol>
								<!-- Breadcrumb end -->
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gx-2">
							<div class="col-12">
								<div class="card mb-2">
									
								<!-- Card start -->
								<div class="card mb-2">
									<div class="card-header">
										<div class="card-title">Attendance History</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="basicExample" class="table table-striped">
												<thead>
													<tr>
														<th>Time In</th>
														<th>Time Out</th>
														<th>Total Hours</th>
														<th>Date</th>
														
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Tiger Nixon</td>
														<td>System Architect</td>
														<td>Edinburgh</td>
														<td>61</td>
													
													</tr>
													<tr>
														<td>Serge Baldwin</td>
														<td>Data Coordinator</td>
														<td>Singapore</td>
														<td>64</td>
														
													</tr>
													<tr>
														<td>Zenaida Frank</td>
														<td>Software Engineer</td>
														<td>New York</td>
														<td>63</td>
														
													</tr>
													<tr>
														<td>Zorita Serrano</td>
														<td>Software Engineer</td>
														<td>San Francisco</td>
														<td>56</td>
													
													</tr>
													<tr>
														<td>Jennifer Acosta</td>
														<td>Junior Javascript Developer</td>
														<td>Edinburgh</td>
														<td>43</td>
														
													</tr>
													<tr>
														<td>Cara Stevens</td>
														<td>Sales Assistant</td>
														<td>New York</td>
														<td>46</td>
														
													</tr>
													<tr>
														<td>Hermione Butler</td>
														<td>Regional Director</td>
														<td>London</td>
														<td>47</td>
														
													</tr>
													<tr>
														<td>Lael Greer</td>
														<td>Systems Administrator</td>
														<td>London</td>
														<td>21</td>
														
													</tr>
													<tr>
														<td>Jonas Alexander</td>
														<td>Developer</td>
														<td>San Francisco</td>
														<td>30</td>
														
													</tr>
													<tr>
														<td>Shad Decker</td>
														<td>Regional Director</td>
														<td>Edinburgh</td>
														<td>51</td>
														
													</tr>
													<tr>
														<td>Michael Bruce</td>
														<td>Javascript Developer</td>
														<td>Singapore</td>
														<td>29</td>
														
													</tr>
													<tr>
														<td>Donna Snider</td>
														<td>Customer Support</td>
														<td>New York</td>
														<td>27</td>
														
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- Card end -->

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