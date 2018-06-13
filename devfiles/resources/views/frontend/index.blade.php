<!DOCTYPE html>

<html lang="en-UK">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kishan Ambasana">

    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="assets\fonts\font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets\css\bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="assets\css\jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="assets\css\owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets\css\owl.transitions.css" type="text/css">
    <link rel="stylesheet" href="assets\css\style.css" type="text/css">
    <link rel="stylesheet" href="assets\css\animate.css" type="text/css">
    <title>Concorde Express | Home</title>
    <meta name="description" content="Send from just £6.99 (Inc VAT) today! Choose from UK &amp; international parcel delivery services, and book online today.">
    <meta name="keywords" content="parcel delivery, send a parcel, courier, send a parcel, city link, dhl, parcelforce, royal mail, cheap parcels, low cost, "/>
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="https://concorde.express/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://concorde.express/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://concorde.express/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://concorde.express/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="https://concorde.express/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://concorde.express/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://concorde.express/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://concorde.express/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="https://concorde.express/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="https://concorde.express/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="https://concorde.express/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="https://concorde.express/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="https://concorde.express/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="Concorde Express"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="https://concorde.express/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="https://concorde.express/favicon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="https://concorde.express/favicon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="https://concorde.express/favicon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="https://concorde.express/favicon/mstile-310x310.png" />
    


</head>

<body class="page-homepage navigation-fixed-top page-slider page-slider-search-box" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90">

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
                        @if (Auth::check())
                        <a href="auth/logout" class="promoted">Sign Out</a>
                        <a href="/home" class="promoted">Dashboard</a>
                        @else
                        <a href="auth/login" class="promoted">Sign In</a>
                        @endif
                         
                       
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
                        <a href="/"><img src="https://res.cloudinary.com/concorde-express/image/upload/v1436185350/logo_vnp80k.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        
                        <li><a href="contact">Contact</a></li>
                    </ul>
                </nav><!-- /.navbar collapse-->
                
            </header><!-- /.navbar -->
        </div><!-- /.container -->
    </div><!-- /.navigation -->

    <!-- Slider -->
    <div id="slider" class="loading has-parallax">
        <div id="loading-icon"><i class="fa fa-cog fa-spin"></i></div>
        <div class="owl-carousel animated homepage-slider carousel-full-width">
            <div class="slide">

                <img alt="" src="https://res.cloudinary.com/concorde-express/image/upload/f_auto/v1436128056/slide-01_dy1pxm.jpg">
            </div>
            <div class="slide">
               
                <img alt="" src="https://res.cloudinary.com/concorde-express/image/upload/v1436128056/slide-03_ijwyr8.jpg">
            </div>
            <div class="slide">
                
                <img alt="" src="https://res.cloudinary.com/concorde-express/image/upload/v1436128056/slide-02_msndwm.jpg">
            </div>
        </div>
    </div>
    <!-- end Slider -->

    <!-- Search Box -->
    <div class="search-box-wrapper">
        <div class="search-box-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8">
                        <div class="search-box map">
                            <form role="form" id="form-map" class="form-search">
                                <legend>Track Your Shipment</legend>
                                <div class="form-group">
                                    <div class="pp_track_wrap" data-button-position="bottom" data-button-width="" data-button-height="default" data-button-color="#ffffff" data-button-background="#27aef2" data-button-carriers='[]' data-button-language="en" data-button-number="" data-button-hide-number="0" data-domain="button.packpin.com"></div>
                                </div>
                               
                            </form>
                            
                            <form role="form" id="form-map" method="POST" action="{{ url('quote') }}" class="form-map form-search">
                            <legend>Get Your Quote!</legend>
                                <div class="form-group">
                                    <select name="country">
                                        @include('layouts.includes.countries')                                       
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                   <div class="form-group">
                                    <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode / Zip">
                                </div>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                   <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight">
                                </div><!-- /.form-group -->
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Quote Me Now</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </div><!-- /.search-box.map -->
                    </div><!-- /.col-md-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.search-box-inner -->
    </div>
    <!-- end Search Box -->

    <!-- Page Content -->
    <div id="page-content">
        <section id="partners" class="block">
            <div class="container">
                <header class="section-title"><h2>Our Partners</h2></header>
                <div class="logos">
                    <div class="logo"><img src="https://res.cloudinary.com/concorde-express/image/upload/v1436128385/dhl_xijfdz.png" alt=""></div>
                    <div class="logo"><img src="https://res.cloudinary.com/concorde-express/image/upload/v1436128385/fedex_futngw.png" alt=""></div>
                    <div class="logo"><img src="https://res.cloudinary.com/concorde-express/image/upload/v1436128385/ups_vhg8ow.png" alt=""></div>
                    <div class="logo"><img src="https://res.cloudinary.com/concorde-express/image/upload/v1436128386/interlink_gqvwo1.png" width="150px" alt=""></div>
                    <div class="logo"><img src="https://res.cloudinary.com/concorde-express/image/upload/v1436128385/parcelforce_gtjd4s.png" alt=""></div>
                </div>
            </div><!-- /.container -->
        </section><!-- /#partners -->
        <section id="our-services" class="block">
            <div class="container">
                <header class="section-title"><h2>Our Services</h2></header>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-clock-o"></i></figure>
                            <aside class="description">
                                <header><h3>Next Day</h3></header>
                                <p>Our Next Day Service are availible within the UK and select Euopean countries. This service will deliver the shipment within 24Hours of collection.</p>
                                <a href="#" class="link-arrow">Read More</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-plane"></i></figure>
                            <aside class="description">
                                <header><h3>WorldWide Express</h3></header>
                                <p>This service will deliver the shipment within 5 days of collection. This will probably go by air but it can go by road depending on its location of delivery. </p>
                                <a href="#" class="link-arrow">Read More</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="feature-box equal-height">
                            <figure class="icon"><i class="fa fa-truck"></i></figure>
                            <aside class="description">
                                <header><h3>Economy</h3></header>
                                <p>This service is only availible for select countries, this service can take upto 5 days to deliver the shipment after collection.</p>
                                <a href="#" class="link-arrow">Read More</a>
                            </aside>
                        </div><!-- /.feature-box -->
                    </div><!-- /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /#our-services -->
        
        <aside id="advertising" class="block">
            <div class="container">
                <a href="#">
                    <div class="banner">
                        <div class="wrapper">
                            <span class="title">Are you a business owner and send over 10 Parcels a month?<br>Contact us to discuss about a new business account.</span>
                            <span class="submit">Contact Us Now!<i class="fa fa-plus-square"></i></span>
                        </div>
                    </div><!-- /.banner-->
                </a>
            </div>
        </aside>
        <section id="testimonials" class="block">
            <div class="container">
                <header class="section-title"><h2>Testimonials</h2></header>
                <div class="owl-carousel testimonials-carousel">
                    <blockquote class="testimonial">
                        <figure>
                           
                        </figure>
                        <aside class="cite">
                            <p>Thank you for your assistance in delivering this parcel.  Very efficient service.</p>
                            <footer>R Vaidya</footer>
                        </aside>
                    </blockquote>
                    <blockquote class="testimonial">
                        <figure>
                           
                        </figure>
                        <aside class="cite">
                            <p>An always reliable and efficient service, delivering and collecting on time throughout the country.</p>
                            <footer>Wayne Smith</footer>
                        </aside>
                    </blockquote>
                </div><!-- /.testimonials-carousel -->
            </div><!-- /.container -->
        </section><!-- /#testimonials -->
        
    </div>
    <!-- end Page Content -->
    <!-- Page Footer -->
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
                                <a href="about-us" class="link-arrow">Read More</a>
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
                                +44 7769481010<br>
                                <a href="mailto:info@concorde.express">info@concorde.express</a>
                            </article>
                        </div><!-- /.col-sm-3 -->
                        <div class="col-md-3 col-sm-3">
                            <article>
                                <h3>Useful Links</h3>
                                <ul class="list-unstyled list-links">
                                    <li><a href="{{ asset('/content/download/PRIVACY-POLICY.pdf') }}" target="_blank">Privacy Policy</a></li>
                                    <li><a href="#">Login and Register Account</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a  href="{{ asset('/content/download/T&C.pdf') }}" target="_blank">Terms and Conditions</a></li>
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


