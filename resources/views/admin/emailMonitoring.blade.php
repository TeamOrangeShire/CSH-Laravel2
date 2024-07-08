<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.header', ['title' => 'CSH - Email Monitoring'])
</head>

<body>
    @include('admin.components.loading')
    @include('admin.components.qrScanner', ['loc'=> 'emailMonitoring']) 
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
                                                <select class="form-select"
                                                    onchange="Support.Filter('{{ route('loadSentEmail') }}', '{{ $user }}', this)"
                                                    aria-label="serviceOffer">
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
    <div class="modal fade" id="viewMessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Message Preview
                    </h5>
                    <button type="button"  style="filter: brightness(0) invert(1);" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Company: <span id="previewCompany"></span></h6>
                    <h6>Contact Person: <span id="previewPerson"></span> <span class="text-muted" id="previewMail"></span></h6>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6 class="lead">Message</h6>
                        </div>
                        <div class="card-body" id="previewMessage"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button data-bs-dismiss="modal" type="button" class="btn btn-primary">
                        Okay
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.components.scripts')
    <script src="{{ asset('backend/emailMonitoring.js') }}"></script>
    <script>
        window.onload = () => {
            LoadAll("{{ route('loadSentEmail') }}?user_id={{ $user }}&filter=all", "{{ route('loadMessage') }}");
        }
    </script>
</body>

</html>
