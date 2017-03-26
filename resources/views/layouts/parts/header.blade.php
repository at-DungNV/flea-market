<div id="wrapper-header">
  <div id="main-header" class="object">
    <div class="logo"><img src="/images/logo-burst.png" alt="logo platz" height="38" width="90"></div>
    
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
        
        <li class="dropdown {{ Request::is('posts/*') ? 'active' : '' }}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Post <b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a href="{{ route('post.index') }}">Index <span class="glyphicon glyphicon-list pull-right"></span></a></li>
              <li class="divider"></li>
              <li><a href="{{ route('post.create') }}">Create <span class="glyphicon glyphicon-plus pull-right"></span></a></li>
          </ul>
        </li>
            
        <li id="notification">
          <span id="notification_count">0</span>
          <a href="#" id="notificationLink"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i></a>
          <div id="notificationContainer">
            <div id="notificationTitle">Notifications</div>
            <div id="notificationsBody" class="notifications">
              <notification-log :notifications="notifications"></notification-log>
            </div>
            <div id="notificationFooter"><a href="#">See All</a></div>
          </div>
        </li>

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
    </div><!-- /.navbar-collapse -->
    
    
    
    
    <div id="stripes"></div>
  </div>
</div>

