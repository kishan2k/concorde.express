
<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Concorde / Login</title>
  <meta name="keywords" content="Concorde Express" />
  <meta name="description" content="Concorde Express">
  <meta name="author" content="Kishan Ambasana">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/skin/default_skin/css/theme.css') }}">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin-tools/admin-forms/css/admin-forms.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

  <!-- Start: Main -->
  <div id="main" class="animated fadeIn">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- begin canvas animation bg -->
      <div id="canvas-wrapper">
        <canvas id="demo-canvas"></canvas>
      </div>

      <!-- Begin: Content -->
      <section id="content">

        <div class="admin-form" style="max-width: 450px;">


      @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              
            </div>
          @endif

           
            <!-- end .form-header section -->
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">

              <div class="panel-body bg-light">
                <div class="row">
                  <div class="col-sm-16 ">


                    <div class="section">
                      <label for="email" class="field-label text-muted fs18 mb10">Email</label>
                      <label for="email" class="field prepend-icon">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="gui-input" placeholder="Enter Email">
                        <label for="email" class="field-icon">
                          <i class="fa fa-user"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                      <label for="username" class="field-label text-muted ">Password</label>
                      <label for="password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input form-control" placeholder="Enter password">
                        <label for="password" class="field-icon">
                          <i class="fa fa-lock"></i>
                        </label>
                      </label>
                    </div>
                    <!-- end section -->

                  </div>
                  
                </div>
              </div>
              <!-- end .form-body section -->
              <div class="panel-footer clearfix p10 ph15">
                <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                <label class="switch block switch-primary pull-left input-align mt10">
                  <input type="checkbox" name="remember" id="remember" checked>
                  <label for="remember" data-on="YES" data-off="NO"></label>
                  <span>Remember me</span>
                </label>
              </div>
              <!-- end .form-footer section -->
            </form>

        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('/vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ asset('/vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

  <!-- CanvasBG Plugin(creates mousehover effect) -->
  <script src="{{ asset('/vendor/plugins/canvasbg/canvasbg.js') }}"></script>

  <!-- Theme Javascript -->
  <script src="{{ asset('/assets/js/utility/utility.js') }}"></script>

  <script src="{{ asset('/assets/js/main.js') }}"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core      
    Core.init();

  

    // Init CanvasBG and pass target starting location
    CanvasBG.init({
      Loc: {
        x: window.innerWidth / 5,
        y: window.innerHeight / 3.3
      },
    });

  });
  </script>

  <!-- END: PAGE SCRIPTS -->
        
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
