<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/images/small-logo-01.png">
    <title>@lang('common.app_name_frontend')</title>

    <link rel="stylesheet" href="/bower_resources/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bower_resources/font-awesome/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/mystyle.css">
    <script src="/bower_resources/jquery/dist/jquery.min.js"></script>
    @stack('stylesheet')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
  <body>
    <!-- HEADER -->
    @include('layouts.parts.header')
    
    <!-- NAVBAR -->

    <div id="wrapper-navbar">
  		<div class="navbar object">
    		<div id="wrapper-sorting">
          @yield('breadcrumb')
        </div>
    	</div>
    </div>

    <!-- MENU -->	

  	<div id="main-container-menu" class="object">
    	<div class="container-menu">
        <div id="main-cross">
        	<div id="cross-menu"></div>
        </div>
            
        <div id="main-small-logo">
        	<div class="small-logo"></div>
        </div>
        <div class="responsive-menu-container">
            <div class="item"><a href="#">{{trans('common.label_home')}}</a></div>
        </div>
        
        <div class="responsive-menu-container">
            <div class="item"><a href="#">{{trans('common.label_post_index')}}</a></div>
        </div>
        
        <div class="responsive-menu-container">
            <div class="item"><a href="#">{{trans('common.label_post_create')}}</a></div>
        </div>
        
        @if (Auth::guest())
        <div class="responsive-menu-container">
            <div class="item">
              <a href="{{ url('/login') }}">{{trans('common.label_login')}}</a>
            </div>
        </div>
        <div class="responsive-menu-container">
            <div class="item">
              <a href="{{ url('/register') }}">{{trans('common.label_register')}}</a>
            </div>
        </div>
        <div id="notification"></div>
        @else
        <div class="responsive-menu-container">
            <div class="item"><a href="{{ route('users.profile') }}">{{trans('common.label_profile')}}</a></div>
        </div>
        
        <div class="responsive-menu-container">
            <div class="item">
              <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{trans('common.label_logout')}}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
        </div>
        @endif
            
      </div>
    </div>


    <!-- PORTFOLIO -->

  	<div id="wrapper-container">
      @yield('errors-message')
      @yield('susscess-message')
      @yield('content')
      
  		@include('layouts.parts.footer')
      
      
      

    </div>

    <!-- SCRIPT -->
  	<script type="text/javascript" src="/bower_resources/fastclick/lib/fastclick.js"></script>
  	<script type="text/javascript" src="/bower_resources/jquery-color-animation/jquery.animate-colors.js"></script>
  	<script type="text/javascript" src="/bower_resources/jquery-shadow-animation/jquery.animate-shadow-min.js"></script>    
    <script type="text/javascript">
      var urlPostShow = "{{ url('/post') }}";
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- main -->
  	<script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/mymain.js"></script>
    
    @stack('end-page-scripts')
  </body>
</html>
