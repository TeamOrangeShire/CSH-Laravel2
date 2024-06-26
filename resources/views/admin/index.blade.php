
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'CSH - Dashboard'])
	</head>

	<body>
		@include('admin.components.qrScanner') 
		@include('admin.components.loading') 
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

						@php
							$status = App\Models\CshAttendance::where('user_id', $user)->where('att_status', 0)->first();
							$pipe = App\Models\CshPipeline::where('user_id', $user)->where('pl_active',1);
						@endphp
		<!-- Row start -->
		<div class="row gx-2">
			
			<div class="col-sm-4 col-12">
				<div class="card mb-2">
					<div class="card-img">
						<img id="statusPic" src="assets/images/products/{{ $status ? 'product2.jpg' : 'product9.jpg' }}" background-size:="" cover;=""
							class="card-img-top img-fluid" alt="Admin" />
					</div>
					<div class="card-header">
						<h5 class="card-title">Status: <span id="genStatus" class="badge fs-5 rounded-pill {{ $status ? 'bg-success' : 'bg-danger' }}">{{ $status ? 'Active' : 'Inactive' }}</span></h5>
					</div>
					<div class="card-body">
						<h5 class="badge fs-6 rounded-pill bg-info">
						 Time In: <span id="att_time_in">{{ $status ? $status->att_time_in : '--------' }}	</span> 
						</h5>
						<h5 class="badge fs-6 rounded-pill bg-info">Date: <span id="att_date">{{ $status ? $status->att_date : '--------' }}	</span></h5>
					</div>
				</div>
			</div>
			<div class="col-xl-8 col-12">
				<div class="row gx-2">
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape2.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-user"></i>
							</div>
							<div class="ms-2">
								@php
									$leads = $pipe->where('pl_status', 'Lead')->get()->count();
								@endphp
								<h3 class="m-0 fw-semibold">{{ $leads }}</h3>
								<h6 class="m-0 fw-light text-light">Leads</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape3.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-user-check"></i>
							</div>
							<div class="ms-2">
								@php
									$prospect = $pipe->where('pl_status', 'Prospect')->get()->count();
								@endphp
								<h3 class="m-0 fw-semibold">{{ $prospect }}</h3>
								<h6 class="m-0 fw-light text-light">Prospect</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape4.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-insert_comment"></i>
							</div>
							<div class="ms-2">
								@php
									$discussion = $pipe->where('pl_status', 'Discussion')->get()->count();
								@endphp
								<h3 class="m-0 fw-semibold">{{ $discussion }}</h3>
								<h6 class="m-0 fw-light text-light">Discussion</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape4.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-event_note"></i>
							</div>
							<div class="ms-2">
								@php
								$proposal = $pipe->where('pl_status', 'Proposal')->get()->count();
							   @endphp
							<h3 class="m-0 fw-semibold">{{ $proposal }}</h3>
								<h6 class="m-0 fw-light text-light">Proposal</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape5.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-voice_chat"></i>
							</div>
							<div class="ms-2">
								@php
								$negotiation = $pipe->where('pl_status', 'Negotiation')->get()->count();
							   @endphp
							<h3 class="m-0 fw-semibold">{{ $negotiation }}</h3>
								<h6 class="m-0 fw-light text-light">Negotiations</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape5.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-drafts"></i>
							</div>
							<div class="ms-2">
								@php
								$contract = $pipe->where('pl_status', 'Contract')->get()->count();
							   @endphp
							    <h3 class="m-0 fw-semibold">{{ $contract }}</h3>
								<h6 class="m-0 fw-light text-light">Contract</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape3.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-check-circle"></i>
							</div>
							<div class="ms-2">
								@php
								$won = $pipe->where('pl_status', 'Won')->get()->count();
							   @endphp
							    <h3 class="m-0 fw-semibold">{{ $won }}</h3>
								<h6 class="m-0 fw-light text-light">Won</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape1.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-x-circle"></i>
							</div>
							<div class="ms-2">
								@php
								$lost = $pipe->where('pl_status', 'Lost')->get()->count();
							   @endphp
							    <h3 class="m-0 fw-semibold">{{ $lost }}</h3>
								<h6 class="m-0 fw-light text-light">Lost</h6>
							</div>
						</div>
					</div>
					<div class="col-sm-4 col-6">
						<div class="card px-3 py-2 mb-2 d-flex flex-row align-items-center">
							<div class="position-relative shape-block">
								<img src="assets/images/shape1.png" class="img-fluid img-4x" alt="Bootstrap Themes" />
								<i class="icon-slash"></i>
							</div>
							<div class="ms-2">
								@php
								$dnc = $pipe->where('pl_status', 'DNC')->get()->count();
							   @endphp
							    <h3 class="m-0 fw-semibold">{{ $dnc }}</h3>
								<h6 class="m-0 fw-light text-light">DNC</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

						<div class="row gx-2">
							
							<div class="col-xl-12 col-12">
								<!-- Row start -->
								<div class="row gx-2">
									
									<div class="col-12">
										<div class="card mb-2">
											<div class="card-header">
												<h5 class="card-title">Visualization</h5>
											</div>
											<div class="card-body">
												<div id="pipelineGraph"></div>
											</div>
										</div>
									</div>
									
								</div>
								<!-- Row end -->
							</div>
							
						</div>
						<!-- Row end -->
						

						<script>
							window.onload = () => {
								VisualGraph(
									[
										'Lead',
										'Prospect',
										'Discussion',
										'Proposal',
										'Negotiation',
										'Contract',
										'Won', 
										'Lost',
										'DNC'
									], 
									[
										'{{ $leads }}',
										'{{ $prospect }}',
										'{{ $discussion }}',
										'{{ $proposal }}',
										'{{ $negotiation }}',
										'{{ $contract }}',
										'{{ $won }}',
										'{{ $lost }}',
										'{{ $dnc }}'
									]
								);
							}
						</script>

				
					</div>
					<!-- Container ends -->

				</div>
				<!-- App body ends -->

			</div>
			<!-- App container ends -->

		</div>
		<!-- Page wrapper end -->

		@include('admin.components.scripts')
		<script src="{{ asset('backend/attendance.js') }}"></script>
	</body>

</html>