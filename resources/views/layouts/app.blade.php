<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="images/favicon_1.ico">
    <title>Maintenance Reporting System</title>

    <!-- Base Css Files -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/>

    <!-- Font Icons -->
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/ionicon/css/ionicons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/material-design-iconic-font.min.css')}}" rel="stylesheet">

    <!-- animate css -->
    <link href="{{asset('css/animate.css')}}"rel="stylesheet"/>

    <!-- Waves-effect -->
    <link href="{{asset('css/waves-effect.css')}}" rel="stylesheet">

    <!-- sweet alerts -->
    <link href="{{asset('assets/sweet-alert/sweet-alert.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/select2/select2.css')}}" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="{{asset('assets/notifications/notification.css')}}" rel="stylesheet" />

    <!-- DataTables -->
    <link href="{{asset('assets/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Custom Files -->
    <link href="{{asset('css/helper.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css"/>
    @yield('Styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js')}}"></script>
    <![endif]-->

    <script src="{{asset('js/modernizr.min.js')}}"></script>
    <!-- jQuery  -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left" >
            <div class="text-center">
                <a href="{{route('dashboard')}}" class="logo"><i class="md md-terrain"></i> <span>MaReS System </span></a>
            </div>
        </div>
{{--        style="background-color: red"--}}
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation" >
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="fa fa-bars"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>
                 <!---   <form class="navbar-form pull-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                        </div>
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </form>--->

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li class="hidden-xs">
                            <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i
                                    class="md md-crop-free"></i></a>
                        </li>
                       <!--- <li class="hidden-xs">
                            <a href="#" class="right-bar-toggle waves-effect waves-light"><i class="md md-chat"></i></a>
                        </li>--->
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img
                                    src="{{asset('images/avatar-1.png')}}" alt="user-img" class="img-circle"> </a>
                            <ul class="dropdown-menu">
                               <li><a href="{{route('profile')}}"><i class="md md-face-unlock"></i> Profile</a></li>
{{--                                <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>--}}
{{--                                <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>--}}
                                <li><a href="{{route('logout')}}"><i class="md md-settings-power"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <div class="user-details">
                <div class="pull-left">
                    <img src="{{asset('images/avatar-1.png')}}" alt="" class="thumb-md img-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{auth()->user()->full_name}} <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!--- <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile
                                  <div class="ripple-wrapper"></div>
                              </a></li>
                       <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                          <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>-->
                            <li><a href="{{route('logout')}}"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </div>

                    <p class="text-muted m-0">{{auth()->user()->role->name}}</p>
                </div>
            </div>
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{route('dashboard')}}" class="waves-effect active"><i
                                class="md md-home"></i><span> Dashboard </span></a>
                    </li>

                    @can('Admin')
                        <li>
                            <a href="{{route('departments.index')}}" class="waves-effect active"><i
                                        class="md md-business"></i><span> Departments </span></a>
                        </li>
                        <li>
                            <a href="{{route('room-assets.index')}}" class="waves-effect active"><i
                                        class="md md-devices"></i><span> Assets</span></a>
                        </li>
                        <li>
                            <a href="{{route('asset_categories.index')}}" class="waves-effect active"><i
                                        class="md md-folder"></i><span> Asset Categories </span></a>
                        </li>
                        <li>
                            <a href="{{route('locations.index')}}" class="waves-effect active"><i
                                        class="md md-room"></i><span> Locations</span></a>
                        </li>
                        <li>
                            <a href="{{route('users.index')}}" class="waves-effect active"><i
                                    class="md md-people"></i><span>Users</span></a>
                        </li>
                        <li>
                            <a href="{{route('roles.index')}}" class="waves-effect active"><i
                                    class="md md-assignment-ind"></i><span>Roles</span></a>
                        </li>
                    @endcan

                    @can('Student')
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-mail"></i><span>Maintenance Req</span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('maintenance_requests.index')}}">Request</a></li>
                                <li><a href="{{route('maintenance_requests.resolved')}}">Resolved</a></li>
                                <li><a href="{{route('maintenance_requests.rejected')}}">Rejected</a></li>
                            </ul>
                        </li>
                   @endcan

                    @can('Hod')
                        <li class="has_sub">
                            <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Maintenance Req </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('maintenance_requests.hod')}}">Incoming</a></li>
                                <li><a href="{{route('maintenance_requests.approved')}}">Approved</a></li>
                                <li><a href="{{route('maintenance_requests.resolved')}}">Resolved</a></li>
                                <li><a href="{{route('maintenance_requests.rejected')}}">Rejected</a></li>
                            </ul>
                        </li>
                    @endcan

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                @yield('page-content')
                @include('layouts.notification')
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2025 © MaReS
        </footer>

    </div>
</div>
<!-- END wrapper -->

@include('layouts.footer')
@yield('Scripts')
</body>
</html>
