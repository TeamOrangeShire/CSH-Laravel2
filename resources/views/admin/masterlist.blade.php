<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.header', ['title' => 'CSH - Master List'])
</head>

<body>
    @include('admin.components.loading')
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- App container starts -->
        <div class="app-container">

            @include('admin.components.nav', ['active' => 'pipeline'])

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
                                <li class="breadcrumb-item">Pipeline</li>
                                <li class="breadcrumb-item text-light">Master List</li>
                            </ol>
                            <!-- Breadcrumb end -->
                        </div>
                    </div>
                    <!-- Row end -->

                    <!-- Row start -->
                    <div class="row gx-2">
                        <div class="card mb-2">
                            <div class="card-header">
                                <div class="card-title">Simple Data Table</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="masterList" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Lead Owner</th>
                                                <th>Company Name</th>
                                                <th>Contact Person</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        </tbody>
                                    </table>
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
    <script src="{{ asset('backend/masterlist.js') }}"></script>
    <script>
        window.onload = () => {
            LoadAll("{{ route('loadMasterlist') }}");
        }
    </script>
</body>

</html>
