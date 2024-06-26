<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.header', ['title' => 'Core Support Hub Signup'])
</head>

<body class="bg-one">
    @include('admin.components.loading')
    <!-- Container start -->
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
                <form id="signup" method="POST" class="my-5">
                    @csrf
                    <div class="card p-md-4 p-sm-3" style="backdrop-filter: blur(20px); padding: 4%">
                        <div class="login-form">
                            <a href="{{ route('adminLogin') }}" class="mb-4 d-flex justify-content-center">
                                <img src="{{ asset('images/cs_icon2.png') }}" class="img-fluid login-logo"
                                    alt="CSH Logo" />
                            </a>
                            <h2 class="mt-4 mb-4 text-center">Core Support Hub Admin Sign up</h2>
                            <div class="mb-3">
                                <label class="form-label">ID Number</label>
                                <input type="text" name="IDNum" id="IDNum" class="form-control"
                                    placeholder="Enter your ID Number" />
                                <small id="IDNumE" style="display: none" class="text-danger">(Please provide a
                                    Name)</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter your Name" />
                                <small id="nameE" style="display: none" class="text-danger">(Please provide a
                                    Name)</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Enter your username" />
                                <small id="usernameE" style="display: none" class="text-danger">(Please provide a
                                    username)</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter password" />
                                    <button type="button" onclick="Support.ShowPass('password')"
                                        class="input-group-text">
                                        <i class="icon-eye"></i>
                                    </button>
                                </div>
                                <small id="passwordE" style="display: none" class="text-danger">(Please provide a
                                    Password)</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Position</label>
                                <input type="text" name="position" id="position" class="form-control"
                                    placeholder="Enter your Position" />
                                <small id="positionE" style="display: none" class="text-danger">(Please provide a
                                    Position)</small>
                            </div>
                            <div class="d-grid py-3 mt-3">
                                <button onclick="VerifySignUp()"   type="button"
                                    class="btn btn-lg btn-success">
                                    Sign Up
                                </button>
                            </div>

                            <div class="text-center pt-4">
                                <span>Already have an Account?</span>
                                <a href="{{ route('adminLogin') }}" class="text-success text-decoration-underline">
                                    Login</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="AdminConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Super Admin Password Required</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>For Safety Purposes Super Admin Password is required upon registration to secure authenticity of employee</p>
                    <div class="mb-3">
                     
                        <label class="form-label">Super Admin Password</label>
                        <form method="POST" id="AdminPass">
                            @csrf
                            <input type="password" name="superAdmin" id="superAdmin" class="form-control"
                            placeholder="Enter your Super Admin Password" />
                        </form>
                        <small id="superAdminE" style="display: none" class="text-danger">(Please provide a
                            Pasword)</small>
                    </div>
                </div>
                <div class="modal-footer flex-column">
                    <button type="button" onclick="SignUp('{{ route('verification') }}','{{ route('signup') }}', '{{ route('admin') }}')" class="btn btn-lg btn-primary w-100 mx-0 mb-2">
                        Save changes
                    </button>
                    <button  type="button" class="btn btn-lg btn-secondary w-100 mx-0" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Container end -->
    @include('admin.components.scripts')
    <script src="{{ asset('backend/authenticate.js') }}"></script>
</body>

</html>