<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;

    js.src = "//button.packpin.com/assets/js/script_button.min.js?v=1.13";

    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'pp-jssdk'));</script>


<script type="text/javascript" src="assets\js\jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="assets\js\jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets\bootstrap\js\bootstrap.min.js"></script>
<script type="text/javascript" src="assets\js\smoothscroll.js"></script>
<script type="text/javascript" src="assets\js\owl.carousel.min.js"></script>
<script type="text/javascript" src="assets\js\bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets\js\jquery.validate.min.js"></script>
<script type="text/javascript" src="assets\js\jquery.placeholder.js"></script>
<script type="text/javascript" src="assets\js\icheck.min.js"></script>
<script type="text/javascript" src="assets\js\jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="assets\js\retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets\js\jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="assets\js\jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="assets\js\tmpl.js"></script>
<script type="text/javascript" src="assets\js\jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="assets\js\draggable-0.1.js"></script>
<script type="text/javascript" src="assets\js\jquery.slider.js"></script>
<script type="text/javascript" src="assets\js\custom.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->
<!-- Go to www.addthis.com/dashboard to customize your tools -->

<script>
  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
  })(window, document, '_gscq','script','//widgets.getsitecontrol.com/22818/script.js');
</script>
<script>
    $(window).load(function(){
        initializeOwl(false);
    });
</script>

<!-- Start of concordehelp Zendesk Widget script -->
<script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(c){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("//assets.zendesk.com/embeddable_framework/main.js","concordehelp.zendesk.com");/*]]>*/</script>
<!-- End of concordehelp Zendesk Widget script -->

</body>
</html>