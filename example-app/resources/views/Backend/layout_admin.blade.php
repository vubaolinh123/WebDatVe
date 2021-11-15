<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('backend/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('backend/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('backend/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="{{ asset('backend/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/pickadate/themes/default.date.css') }}">

    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">


        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                {{-- <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt=""> --}}
                ADMIN
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span
                        class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                        unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Tài khoản </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Tin nhắn </span>
                                    </a>
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Đăng xuất </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    @include('Backend.include.navbar')
                </ul>
            </div>


        </div>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('conten.admin')

            </div>
        </div>

        {{-- <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div> --}}



    </div>

    <div>

        <!-- Required vendors -->
        <script src=" {{ asset('backend/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('backend/js/quixnav-init.js') }}"></script>
        <script src="{{ asset('backend/js/custom.min.js') }}"></script>

        <!-- Vectormap -->
        <script src="{{ asset('backend/vendor/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/morris/morris.min.js') }}"></script>


        <script src="{{ asset('backend/vendor/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>

        <script src="{{ asset('backend/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

        <!--  flot-chart js -->
        <script src="{{ asset('backend/vendor/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('backend/vendor/flot/jquery.flot.resize.js') }}"></script>

        <!-- Owl Carousel -->
        <script src="{{ asset('backend/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

        <!-- Counter Up -->
        <script src="{{ asset('backend/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('backend/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


        <script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script>


        <!-- Daterangepicker -->
        <!-- momment js is must -->
        <script src="{{ asset('backend/vendor/moment/moment.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <!-- clockpicker -->
        <script src="{{ asset('backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
        <!-- asColorPicker -->
        <script src="{{ asset('backend/vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
        <!-- Material color picker -->
        <script
                src="{{ asset('backend/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
        </script>
        <!-- pickdate -->
        <script src="{{ asset('backend/vendor/pickadate/picker.js') }}"></script>
        <script src="{{ asset('backend/vendor/pickadate/picker.time.js') }}"></script>
        <script src="{{ asset('backend/vendor/pickadate/picker.date.js') }}"></script>

        <!-- Daterangepicker -->
        <script src="{{ asset('backend/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
        <!-- Clockpicker init -->
        <script src="{{ asset('backend/js/plugins-init/clock-picker-init.js') }}"></script>
        <!-- asColorPicker init -->
        <script src="{{ asset('backend/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
        <!-- Material color picker init -->
        <script src="{{ asset('backend/js/plugins-init/material-date-picker-init.js') }}"></script>
        <!-- Pickdate -->
        <script src="{{ asset('backend/js/plugins-init/pickadate-init.js') }}"></script>
    </div>

</body>

</html>
