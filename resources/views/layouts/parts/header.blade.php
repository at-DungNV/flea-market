<div id="wrapper-header">
  <div id="main-header" class="object">
    <div class="logo"><img src="/images/logo.png" alt="logo platz"></div>
    
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-large">
          <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">{{trans('common.label_home')}}</a></li>
          <li class="dropdown-toggle" data-toggle="dropdown"><a href="{{ url('/') }}">{{trans('common.label_category')}}</a></li>
          <ul class="dropdown-menu dropdown-menu-large row">
            @foreach ($categories->chunk(count($categories)/2) as $categories)
              <li class="col-sm-6">
                <ul>
                  @foreach ($categories as $category)
                  <li class="dropdown-header">{{$category->name}}</li>
                    @foreach ($category->children as $child)
                    <li><a href="{{ route('posts.index')}}?category={{$child->slug}}">{{$child->name}}</a></li>
                    @endforeach
                  <li class="divider"></li>
                  @endforeach
                </ul>
              </li>
            @endforeach
          </ul>
          
        </li>
        <li class="dropdown {{ Request::is('posts/*') ? 'active' : '' }}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{trans('common.label_post')}} <b class="caret"></b></a>
          <ul class="dropdown-menu">
              <li><a href="{{ route('posts.index') }}">{{trans('common.label_post_index')}} <span class="glyphicon glyphicon-list pull-right"></span></a></li>
              <li class="divider"></li>
              <li><a href="{{ route('posts.create') }}">{{trans('common.label_post_create')}} <span class="glyphicon glyphicon-plus pull-right"></span></a></li>
          </ul>
        </li>
        

        @if (Auth::guest())
          <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">{{trans('common.label_login')}}</a></li>
          <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ url('/register') }}">{{trans('common.label_register')}}</a></li>
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
            <form class="" action="" method="post" name="notification-form">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
            </form>
          </li>  
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if (Auth::user()->facebook_id)
                  <div class="img-rounded profile-img" style="background: url({{ Auth::user()->avatar }}) 10% 10% no-repeat;"></div>
                @else
                  <div class="img-rounded profile-img" style="background: url(/images/{{ Auth::user()->avatar }}) 50% 50% no-repeat;"></div>
                @endif
                <span>
                  {{ str_limit(Auth::user()->name, $limit= 10, $end= '...') }}
                  <b class="caret"></b>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('users.profile') }}">{{trans('common.label_profile')}}<span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                <li class="divider"></li>
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{trans('common.label_logout')}} <span class="glyphicon glyphicon-log-out pull-right"></span>
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
  var id="";
  var user = {!! json_encode(auth()->user()) !!};
  if (user != null) {
    id = user['id'];
  }
</script>

