@extends('layouts.backend.app')

@section('content')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>List Posts Management</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
        <div class="table-responsive">
          <table class="table table-striped" id="admin-post-index-table">
            <thead>
              <tr class="headings">
                <th>
                  <input type="checkbox" id="check-all" class="icheckbox_flat-green">
                </th>
                <th class="column-title">ID </th>
                <th class="column-title">Created Date </th>
                <th class="column-title">Type </th>
                <th class="column-title">Created By </th>
                <th class="column-title">Status </th>
                <th class="column-title">Amount </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="7">
                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
              </tr>
            </thead>

            <tbody>
              @foreach ($posts as $key => $post)
              <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }} pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">{{ $post->id }}</td>
                <td class=" ">{{ $post->created_at }}</td>
                <td class=" ">{{ $post->type }}</td>
                <td class=" ">{{ $post->user->name }}</td>
                <td class=" ">{{ $post->state }}</td>
                <td class="a-right a-right ">{{ number_format ( $post->price  , 0 , "." , "." ) }} VNĐ</td>
                <td class="last">
                  <a href="#">View</a>
                  <a href="#">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <script type="text/javascript">
  $('#admin-post-index-table').DataTable({
        fixedHeader: true
      });

  </script>
@stop