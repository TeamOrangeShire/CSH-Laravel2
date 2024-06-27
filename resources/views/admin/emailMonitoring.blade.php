<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.header', ['title' => 'CSH - Email Monitoring'])
</head>

<body>
    @include('admin.components.loading')
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- App container starts -->
        <div class="app-container">

            @include('admin.components.nav', ['active' => 'emailMonitoring'])

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
                                    <a href="{{ route('admin') }}" class="text-decoration-none">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item text-light">Email Monitoring</li>
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
                                        <div class="card-title">Email Monitoring</div>
                                       <div class="d-flex w-100 justify-content-end">
                                        <div class="m-0">
											<label class="form-label">Filter By Service Offer</label>
											<select class="form-select" onchange="Support.Filter('{{ route('loadSentEmail') }}', '{{ $user }}', this)" aria-label="serviceOffer">
												<option value="all" selected>All</option>
												<option value="IT Service">IT Service</option>
												<option value="BPO">BPO</option>
												<option value="Software">Software</option>
											</select>
										</div>
                                       </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
											<table id="emailMonitoring" class="table table-striped">
												<thead>
													<tr>
														<th>Company</th>
														<th>Contact Person</th>
														<th>Email</th>
														<th>Service Offer</th>
														<th>Date Sent</th>
														<th>Level</th>
                                                        <th>Status</th>
													</tr>
												</thead>
												<tbody>
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
     <script src="{{ asset('backend/emailMonitoring.js') }}"></script>
     <script>
        window.onload = ()=>{
            LoadAll("{{ route('loadSentEmail') }}?user_id={{ $user }}&filter=all");
        }
     </script>
</body>

</html>
