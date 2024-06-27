<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.header', ['title' => 'Account'])
</head>

<body>
    @include('admin.components.loading')
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- App container starts -->
        <div class="app-container">

            @include('admin.components.nav', ['active' => 'none'])
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
                                <li class="breadcrumb-item text-light">Account Settings</li>
                            </ol>
                            <!-- Breadcrumb end -->
                        </div>
                    </div>
                    <!-- Row end -->
                    @php
                        $account = App\Models\CshUser::where('user_id', $user)->first();
                    @endphp
                    <!-- Row start -->
                    <div class="row gx-2">
                        <div class="col-xxl-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="custom-tabs-container">
                                        <ul class="nav nav-tabs" id="customTab2" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active"
                                                    onclick="Support.OpenDiv('upDet', ''); Support.CloseDiv('upPass'); Support.CloseDiv('upPic')"
                                                    id="tab-oneA" data-bs-toggle="tab" href="#details" role="tab"
                                                    aria-controls="details" aria-selected="true">User Info</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link"
                                                    onclick="Support.CloseDiv('upDet'); Support.OpenDiv('upPass', ''); Support.CloseDiv('upPic')"
                                                    id="tab-twoA" data-bs-toggle="tab" href="#password" role="tab"
                                                    aria-controls="pass" aria-selected="false">Change Password</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link"
                                                    onclick="Support.CloseDiv('upDet'); Support.CloseDiv('upPass'); Support.OpenDiv('upPic', '')"
                                                    id="tab-threeA" data-bs-toggle="tab" href="#pic" role="tab"
                                                    aria-controls="pic" aria-selected="false">Change Profile</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content h-350">
                                            <div class="tab-pane fade show active" id="details" role="tabpanel">
                                                <!-- Row start -->
                                                <form method="POST" id="formDetails">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $user }}">
                                                    <div class="row gx-2">

                                                        <div class="col-sm-12 col-12">
                                                            <div class="row gx-2">
                                                                <div class="col-6">
                                                                    <!-- Form Field Start -->
                                                                    <div class="mb-3">
                                                                        <label for="fullName" class="form-label">Full
                                                                            Name <small style="display: none"
                                                                                id="fullNameE"
                                                                                class="text-danger">(Don't leave this
                                                                                empty)</small> </label>
                                                                        <input value="{{ $account->user_name }}"
                                                                            type="text" name="fullname"
                                                                            class="form-control" id="fullName"
                                                                            placeholder="Full Name" />

                                                                    </div>

                                                                    <!-- Form Field Start -->
                                                                    <div class="mb-3">
                                                                        <label for="username"
                                                                            class="form-label">Username <small
                                                                                style="display: none" id="usernameE"
                                                                                class="text-danger">(Don't leave this
                                                                                empty)</small></label>
                                                                        <input type="text"
                                                                            value="{{ $account->user_username }}"
                                                                            name="username" class="form-control"
                                                                            id="username" placeholder="Username" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <!-- Form Field Start -->
                                                                    <div class="mb-3">
                                                                        <label for="employeeID"
                                                                            class="form-label">Employee ID <small
                                                                                style="display: none" id="employeeIDE"
                                                                                class="text-danger">(Don't leave this
                                                                                empty)</small></label>
                                                                        <input type="text"
                                                                            value="{{ $account->user_emp_id }}"
                                                                            name="employeeId" class="form-control"
                                                                            id="employeeID"
                                                                            placeholder="Employee ID" />
                                                                    </div>

                                                                    <!-- Form Field Start -->
                                                                    <div class="mb-3">
                                                                        <label for="position"
                                                                            class="form-label">Position <small
                                                                                style="display: none" id="positionE"
                                                                                class="text-danger">(Don't leave this
                                                                                empty)</small></label>
                                                                        <input type="text"
                                                                            value="{{ $account->user_position }}"
                                                                            name="position" class="form-control"
                                                                            id="position" placeholder="Position" />
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                                <!-- Row end -->
                                            </div>
                                            <div class="tab-pane fade" id="password" role="tabpanel">
                                                <div class="card-body">
                                                    <!-- Row start -->
                                                    <div class="row gx-2">
                                                        <div class="col-sm-12 col-12">
                                                            <!-- Card start -->
                                                            <div class="card mb-2">
                                                                <div class="card-body">
                                                                    <form method="POST" id="changePassForm">
                                                                        @csrf
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ $user }}">
                                                                        <div class="row mb-3">
                                                                            <label for="currentPass"
                                                                                class="col-sm-3 col-form-label">Current
                                                                                Password</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <input type="password"
                                                                                        id="currentPass"
                                                                                        name="currentPass"
                                                                                        class="form-control" />
                                                                                    <button
                                                                                        onclick="Support.ShowPass('currentPass', this)"
                                                                                        class="btn btn-outline-dark"
                                                                                        type="button">
                                                                                        <i class="icon-eye"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <small style="display: none"
                                                                                    id="currentPassE"
                                                                                    class="text-danger">(No Input found
                                                                                    please provide something)</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="newPass"
                                                                                class="col-sm-3 col-form-label">New
                                                                                Password</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <input type="password"
                                                                                        class="form-control"
                                                                                        id="newPass"
                                                                                        name="newPass" />
                                                                                    <button
                                                                                        onclick="Support.ShowPass('newPass', this)"
                                                                                        class="btn btn-outline-dark"
                                                                                        type="button">
                                                                                        <i class="icon-eye"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <small style="display: none"
                                                                                    id="newPassE"
                                                                                    class="text-danger">(No Input found
                                                                                    please provide something)</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label for="confPass"
                                                                                class="col-sm-3 col-form-label">Confirm
                                                                                Password</label>
                                                                            <div class="col-sm-9">
                                                                                <div class="input-group">
                                                                                    <input type="password"
                                                                                        class="form-control"
                                                                                        name="confPass"
                                                                                        id="confPass" />
                                                                                    <button
                                                                                        onclick="Support.ShowPass('confPass', this)"
                                                                                        class="btn btn-outline-dark"
                                                                                        type="button">
                                                                                        <i class="icon-eye"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <small style="display: none"
                                                                                    id="confPassE"
                                                                                    class="text-danger">(No Input found
                                                                                    please provide something)</small>
                                                                            </div>
                                                                        </div>


                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- Card end -->
                                                        </div>

                                                    </div>
                                                    <!-- Row end -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pic" role="tabpanel">
                                                <!-- Row start -->
                                                <div class="row">
                                                    <div
                                                        class="col-12 d-flex justify-content-center flex-column align-items-center">
                                                        <div class="card mb-2 w-25 d-flex justify-content-center">
                                                            <img id="imagse"
                                                                src="{{ $account->user_pic === 'none' ? asset('assets/user/placeholder.webp') : asset('assets/user/'.$account->user_pic) }}"
                                                                class="img-fluid" alt="Bootstrap Gallery" />
                                                        </div>
                                                        <div class="d-flex w-100 gap-2 justify-content-center">
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#editPicture" class="btn btn-success">
                                                                Change
                                                            </button>
                                                            <button class="btn btn-danger">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light">
                                                Cancel
                                            </button>
                                            <button id="upDet"
                                                onclick="User.Details('{{ route('upUserDetails') }}')" type="button"
                                                class="btn btn-success">
                                                Update Details
                                            </button>
                                            <button id="upPass"
                                                onclick="User.ChangePass('{{ route('changePassword') }}')"
                                                style="display: none" type="button" class="btn btn-success">
                                                Update Password
                                            </button>
                                            <button id="upPic" type="button"
                                                onclick="User.ChangeProfile('{{ route('changeProfilePic') }}')"
                                                style="display: none" class="btn btn-success">
                                                Update Profile
                                            </button>
                                        </div>
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
        <!-- App container ends -->

    </div>
    <!-- Page wrapper end -->
    <!-- Modal -->
    <div class="modal fade" id="editPicture" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        Select New Profile Pic
                    </h5>
                    <button style="filter: brightness(0) invert(1);" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
				<form method="POST" id="updateProfilePicForm" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="user_id" value="{{ $user }}">
                <div class="modal-body d-flex justify-content-center">
                    <div class="card border-0 mb-2 w-100 d-flex justify-content-center flex-column">
						<div id="croppie-container"></div>
                        <img id="image"  src="{{ $account->user_pic === 'none' ? asset('assets/user/placeholder.webp') : asset('assets/user/'.$account->user_pic) }}" class="img-fluid"
                            alt="Bootstrap Gallery" />
							<div class="input-group mt-4">
								<input accept="image/*" name="profile" onchange="Support.UpdatePic(event, 'image', '{{ asset('assets/user/placeholder.webp') }}', '{{ route('changeProfilePic') }}')" type="file" class="form-control" id="profile"
									aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
								<button class="btn btn-outline-light" type="button" id="saveProfile">
									Save
								</button>
							</div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    @include('admin.components.scripts')
    <script src="{{ asset('backend/user.js') }}"></script>

</body>

</html>
