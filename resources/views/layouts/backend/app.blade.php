<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Flea Market Management</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/bower_resources/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="/bower_resources/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Datatable -->
    <link href="/bower_resources/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/bower_resources/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/bower_resources/gentelella/build/css/custom.min.css" rel="stylesheet">
    
    <link href="/css/admin/app.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/bower_resources/jquery/dist/jquery.min.js"></script>
    <!-- Datatable -->
    <script src="/bower_resources/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js" charset="utf-8"></script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>FM Management</span></a>
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
    <script src="/bower_resources/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/bower_resources/gentelella/vendors/iCheck/icheck.min.js" charset="utf-8"></script>

    <!-- Custom Theme Scripts -->
    <script src="/bower_resources/gentelella/build/js/custom.min.js"></script>
    <script src="/js/admin/app.js" charset="utf-8"></script>
  </body>
</html>
