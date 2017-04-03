<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="/bower_resources/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/bower_resources/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/bower_resources/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/bower_resources/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="/bower_resources/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/bower_resources/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/bower_resources/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatable -->
    <link href="/bower_resources/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/bower_resources/gentelella/build/css/custom.min.css" rel="stylesheet">
    
    <!-- jQuery -->
    <script src="/bower_resources/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Datatable -->
    <script src="/bower_resources/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js" charset="utf-8"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            @include('layouts.parts.backend.sidebar')

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        @include('layouts.parts.backend.navigation')
        
        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->
        
        @include('layouts.parts.backend.footer')
      </div>
    </div>

    <!-- Bootstrap -->
    <script src="/bower_resources/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_resources/gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/bower_resources/gentelella/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/bower_resources/gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/bower_resources/gentelella/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/bower_resources/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/bower_resources/gentelella/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/bower_resources/gentelella/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/bower_resources/gentelella/vendors/Flot/jquery.flot.js"></script>
    <script src="/bower_resources/gentelella/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/bower_resources/gentelella/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/bower_resources/gentelella/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/bower_resources/gentelella/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/bower_resources/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/bower_resources/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/bower_resources/gentelella/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/bower_resources/gentelella/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/bower_resources/gentelella/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/bower_resources/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/bower_resources/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/bower_resources/gentelella/vendors/moment/min/moment.min.js"></script>
    <script src="/bower_resources/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/bower_resources/gentelella/build/js/custom.min.js"></script>
	
  </body>
</html>
