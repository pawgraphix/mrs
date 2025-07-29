<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Maintenance Reporting System Login">
    <meta name="author" content="YourTeamName">

    <link rel="shortcut icon" href="images/favicon_1.ico">
    <title>Maintenance Reporting System</title>

    <!-- Base Css Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('room-assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('room-assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/waves-effect.css') }}" rel="stylesheet">
    <link href="{{ asset('css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
{{--    <style>--}}
{{--        body{--}}
{{--            background-image: "images/bg.jpg";--}}
{{--        }--}}
{{--    </style>--}}

    <script src="{{ asset('js/modernizr.min.js') }}"></script>
</head>
<body>
{{--style="width: 100%; height: 1400px"--}}
<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white" id="form-title">Login to <strong>MaReS</strong></h3>
        </div>

        <div class="panel-body">
            <div class="text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" data-toggle="tab" data-target="#login-tab" id="btn-login">Login</button>
                    <button type="button" class="btn btn-default" data-toggle="tab" data-target="#register-tab" id="btn-register">Register</button>
                </div>
            </div>

            <div class="tab-content m-t-20">
                <!-- Login Tab -->
                <div id="login-tab" class="tab-pane fade">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                        @csrf

                        @if(session('error'))
                            <div class="alert alert-danger auto-dismiss">{{ session('error') }}</div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success auto-dismiss">{{ session('success') }}</div>
                        @endif

                        @if ($errors->has('email') || $errors->has('password'))
                            <div class="alert alert-danger auto-dismiss">
                                <ul class="m-0">
                                    @foreach ($errors->get('email') as $msg)
                                        <li>{{ $msg }}</li>
                                    @endforeach
                                    @foreach ($errors->get('password') as $msg)
                                        <li>{{ $msg }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="email" type="email" required placeholder="Email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="password" type="password" required placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Register Tab -->
                <div id="register-tab" class="tab-pane fade">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                        @csrf

                        @if ($errors->any() && old('first_name'))
                            <div class="alert alert-danger auto-dismiss">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-xs-6">
                                <input class="form-control input-lg" name="first_name" type="text" required placeholder="First Name" value="{{ old('first_name') }}">
                            </div>
                            <div class="col-xs-6">
                                <input class="form-control input-lg" name="last_name" type="text" required placeholder="Last Name" value="{{ old('last_name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="phone_number" type="text" required placeholder="Phone Number" value="{{ old('phone_number') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <select name="gender" class="form-control input-lg" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <select name="department_id" id="department_id" class="form-control input-lg" required>
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="email" type="email" required placeholder="Email" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="password" type="password" required placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="password_confirmation" type="password" required placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('assets/jquery-detectmobile/detect.js') }}"></script>
<script src="{{ asset('assets/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/jquery-blockui/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/jquery.app.js') }}"></script>

<!-- Auto dismiss alerts -->
<script>
    setTimeout(function () {
        document.querySelectorAll('.auto-dismiss').forEach(function (el) {
            el.style.transition = 'opacity 0.5s';
            el.style.opacity = 0;
            setTimeout(() => el.remove(), 500);
        });
    }, 5000); //5 Seconds
</script>

<!-- Dynamic tab control -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loginTab = document.getElementById('login-tab');
        const registerTab = document.getElementById('register-tab');
        const loginBtn = document.getElementById('btn-login');
        const registerBtn = document.getElementById('btn-register');
        const formTitle = document.getElementById('form-title');

        function switchToLogin() {
            loginBtn.classList.add('active');
            registerBtn.classList.remove('active');
            loginTab.classList.add('in', 'active');
            registerTab.classList.remove('in', 'active');
            formTitle.innerHTML = 'Login to <strong>MaReS</strong>';
        }

        function switchToRegister() {
            registerBtn.classList.add('active');
            loginBtn.classList.remove('active');
            registerTab.classList.add('in', 'active');
            loginTab.classList.remove('in', 'active');
            formTitle.innerHTML = 'Register to <strong>MaReS</strong>';
        }

        loginBtn.addEventListener('click', switchToLogin);
        registerBtn.addEventListener('click', switchToRegister);

        // Activate correct tab on page load
        @if ($errors->any() && old('first_name'))
        switchToRegister();
        @else
        switchToLogin();
        @endif
    });
</script>
</body>
</html>
