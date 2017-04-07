<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
      <li>
        <a><i class="fa fa-home"></i> Home</a>
      </li>
      <li><a><i class="fa fa-edit"></i> Post Management <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('admin.post.index') }}">list</a></li>
          <li><a href="{{ route('admin.post.waiting') }}">waiting posts</a></li>
          <li><a href="{{ route('admin.post.rejected') }}">rejected posts</a></li>
          <li><a href="{{ route('admin.post.approval') }}">approval posts</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-desktop"></i> User Management <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="general_elements.html">list</a></li>
          <li><a href="media_gallery.html">blocked users</a></li>
        </ul>
      </li>
    </ul>
  </div>

</div>
<!-- /sidebar menu -->