<!DOCTYPE html>
<html>
    <head>
       
       
       
       
        <meta charset="utf-8">
        <title>Concorde / @yield('PageTitle')</title>
        <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
            <!-- Theme CSS -->
            <link rel="stylesheet" type="text/css" href="{{ asset('/assets/skin/default_skin/css/theme.css') }}">
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="{{ secure_asset('assets/frontend/css/font-icons.css') }}" type="text/css" />
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->
<link rel="apple-touch-icon" href="{{ asset('/assets/img/favicons/apple-icon.png') }}"/>
<link rel="apple-touch-startup-image" href="{{ asset('/assets/img/favicons/apple-icon-180x180.png') }}" />
<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/assets/img/favicons/apple-icon-57x57.png') }}">
<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/assets/img/favicons/apple-icon-60x.png') }}">
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
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="white" />
       
       
        </head>
        <body>
            <!-- Start: Main -->
            <div id="main">
                <!-- Start: Header -->
                <header class="navbar navbar-fixed-top bg-light">
                    <div class="navbar-branding">
                        <a class="navbar-brand" href="dashboard.html">
                        <b>Concorde</b>Express
                        </a>
                        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
                    </div>
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a class="topbar-menu-toggle" href="#">
                            Menu
                            </a>
                        </li>
                        <li>
                            <a class="" href="{{ url('/')}}">
                            Front
                            </a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left navbar-search" role="search" method="POST" action="/shipment/">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search..." value="">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">{{ Auth::user()->name }}  <span class="caret caret-tp hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="animated animated-short fadeInUp">
                                <span class="fa fa-envelope"></span> Messages
                                <span class="label label-warning">2</span>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ url('settings') }}" class="animated animated-short fadeInUp">
                                <span class="fa fa-gear"></span> Account Settings </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ url('/auth/logout') }}" class="animated animated-short fadeInUp">
                                <span class="fa fa-power-off"></span> Logout </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </header>
            <!-- End: Header -->
            <!-- Start: Sidebar -->
            <aside id="sidebar_left" class="nano nano-primary hidden-print affix">
                <!-- Start: Sidebar Left Content -->
                <div class="sidebar-left-content nano-content">
                    <!-- Start: Sidebar Header -->
                    <!-- End: Sidebar Header -->
                    <!-- Start: Sidebar Menu -->
                    <ul class="nav sidebar-menu">
                        <li class="sidebar-label pt20">Menu</li>
                        <li class="active">
                            <a href="/home">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-label pt15">Shipping</li>
                        <li>
                            <a class="accordion-toggle" href="#">
                            <span class="glyphicon glyphicon-credit-card "></span>
                            <span class="sidebar-title">Shipment</span>
                            <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="/shipping">
                                    <span class="glyphicon glyphicon-book"></span> View</a>
                                </li>
                                <li>
                                    <a href="/shipping/book">
                                    <span class="glyphicon glyphicon-modal-window"></span> Book </a>
                                </li>
                            </li>
                        </ul>
                    <li class="sidebar-label pt15">Settings</li>
                        <li>
                            <a class="accordion-toggle" href="#">
                            <span class="glyphicon glyphicon-credit-card "></span>
                            <span class="sidebar-title">Settings</span>
                            <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="{{ url('/settings') }}">
                                    <span class="glyphicon glyphicon-book"></span> Main</a>
                                </li>                          
                            </li>
                    </ul>
                </div>
                <!-- End: Sidebar Left Content -->
            </aside>
            <!-- Start: Content-Wrapper -->
            <section id="content_wrapper">
                <!-- Start: Topbar-Dropdown -->
                <div id="topbar-dropmenu">
                    <div class="topbar-menu row">
                        <div class="col-xs-4 col-sm-2">
                            <a href="#" class="metro-tile">
                            <span class="metro-icon glyphicon glyphicon-inbox"></span>
                            <p class="metro-title">Messages</p>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <a href="#" class="metro-tile">
                            <span class="metro-icon glyphicon glyphicon-user"></span>
                            <p class="metro-title">Users</p>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <a href="#" class="metro-tile">
                            <span class="metro-icon glyphicon glyphicon-headphones"></span>
                            <p class="metro-title">Support</p>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <a href="#" class="metro-tile">
                            <span class="metro-icon fa fa-gears"></span>
                            <p class="metro-title">Settings</p>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <a href="#" class="metro-tile">
                            <span class="metro-icon glyphicon glyphicon-facetime-video"></span>
                            <p class="metro-title">Videos</p>
                            </a>
                        </div>
                        <div class="col-xs-4 col-sm-2">
                            <a href="#" class="metro-tile">
                            <span class="metro-icon glyphicon glyphicon-picture"></span>
                            <p class="metro-title">Pictures</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End: Topbar-Dropdown -->
                <!-- Start: Topbar -->
                <header id="topbar">
                    <div class="topbar-left">
                        <ol class="breadcrumb">
                            <li class="crumb-active">
                                <a>@yield('PageTitle')</a>
                            </li>
                        </ol>
                    </div>
                </header>
                <!-- End: Topbar -->
                <!-- Begin: Content -->
                <section id="content" class="animated fadeIn">
                    @yield('content')
                </section>
                <!-- End: Content -->
            </section>
        </div>
        <!-- End: Main -->
        <!-- BEGIN: PAGE SCRIPTS -->
        <!-- jQuery -->
        <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
        <script src="{{ asset('/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>
        <!-- Theme Javascript -->
        <script src="{{ asset('/assets/js/utility/utility.js') }}"></script>
        <script src="{{ asset('/assets/js/demo/demo.js') }}"></script>
        <script src="{{ asset('/assets/js/main.js') }}"></script>
        <script type="text/javascript">
                            jQuery(document).ready(function() {
                                    // Init Theme Core
                                Core.init();
                                Demo.init();

                            });
        </script>
        <!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//ambasana.co.uk/piwik/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//ambasana.co.uk/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

        
        <!-- END: PAGE SCRIPTS -->
    </body>
</html>