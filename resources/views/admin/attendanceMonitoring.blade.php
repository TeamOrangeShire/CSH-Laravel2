<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.header', ['title' => 'CSH - Attendance Monitoring'])
</head>

<body>
    @include('admin.components.loading')
    @include('admin.components.qrScanner', ['loc'=> 'attendanceMonitoring']) 
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
                                    <i class="icon-house_siding lh-1"></i>
                                    <a href="{{ route('admin') }}" class="text-decoration-none">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item text-light">Attendance Monitoring</li>
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
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-title">Attendance Monitoring</div>
                                        <div class="d-flex gap-4 align-items-center">
                                            <div class="m-0">
                                                <label class="form-label">Year</label>
                                                <select onchange="Att.Filter('{{ route('attMonLoad') }}', '{{ asset('assets/user/') }}', '{{ route('empProfile') }}')" id="attYear" class="form-select" aria-label="Default select example">
                                                    <option selected value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                </select>
                                            </div>
                                            <div class="m-0">
                                                <label class="form-label">Month</label>
                                                <select onchange="Att.Filter('{{ route('attMonLoad') }}', '{{ asset('assets/user/') }}', '{{ route('empProfile') }}')" id="attMonth" class="form-select" aria-label="Attendance Month">
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">August</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                          </div>
                                    </div>
                                   
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="attendanceTable" class="table table-striped table-bordered align-middle m-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Job Title</th>
                                                        <th>Total Hours</th>
                                                        <th>Salary</th>
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
    <script src="{{ asset('backend/attendanceMonitoring.js') }}"></script>
  <script>
    window.onload = ()=> {
        Support.SetMonth('{{  Carbon\Carbon::now()->format('m')}}','attMonth');
        Att.LoadTable("{{ route('attMonLoad') }}?year={{ Carbon\Carbon::now()->year }}&month={{ Carbon\Carbon::now()->month }}", "{{ asset('assets/user/') }}", "{{ route('empProfile') }}");
    }
  </script>
</body>

</html>
