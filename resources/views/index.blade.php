<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Maintenance Reporting System Login">
    <meta name="author" content="YourTeamName">

    <link rel="shortcut icon" href="images/favicon_1.ico">
    <title>MaReS | Login</title>

    <!-- Fonts and Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('room-assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('room-assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/waves-effect.css') }}" rel="stylesheet">
    <link href="{{ asset('css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .background {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, #4a90e2, #0e2f44);
            z-index: 0;
            overflow: hidden;
        }

        .gear-icon {
            position: absolute;
            font-size: 100px;
            color: rgba(255, 255, 255, 0.07);
            animation: rotate 30s linear infinite, float 10s ease-in-out infinite alternate;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            25% { transform: translate(10px, -15px); }
            50% { transform: translate(-20px, 10px); }
            75% { transform: translate(5px, -5px); }
            100% { transform: translate(-15px, 20px); }
        }

        .gear1 { top: 10%; left: 10%; animation-delay: 0s, 0s; }
        .gear2 { top: 30%; left: 25%; animation-delay: 0s, 2s; }
        .gear3 { top: 60%; left: 15%; animation-delay: 0s, 4s; }
        .gear4 { top: 80%; left: 35%; animation-delay: 0s, 3s; }
        .gear5 { top: 20%; right: 10%; animation-delay: 0s, 5s; }
        .gear6 { top: 40%; right: 25%; animation-delay: 0s, 1s; }
        .gear7 { bottom: 10%; right: 20%; animation-delay: 0s, 2.5s; }
        .gear8 { bottom: 30%; right: 5%; animation-delay: 0s, 3.2s; }
        .gear9 { bottom: 50%; left: 5%; animation-delay: 0s, 4.5s; }
        .gear10 { top: 45%; left: 50%; animation-delay: 0s, 1.8s; }

        .input-error {
            border: 1px solid red !important;
        }

        .input-error-msg {
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        .wrapper-page {
            position: relative;
            z-index: 1;
            background-color: white;
        }

        .panel-pages {
            background-color: rgba(255,255,255,0.05) !important;
            backdrop-filter: blur(6px);
        }
    </style>
    <script src="{{ asset('js/modernizr.min.js') }}"></script>
</head>

<body>
{{--<a href="{{ route('welcome') }}" class="btn">Go to Home Page</a>--}}
<!-- Background Animation -->
<div class="background">
    <i class="fas fa-cog gear-icon gear1"></i>
    <i class="fas fa-cog gear-icon gear2"></i>
    <i class="fas fa-cog gear-icon gear3"></i>
    <i class="fas fa-cog gear-icon gear4"></i>
    <i class="fas fa-cog gear-icon gear5"></i>
    <i class="fas fa-cog gear-icon gear6"></i>
    <i class="fas fa-cog gear-icon gear7"></i>
    <i class="fas fa-cog gear-icon gear8"></i>
    <i class="fas fa-cog gear-icon gear9"></i>
    <i class="fas fa-cog gear-icon gear10"></i>
</div>

<!-- Main Panel -->
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
                                <select name="department_id" class="form-control input-lg" required>
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
    },50000); //50seconds
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function showError(input, message) {
            let error = input.nextElementSibling;
            if (!error || !error.classList.contains('input-error-msg')) {
                error = document.createElement('small');
                error.classList.add('input-error-msg');
                error.style.color = 'red';
                input.parentNode.appendChild(error);
            }
            error.innerText = message;
            input.classList.add('input-error');
        }

        function clearError(input) {
            input.classList.remove('input-error');
            const error = input.parentNode.querySelector('.input-error-msg');
            if (error) error.remove();
        }

        function validateEmailFormat(input) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!re.test(input.value)) {
                showError(input, 'Enter a valid email');
                return false;
            } else {
                clearError(input);
                return true;
            }
        }

        function checkEmailExistence(input) {
            if (!validateEmailFormat(input)) return;

            fetch("{{ url('/check-email') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: input.value })
            })
                .then(res => res.json())
                .then(data => {
                    if (data.exists) {
                        showError(input, 'Email is already taken');
                    } else {
                        clearError(input);
                    }
                })
                .catch(() => {
                    showError(input, 'Email is already exists');
                    // Error checking email
                });
        }

        function validatePassword(input) {
            if (input.value.length < 6) {
                showError(input, 'Password must be at least 6 characters');
            } else {
                clearError(input);
            }
        }

        function validateNotEmpty(input, message = 'This field is required') {
            if (!input.value.trim()) {
                showError(input, message);
            } else {
                clearError(input);
            }
        }

        function validatePasswordMatch(password, confirm) {
            if (!password.value) {
                clearError(confirm);
                return;
            }

            if (confirm.value !== password.value) {
                showError(confirm, 'Passwords do not match');
            } else {
                clearError(confirm);
            }
        }

        // Assign listeners
        const emailInputs = document.querySelectorAll('input[name="email"]');
        const passwordInputs = document.querySelectorAll('input[name="password"]');
        const firstName = document.querySelector('input[name="first_name"]');
        const lastName = document.querySelector('input[name="last_name"]');
        const phone = document.querySelector('input[name="phone_number"]');
        const passwordConfirm = document.querySelector('input[name="password_confirmation"]');

        emailInputs.forEach(input => {
            input.addEventListener('input', () => {
                validateEmailFormat(input);
                checkEmailExistence(input);
            });
        });

        passwordInputs.forEach(input => {
            input.addEventListener('input', () => validatePassword(input));
        });

        if (firstName) {
            firstName.addEventListener('input', () => {
                const val = firstName.value.trim();

                if (!val) {
                    showError(firstName, 'First name is required');
                } else if (!/^[a-zA-Z\s']+$/.test(val)) {
                    showError(firstName, 'First name must contain letters only');
                } else {
                    clearError(firstName);
                }
            });
        }

        if (lastName) {
            lastName.addEventListener('input', () => {
                const val = lastName.value.trim();

                if (!val) {
                    showError(lastName, 'Last name is required');
                } else if (!/^[a-zA-Z\s']+$/.test(val)) {
                    showError(lastName, 'Last name must contain letters only');
                } else {
                    clearError(lastName);
                }
            });
        }

        if (phone) {
            phone.addEventListener('input', () => {
                const val = phone.value.trim();
                if (!val) {
                    showError(phone, 'Phone number is required');
                } else if (!/^(\+\d{12}|0\d{9})$/.test(val)) {
                    showError(phone, 'Phone number must start with + followed by 12 digits or 0 followed by 9 digits');
                } else {
                    clearError(phone);
                }
            });
        }

        // if (!val) {
        //     showError(phone, 'Phone number is required');
        // }       else if (!/^\+\d{12}$/.test(val)) {
        //     showError(phone, 'Phone number must start with + followed by 12 digits');
        // } else {
        //     clearError(phone);
        // }

        // else if (!/^\+255\d{9}$/.test(val)) {
        //     showError(phone, 'Phone number must start with +255 and contain 9 digits after that');

        if (passwordConfirm) {
            passwordConfirm.addEventListener('input', () => {
                const password = document.querySelector('input[name="password"]');
                validatePasswordMatch(password, passwordConfirm);
            });
        }
    });
</script>
</body>
</html>
