<div id="wrapper-header">
  <div id="main-header" class="object">
    <div class="logo"><img src="/images/2.png" alt="logo platz" height="38" width="90"></div>
    
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
        

        @if (Auth::guest())
          <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">Login</a></li>
          <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ url('/register') }}">Register</a></li>
          <div id="notification"></div>
        @else
          <li class="dropdown dropdown-large" id="notification">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope fa-1x" aria-hidden="true"></i>
              <span class="badge" id="notification-count" style="background-color: #f00 !important; font-size: 16px;">{{ Auth::user()->unread_notification }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-large">
              <notification-log :notifications="notifications"></notification-log>
            </ul>
            
          </li>  
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <div class="img-rounded profile-img"></div>
                <span>
                  {{ str_limit(Auth::user()->name, $limit= 10, $end= '...') }}
                  <b class="caret"></b>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('users.profile') }}">Profile<span class="glyphicon glyphicon-stats pull-right"></span></a></li>
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
    
    
    
    
    <div id="stripes"></div>
  </div>
</div>

<script type="text/javascript">
  var id = "{{Auth::user()->id}}";
  console.log(id);
</script>

