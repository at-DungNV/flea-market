<!-- Header -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Flea-Market</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
              
              <li class="dropdown {{ Request::is('posts/*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Post <b class="caret"></b></a>
                <ul class="dropdown-menu">
                     <li class="dropdown-plus-title">
                        Post
                        <b class="pull-right glyphicon glyphicon-chevron-up"></b>
                    </li>
                    <li><a href="{{ route('posts.index') }}">Index</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('posts.create') }}">Create</a></li>
                </ul>
              </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
              <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
              <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ url('/register') }}">Register</a></li>
            @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="img-rounded profile-img"></div>
                    <span>
                      {{ str_limit(Auth::user()->name, $limit= 10, $end= '...') }}
                      <b class="caret"></b>
                    </span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-plus-title">
                      <div class="img-rounded profile-img"></div>
                      <span>
                        {{ str_limit(Auth::user()->name, $limit= 10, $end= '...') }}
                        <b class="pull-right glyphicon glyphicon-chevron-up"></b>
                      </span>
                    </li>
                    <li><a href="#">Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('users.profile') }}">Profile<span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                    <li class="divider"></li>
                    <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
                    <li class="divider"></li>
                    <li>
                      <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                  </ul>
              </li>
            @endif

          </ul>
      </div>
  </div>
</nav>