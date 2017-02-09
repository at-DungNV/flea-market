<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/bower_resources/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bower_resources/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/myapp.css">
    @stack('stylesheet')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
  <body>
    @include('layouts.parts.header')
    <div id="wrapper" class="container">
      <div id="main">
          <header id="header">
            @yield('breadcrumb')
          </header>
          <!-- content -->
          @yield('errors-message')
          @yield('susscess-message')
          @yield('content')
          <!-- end content -->
          @include('layouts.parts.footer')
      </div>
      <!-- sidebar -->
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











<!--


@if (Auth::guest())
  <a href="{{ url('/login') }}">Login</a>
  <a href="{{ url('/register') }}">Register</a>
@else
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>


                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>


@endif -->
