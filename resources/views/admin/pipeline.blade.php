
<!DOCTYPE html>
<html lang="en">

	<head>
	@include('admin.components.header',['title'=>'Pipeline'])
	</head>

	<body>

        @include('admin.components.loading')
		@include('admin.components.queueMail')
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'pipeline'])

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
										<a href="{{ route('admin') }}" class="text-decoration-none">Home</a>
									</li>
									<li class="breadcrumb-item">Pipeline</li>
									<li class="breadcrumb-item text-light">{{ $state }}</li>
								</ol>
								<!-- Breadcrumb end -->
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row">
							<div class="col-12">
								<div class="card mb-2">
									<div class="card-body">
                                        <div class="d-flex w-100 justify-content-between mb-4">
                                            <div class="card-title">Pipeline Module</div>
                                             <div class="d-flex gap-4">
                                                <button data-bs-toggle="modal" data-bs-target="#sendMail" class="btn btn-primary"><i class="icon-mail"></i> Send Mail</button>
                                                <button data-bs-toggle="modal" data-bs-target="#addCSVLeads" class="btn btn-primary"><i class="icon-file-text"></i> Add CSV/Excel</button>
                                                <button data-bs-toggle="modal" data-bs-target="#addLeads" class="btn btn-primary"><i class="icon-plus-circle"></i> Add Leads</button>
                                             </div>
                                        </div>
										<div class="table-responsive">
											<table id="pipeline" class="table table-bordered table-striped align-middle m-0">
												<thead>
													<tr>
                                                        <th>Company Name</th>
														<th>Contact Name</th>
														<th>Email</th>
														<th>Service Offer</th>
														<th>No. Employees</th>
														<th>Position</th>
														<th>Status</th>
														<th>Email Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
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
            @include('admin.components.pipelineModal', ['user'=>$user])
			<!-- App container ends -->
<form method="POST" id="disableForm">
    @csrf
    <input type="hidden" name="pl_id" id="disablePl_id">
</form>
		</div>
		<!-- Page wrapper end -->
    <input type="hidden" id="getTempSigRoute" value="{{ route('GetTempSig') }}">
	@include('admin.components.scripts')
    <script src="{{ asset('backend/pipeline.js') }}"></script>
    <script>
        window.onload = ()=>{
			Pipeline.LoadTempSig("{{ route('LoadTempSig') }}?user_id={{ $user }}&type=signature", "signature", "{{ route('DisableEmTempSig') }}");
			Pipeline.LoadTempSig("{{ route('LoadTempSig') }}?user_id={{ $user }}&type=template", "template", "{{ route('DisableEmTempSig') }}");
			Pipeline.LoadActiveSignature("{{ route('LoadActiveSignature') }}?user_id={{ $user }}");
			LoadLeadMassEmail("{{ route('massEmailLeads') }}?user_id={{ $user }}&filter=all");
            LoadLead("{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}", "{{ route('getLeadDetails') }}", "{{ route('disableLead') }}");
        }
    </script>
	</body>

</html>