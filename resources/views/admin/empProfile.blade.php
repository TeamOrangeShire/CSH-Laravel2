<!DOCTYPE html>
<html lang="en">
@php
    $emp = App\Models\CshUser::where('user_id', $employee)->first();
@endphp
<head>
    @include('admin.components.header', ['title' => $emp->user_name])
</head>

<body>
    @include('admin.components.loading')
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- App container starts -->
        <div class="app-container">

            @include('admin.components.nav', ['active' => 'attendanceMonitoring'])
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
                                    <a href="{{ route('admin') }}" class="text-decoration-none">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Attendance Monitoring</li>
                                <li class="breadcrumb-item text-light">{{ $emp->user_name }}</li>
                            </ol>
                            <!-- Breadcrumb end -->
                        </div>
                    </div>
                    <!-- Row end -->
              
                    <!-- Row start -->
                    <div class="row gx-2">
                        <div class="col-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="profile-bg p-5 rounded-3 mb-4">
                                        <!-- Row start -->
                                        <div class="bg-dark px-4 p-2 rounded-3">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img src="{{ $emp->user_pic === 'none' ? asset('assets/user/placeholder.webp') :
                                                    asset('assets/user/'. $emp->user_pic) }}" class="img-5x rounded-circle" />
                                                </div>
                                                <div class="col">
                                                    <h6 class="fw-light">{{ $emp->user_position }}</h6>
                                                    <h5 class="m-0 fw-semibold">{{ $emp->user_name }}</h5>
                                                </div>
                                                <div class="col-12 col-md-auto">

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->

                    <!-- Row start -->
                    <div class="row gx-2">
                        <div class="col-xl-12 col-sm-12 col-12">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h5 class="card-title">Progress on leads</h5>
                                </div>
                                <div class="card-body">
                                    <div id="pipeline"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-sm-12 col-12">
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h5 class="card-title">Attendance Records</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="empAttendance" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Work Day</th>
                                                    <th>Time In</th>
                                                    <th>Time Out</th>
                                                    <th>Total Time</th>
                                                    <th>Final Time(Deducted Break Time)</th>
                                                    <th>Over Time</th>
                                                    <th>Approval</th>
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

                    <!-- Row start -->
                    
                    <!-- Row end -->

                </div>
                <!-- Container ends -->

            </div>
            <!-- App body ends -->

        </div>
        <!-- App container ends -->

    </div>
    <!-- Page wrapper end -->
    <!-- Modal -->
   
    <form method="post" id="approvedOvertime">
        @csrf
        <input type="hidden" name="att_id" id="att_id">
    </form>
    @include('admin.components.scripts')
    <script src="{{ asset('backend/attendanceMonitoring.js') }}"></script>
     <script>
        window.onload = () => {
            Att.LoadUserGraph("{{ route('loadUserGraphs') }}", "{{ $employee }}");
            Att.LoadAttendance("{{ route('AttendanceLoadData') }}?user_id={{ $employee }}", "{{ route('ApprovedOvertime') }}");
        }
     </script>
</body>

</html>
