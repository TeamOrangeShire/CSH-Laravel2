
<!DOCTYPE html>
<html lang="en">

	<head>
	@include('admin.components.header',['title'=>'Pipeline'])
	</head>

	<body>

        @include('admin.components.loading')

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
                                                <button data-bs-toggle="modal" data-bs-target="#addLeads" class="btn btn-primary"><i class="icon-mail"></i> Send Mail</button>
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
                <div class="modal fade" id="updateLead" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button style="filter: brightness(0) invert(1);" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <form id="updateLead" method="POST">
                                    @csrf
                                    <input type="hidden" name="pl_id" id="pl_id">
                                    <!-- Row start -->
                                    <div class="row gx-2">
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Company Name</label>
                                                <input type="text" name="companyName" id="upCompanyName" class="form-control" placeholder="Company Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Contact Name</label>
                                                <input type="text" name="name" id="upName" class="form-control" placeholder="Contact Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="upEmail" placeholder="Contact Email" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Service Offer</label>
                                                <select name="serviceOffer" id="upServiceOffer" class="form-select">
                                                    <option value="null" disabled selected> -------Select Service------- </option>
                                                    <option value="IT Service">IT Service</option>
                                                    <option value="BPO">BPO</option>
                                                    <option value="BPO-Back Office">BPO-Back Office</option>
                                                    <option value="Software">Software</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Contacts Position</label>
                                                <input name="position" type="text" id="upPosition" class="form-control" placeholder="Contacts Position" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">No. of Employees</label>
                                                <input type="text" name="employees" id="upEmployees" class="form-control" placeholder="No. of Employees" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select name="status" id="upStatus" class="form-select">
                                                    <option value="null" disabled selected> -------Select Status------- </option>
                                                    <option value="Lead">Lead</option>
                                                    <option value="Prospect">Prospect</option>
                                                    <option value="Discussion">Discussion</option>
                                                    <option value="Proposal">Proposal</option>
                                                    <option value="Negotiation">Negotiation</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Won">Won</option>
                                                    <option value="Lost">Lost</option>
                                                    <option value="DNC">DNC</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-4 col-12">
                                            <div class="mb-3">
                                                <label class="form-label">Email Status</label>
                                                <select name="emailStatus" id="upEmailStatus" class="form-select">
                                                    <option value="null"> ------Not Set------ </option>
                                                    <option value="Not Verified">Not Verified</option>
                                                    <option value="Verify">Verified</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                     
                                        <div class="col-sm-12 col-12 mt-4 mb-4">
                                            <div class="table-responsive">
                                                <table id="sentEmail" class="table table-bordered table-striped align-middle m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Email Level</th>
                                                            <th>Date Sent</th>
                                                            <th>Status</th>
                                                         
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex gap-2 justify-content-end">
                                                <button type="button" id="closeUpdatelead" data-bs-dismiss="modal" class="btn btn-outline-light">
                                                    Cancel
                                                </button>
                                                <button onclick="Pipeline.UpdateLead('{{ route('updateLead') }}', '{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}', '{{ route('getLeadDetails') }}')" type="button" class="btn btn-success">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </form>
                            </div>
                        </div>
                 
                    </div>
                </div>
            </div>

            
            <div class="modal fade" id="addLeads" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Leads</h5>
                        <button id="closeAddLead" style="filter: brightness(0) invert(1);" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form id="addLeadForm" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user }}">
                                <div class="row mb-3">
                                    <label for="companyNameAdd" class="col-sm-3 col-form-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="companyName" class="form-control" id="companyNameAdd" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nameAdd" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="nameAdd" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="emailAdd" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="emailAdd" />
                                    </div>
                                </div>
                          
                                <div class="w-100 d-flex justify-content-end">
                                    <button onclick="Pipeline.AddLead('{{ route('addLead') }}', '{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}', '{{ route('getLeadDetails') }}', '{{ route('disableLead') }}')" type="button" class="btn btn-success">
                                       Add
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
             
                </div>
            </div>
        </div>
				
        <div class="modal fade" id="addCSVLeads" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Leads Using CSV/Excel</h5>
                    <button id="closeAddLead" style="filter: brightness(0) invert(1);" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form id="scanCSVForm" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="companyNameAdd" class="col-sm-3 col-form-label">Company Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="companyName" class="form-control" placeholder="Match Column of your CSV/Excel" id="companyNameCSV" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nameAdd" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" placeholder="Match Column of your CSV/Excel" class="form-control" id="nameAddCSV" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="emailAdd" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" placeholder="Match Column of your CSV/Excel" class="form-control" id="emailAddCSV" />
                                </div>
                            </div>
                            <div class="mt-5 mb-4">
                                <label for="formFile" class="form-label">Upload you CSV/Excel file Here</label>
                                <input class="form-control" type="file" name="leadFile" id="formFile" />
                            </div>

                            <div class="modal-footer flex-column">
                                <button type="button" onclick="Pipeline.ReadCSV('{{ route('readCSV') }}')" class="btn btn-lg btn-primary w-100 mx-0 mb-2">
                                    Scan File
                                </button>
                                <button type="button" id="classAddCSV" class="btn btn-lg btn-secondary w-100 mx-0" data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
         
            </div>
        </div>
    </div>

    <div class="modal fade" id="saveCSVdata" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-4 text-center">
                <h5 class="text-primary">Scanning Done!</h5>
                <p class="mb-0">
                  We have found <span id="numOfRows"></span> of rows in the file do you want to save them all in your leads list?
                </p>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <button type="button" data-bs-toggle="modal" data-bs-target="#savingDataleads" onclick="Pipeline.SaveCSVData('{{route('addLead')}}', '{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}', '{{ route('getLeadDetails') }}', '{{ route('disableLead') }}')" class="btn text-primary fs-6 col-6 m-0 border-end">
                    <strong>Yes, Please</strong>
                </button>
                <button type="button" data-bs-toggle="modal" data-bs-target="#addCSVLeads" class="btn text-secondary fs-6 col-6 m-0" data-bs-dismiss="modal">
                    No thanks
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="savingDataleads" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-body p-4 text-center">
            <h5 class="text-primary">Leads are Saving!</h5>
           
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Please Wait.....(<span id="savedData"></span>/<span id="totalData"></span>)</span>
                        <span class="text-primary fw-bold"><span id="progressStatus"></span>%</span>
                    </div>
                    <div class="progress small">
                        <div class="progress-bar bg-success" id="progressBar" role="progressbar" style="width: 0%; transition: width 0.3s" 
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>
            </div>

            <div class="w-100 justify-content-center" style="display: none" id="doneButton">
                <button data-bs-dismiss="modal" class="btn btn-primary">Done!</button>
            </div>
        </div>
       
    </div>
</div>
</div>

			</div>
			<!-- App container ends -->
<form method="POST" id="disableForm">
    @csrf
    <input type="hidden" name="pl_id" id="disablePl_id">
</form>
		</div>
		<!-- Page wrapper end -->

	@include('admin.components.scripts')
    <script src="{{ asset('backend/pipeline.js') }}"></script>
    <script>
        window.onload = ()=>{
            LoadLead("{{ route('loadPipeline') }}?state={{ $state }}&user_id={{ $user }}", "{{ route('getLeadDetails') }}", "{{ route('disableLead') }}");
        }
    </script>
	</body>

</html>