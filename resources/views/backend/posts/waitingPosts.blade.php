@extends('layouts.backend.app')
@section('errors-message')
    @include('common.errors')
@stop

@section('susscess-message')
    @include('common.success')
@stop
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
        @yield('errors-message')
        @yield('susscess-message')
        <div class="table-responsive">
          <table class="table table-striped jambo_table check-action" id="admin-post-index-table">
            <thead>
              <tr class="headings">
                <th>
                  <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">ID </th>
                <th class="column-title">Created Date </th>
                <th class="column-title">Type </th>
                <th class="column-title">Created By </th>
                <th class="column-title">Status </th>
                <th class="column-title">Amount </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="check-actions" colspan="7">
                  <a class="antoo" style="color:#fff; font-weight:500;">check Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
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
                <td class="a-right a-right ">{{ number_format ( $post->price  , 0 , "." , "." ) }} {{trans('common.label_currency')}}</td>
                <td class="last">
                  <a href="{{ route('admin.post.show', [$post->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                  <a data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-xs admin-post-index-delete">
                    <i class="fa fa-trash-o"></i> Delete
                  </a>
                  <input id="post_id" type="hidden" value="{{ $post->id }}">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @if (count($posts) > 0 )
        <!-- Modal Confirmation -->
          <div class="modal fade" id="confirm-deleting" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">xoa bai dang</h4>
                </div>
                <div class="modal-body">
                  <h5>ban co muon xoa khong</h5>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('$post->id') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">xoa</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $('#admin-post-index-table').DataTable({
      fixedHeader: true
    });
    $(document).ready(function() {
        $(document).on('click',".admin-post-index-delete", function() {
            var id = $(this).next().val();
            $('form').attr('action','post/'+id);
        });
    });
  </script>
@stop