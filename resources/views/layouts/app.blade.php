<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/myapp.css">
    <link rel="stylesheet" href="/bower_resources/bootstrap/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div id="wrapper">
      <div id="main">
        <div class="inner">
          @include('layouts.parts.header')
          <!-- content -->
          @yield('content')
          <!-- end content -->
          @include('layouts.parts.footer')
        </div>
      </div>
      <div id="sidebar">
        @include('layouts.parts.sidebar')
      </div>
    </div>
    <!-- jQuery -->
    <script src="/bower_resources/jquery/dist/jquery.min.js"></script>
    <!-- skel -->
    <script src="/bower_resources/skel/dist/skel.min.js"></script>
    <!-- util -->
    <script src="/bower_resources/util/util.min.js"></script>
    <!-- bootstrap -->
    <script src="/bower_resources/bootstrap/dist/js/bootstrap.min.js"></script>
    @stack('end-page-scripts')
    <!-- main -->
    <script src="/js/app.js"></script>
  </body>
</html>
