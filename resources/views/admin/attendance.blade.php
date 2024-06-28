<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.header', ['title' => 'CSH - Attendance'])
</head>

<body>
    @include('admin.components.loading')
    @include('admin.components.qrScanner', ['loc'=> 'attendance']) 
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- App container starts -->
        <div class="app-container">

            @include('admin.components.nav', ['active' => 'attendance'])

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
                                            <table id="attendance" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Time In</th>
                                                        <th>Time Out</th>
                                                        <th>Total Hours</th>
                                                        <th>Date</th>

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
    <script>
        $('#attendance').DataTable({
            ajax: {
                url: '{{ route('getAttendance') }}?user_id={{ $user }}',
                dataSrc: 'att'
            },
            columns: [{
                    data: 'att_time_in'
                },
                {
                    data: 'att_time_out'
                },
                {
                    data: 'att_total_time'
                },
                {
                    data: 'att_date'
                },
            ]
        });
    </script>
</body>

</html>
