<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<!DOCTYPE html>
<html>
    <head>

        <!-- Title -->
        <title>Concorde | @yield('PageTitle')</title>

        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="Concorde Express" />
        <meta name="author" content="KISHAN AMBASNA" />

        <!-- Styles -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="{{ asset('assetsb/plugins/pace-master/themes/blue/pace-theme-flash.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assetsb/plugins/uniform/css/uniform.default.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assetsb/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/plugins/fontawesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/plugins/line-icons/simple-line-icons.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/plugins/offcanvasmenueffects/css/menu_cornerbox.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/plugins/waves/waves.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>

        <link href="{{ asset('assetsb/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/plugins/3d-bold-navigation/css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/plugins/slidepushmenus/css/component.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="{{ asset('assetsb/css/modern.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/css/themes/white.css') }}" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assetsb/css/custom.css') }}" rel="stylesheet" type="text/css"/>

        <script src="{{ asset('assetsb/plugins/3d-bold-navigation/js/modernizr.js') }}"></script>
        <script src="{{ asset('assetsb/plugins/offcanvasmenueffects/js/snap.svg-min.js') }}"></script>
        <link rel="apple-touch-icon" href="{{ asset('/assets/img/favicons/apple-icon.png') }}"/>
        <link rel="apple-touch-startup-image" href="{{ asset('/assets/img/favicons/apple-icon-180x180.png') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/assets/img/favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/assets/img/favicons/apple-icon-60x60s.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/assets/img/favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/assets/img/favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/assets/img/favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/assets/img/favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/assets/img/favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/img/favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('/assets/img/favicons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/img/favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/assets/img/favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/img/favicons/favicon-16x16.png') }}">
        <link rel='shortcut icon' type='image/x-icon' href="{{ asset('/assets/img/favicons/favicon.ico') }}" />
        <link rel="manifest" href="{{ asset('/assets/img/favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('/assets/img/favicons/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>
    <body class="page-header-fixed">


        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a href="{{ url('/home') }}" class="logo-text"><span>CE</span></a>
                    </div><!-- Logo Box -->
                    <div class="search-button">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                    </div>
                    <div class="topmenu-outer">
                        <div class="top-menu">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                                </li>
                                <li>
                                    <a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i class="fa fa-diamond"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                                </li>

                            </ul>
                            <ul class="nav navbar-nav navbar-right">

                                <li>
                                    <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name">{{ Auth::user()->name }} <i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendar</a></li>
                                        <li role="presentation"><a href="inbox.html"><i class="fa fa-envelope"></i>Inbox<span class="badge badge-success pull-right">4</span></a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
                                        <li role="presentation"><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('/auth/logout') }}" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                    </a>
                                </li>

                            </ul><!-- Nav -->
                        </div><!-- Top Menu -->
                    </div>
                </div>
            </div><!-- Navbar -->
            <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">

                    <ul class="menu accordion-menu">

                        <li><a href="{{url('/home')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li><a href="{{ url('/settings') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Settings</p></a></li>
                        <li class="droplink open"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-envelope"></span><p>Shipping</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('/shipping') }}">View</a></li>
                                <li><a href="{{ url('/shipping/book') }}">Book</a></li>
                            </ul>
                        </li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-envelope"></span><p>Economy Shipping</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('local/shipping') }}">View</a></li>
                                <li><a href="{{ url('local/shipping/book') }}">Book</a></li>
                            </ul>
                        </li>
                       <li><a href="{{ url('/pickup') }}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-road"></span><p>Pickup</p></a></li>
                       @if(Auth::user()->admin == true)
                       <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Admin</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
                                <li><a href="{{ url('/admin/') }}">Admin</a></li>
                                <li><a href="{{ url('/admin/shipments') }}">Shipments</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>@yield('PageTitle')</h3>
                </div>
                @if (Session::has('flash_notification.message'))
                    <div class="container">
                    <div class="alert alert-{{ Session::get('flash_notification.level') }}  alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                        <b>{{ Session::get('flash_notification.message') }}</b>
                    </div>
                    </div>
                @endif
                <div id="main-wrapper">
                    <div class="row">
                      @yield('content')
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                        <?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
?>
            <div class="page-footer">
                    <p class="no-s">2015 © Concorde Courier & Cargo - Page Generated In {{$total_time}} Seconds</p>

                </div>
            </div><!-- Page Inner -->

        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="/home1">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
        <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;

    js.src = "//button.packpin.com/assets/js/script_button.min.js?v=1.13";

    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'pp-jssdk'));</script>

<!-- Javascripts -->
        <script src="{{ asset('/assetsb/plugins/jquery/jquery-2.1.3.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/pace-master/pace.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/jquery-blockui/jquery.blockui.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/uniform/jquery.uniform.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/waves/waves.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/3d-bold-navigation/js/main.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('/assetsb/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('/assetsb/js/modern.js') }}"></script>
        <script src="{{ asset('/assetsb/js/pages/form-wizard.js') }}"></script>



        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63697876-1', 'auto');
  ga('send', 'pageview');

</script>



       </body>
</html>