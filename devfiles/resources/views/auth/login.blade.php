<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kishan Ambasana">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('/assets\fonts\font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-select.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/jquery.slider.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.transitions.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}" type="text/css">
    <title>Concorde Express | Login</title>


	
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


</head>

<body class="page-sub-page page-sign-in page-account" id="page-top">
<!-- Wrapper -->
<div class="wrapper">

    <div class="navigation">
        <div class="secondary-navigation">
            <div class="container">
                <div class="contact">
                    <figure><strong>Phone:</strong>07769481010</figure>
                    <figure><strong>Email:</strong>info@concorde.express</figure>
                </div>
                <div class="user-area">
                    <div class="actions">
                        <a href="auth/login" class="promoted">Sign In</a>
                    </div>                    
                </div>
            </div>
        </div>
        <div class="container">
            <header class="navbar" id="top" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="#"><img src="https://res.cloudinary.com/concorde-express/image/upload/v1436185350/logo_vnp80k.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav><!-- /.navbar collapse-->
                
            </header><!-- /.navbar -->
        </div><!-- /.container -->
    </div><!-- /.navigation -->


<div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Sign In</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
              
            <header><h1>Sign In</h1></header>
            <div class="row">
                @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              
                @foreach ($errors->all() as $error)
                  {{ $error }}
                @endforeach
              
            </div>
          @endif
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <form role="form" method="POST" action="{{ url('/auth/login') }}">
                        <div class="form-group">
                            <label for="form-create-account-email">Email:</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email">
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-create-account-password">Password:</label>
                            <input type="password" class="form-control" id="form-create-account-password" name="password">
                        </div><!-- /.form-group -->
                        <div class="form-group clearfix">
                            <label class="switch block switch-primary pull-left input-align mt10">
                  <input type="checkbox" name="remember" id="remember" checked>
                  <label for="remember" data-on="YES" data-off="NO"></label>
                  <span>Remember me</span>
                </label>
                            <button type="submit" class="btn pull-right btn-default" id="account-submit">Sign to My Account</button>
                        </div><!-- /.form-group -->

                    </form>
                    <hr>
                    
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>













    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-3">
                            <article>
                                <h3>About Us</h3>
                                <p>Concorde Express allows businesses and individuals to compare quotes for cheap courier services for deliveries within the UK, European and Worldwide destinations.

We use reputable couriers such as  DHL, Parcelforce, Interlink, UPS, Fedex and others to offer a variety of next day, premium, economy, door to door, collection and drop-off courier services at the cheapest shipping rates.
                                </p>
                                <hr>
                                <a href="#" class="link-arrow">Read More</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Contact</h3>
                                <address>
                                    <strong>Concorde Express</strong><br>
                                    66A Cannon Street<br>
                                    Leicester<br>
                                    LE4 6GQ<br>United Kingdom
                                </address>
                                +44 7788859991<br>
                                <a href="#">info@concordexpress.uk</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Useful Links</h3>
                                <ul class="list-unstyled list-links">
                                    <li><a href="#">All Properties</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Login and Register Account</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                </ul>
                            </article>
                        </div><!-- /.col-sm-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </aside><!-- /#footer-main -->
            <aside id="footer-thumbnails" class="footer-thumbnails"></aside><!-- /#footer-thumbnails -->
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © 2015. All Rights Reserved.</span>

                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->
</div>

<div id="overlay"></div>

<script type="text/javascript" src="{{asset('/assets/js/jquery-2.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/smoothscroll.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jquery.placeholder.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jquery.vanillabox-0.1.5.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/retina-1.1.0.min.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jshashtable-2.1_src.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jquery.numberformatter-1.2.3.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/tmpl.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jquery.dependClass-0.1.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/draggable-0.1.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jquery.slider.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/custom.js') }}"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->
<script>
    $(window).load(function(){
        initializeOwl(false);
    });
</script>
</body>
</html>