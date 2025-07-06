<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Maintenance Reporting System Login">
    <meta name="author" content="YourTeamName">

    <link rel="shortcut icon" href="images/favicon_1.ico">
    <title>Maintenance System - Login</title>

    <!-- Base Css Files -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('room-assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('room-assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/waves-effect.css') }}" rel="stylesheet">
    <link href="{{ asset('css/helper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/modernizr.min.js') }}"></script>
</head>
<body>
<div class="wrapper-page">
    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white" id="form-title">Login to <strong>MRS</strong></h3>
        </div>

        <div class="panel-body">
            <div class="text-center">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default active" data-toggle="tab" data-target="#login-tab" id="btn-login">Login</button>
                    <button type="button" class="btn btn-default" data-toggle="tab" data-target="#register-tab" id="btn-register">Register</button>
                </div>
            </div>

            <div class="tab-content m-t-20">
                <!-- Login Tab -->
                <div id="login-tab" class="tab-pane fade in active">
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                        @csrf
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if(session('success'))
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    document.getElementById('btn-login').click();
                                    document.getElementById('form-title').innerHTML = 'Login to <strong>MRS</strong>';
                                });
                            </script>
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="email" type="email" required placeholder="Email">
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
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById('btn-register').addEventListener('click', function () {
                                document.getElementById('form-title').innerHTML = 'Register to <strong>MRS</strong>';
                                this.classList.add('active');
                                document.getElementById('btn-login').classList.remove('active');
                            });

                            document.getElementById('btn-login').addEventListener('click', function () {
                                document.getElementById('form-title').innerHTML = 'Login to <strong>MRS</strong>';
                                this.classList.add('active');
                                document.getElementById('btn-register').classList.remove('active');
                            });
                        });
                    </script>

                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="first_name" type="text" required placeholder="First Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="last_name" type="text" required placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="phone_number" type="text" required placeholder="Phone Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <select name="gender" class="form-control input-lg" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" name="email" type="email" required placeholder="Email">
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

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('room-assets/jquery-detectmobile/detect.js') }}"></script>
<script src="{{ asset('room-assets/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('room-assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('room-assets/jquery-blockui/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/jquery.app.js') }}"></script>
</body>
</html>
