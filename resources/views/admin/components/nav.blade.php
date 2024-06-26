<!-- App header starts -->
<div class="app-header d-flex align-items-center">

    <!-- Container starts -->
    <div class="container">

        <!-- Row starts -->
        <div class="row">
            <div class="col-md-3 col-2">

                <!-- App brand starts -->
                <div class="app-brand">
                    <a href="{{ route('admin') }}" class="d-lg-block d-none">
                        <img src="{{ asset('images/icon-white.png') }}" class="logo" alt="CSH Icon" />
                    </a>
                    <a href="{{ route('admin') }}" class="d-lg-none d-md-block">
                        <img src="{{ asset('images/icon-white.png') }}" class="logo" alt="CSH ICON" />
                    </a>
                </div>
                <!-- App brand ends -->

            </div>

            @php
                $user = App\Models\CshUser::where('user_id', $user)->first();
            @endphp
          
            <div class="col-md-9 col-10">
                <!-- App header actions start -->
                <div class="header-actions d-flex align-items-center justify-content-end">

                    <div class="dropdown ms-2">
                        <a class="dropdown-toggle d-flex align-items-center user-settings" href="#!" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-md-block">{{ $user->user_name }}</span>
                            <img src="{{ $user->user_pic === 'none' ? asset('assets/user/placeholder.webp') : asset('assets/user/'. $user->user_pic) }}" class="img-3x m-2 me-0 rounded-5" alt="Profile Pic" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm shadow-sm gap-3" style="">
                            <a class="dropdown-item d-flex align-items-center py-2" href="{{route('user')}}"><i
                                    class="icon-smile fs-4 me-3"></i>User Profile</a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="{{route('userSetting')}}"><i
                                    class="icon-settings fs-4 me-3"></i>Account
                                Settings</a>
                                <form method="POST" id="userLogoutForm">
                                    @csrf
                                </form>
                            <button onclick="Support.Logout('{{ route('userLogout') }}', '{{ route('adminLogin') }}')" class="dropdown-item d-flex align-items-center py-2" href="login.html"><i
                                    class="icon-log-out fs-4 me-3"></i>Logout</button>
                        </div>
                    </div>

                    <!-- Toggle Menu starts -->
                    <button class="btn btn-success btn-sm ms-3 d-lg-none d-md-block" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#MobileMenu">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Toggle Menu ends -->

                </div>
                <!-- App header actions end -->

            </div>
        </div>
        <!-- Row ends -->

    </div>
    <!-- Container ends -->

</div>
<!-- App header ends -->

<!-- App navbar starts -->
<nav class="navbar navbar-expand-lg p-0">
    <div class="container">
        <div class="offcanvas offcanvas-end" id="MobileMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title semibold">Navigation</h5>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="offcanvas">
                    <i class="icon-clear"></i>
                </button>
            </div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             
                <li class="nav-item {{ $active==='dashboard' ? 'active-link' : '' }}">
                    <a class="nav-link" href="{{ route('admin') }}"> Dashboard </a>
                </li>
                @if ($user->user_type === 'Employee')
                <li class="nav-item {{ $active==='attendance' ? 'active-link' : '' }}">
                    <a class="nav-link" href="{{ route('adminAttendance') }}"> Attendance </a>
                </li>
                @endif
                <li class="nav-item dropdown {{ $active==='pipeline' ? 'active-link' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Pipeline
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('pipeline', ['state'=> 'all']) }}">
                                <span>All</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'leads']) }}">
                                <span>Leads</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'prospects']) }}">
                                <span>Prospects</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'discussion']) }}">
                                <span>Discussion</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'proposal']) }}">
                                <span>Proposal</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'negotiation']) }}">
                                <span>Negotiation</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'contract']) }}">
                                <span>Contract</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'won']) }}">
                                <span>Won</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'lost']) }}">
                                <span>Lost</span></a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{ route('pipeline', ['state'=> 'dnc']) }}">
                                <span>DNC</span></a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item {{ $active==='emailMonitoring' ? 'active-link' : '' }}">
                    <a class="nav-link" href="{{ route('adminEmailMonitoring') }}"> Email Sent Monitoring </a>
                </li>
               @if ($user->user_type === 'Super Admin')
               <li class="nav-item {{ $active==='attendanceMonitoring' ? 'active-link' : '' }}">
                <a class="nav-link" href="{{ route('adminAttendanceMonitoring') }}"> Attendance Monitoring </a>
              </li>
               @endif
            </ul>
        </div>
    </div>
</nav>
<!-- App Navbar ends -->