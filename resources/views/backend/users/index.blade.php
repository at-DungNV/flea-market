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
        <h2>List Users Management</h2>
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
          <table class="table table-striped jambo_table check-action" id="admin-user-index-table">
            <thead>
              <tr class="headings">
                <th>
                  <input type="checkbox" id="check-all" class="flat">
                </th>
                <th class="column-title">ID </th>
                <th class="column-title">Email </th>
                <th class="column-title">Active </th>
                <th class="column-title">Role </th>
                <th class="column-title">Created at </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="check-actions" colspan="7">
                  <a class="antoo" style="color:#fff; font-weight:500;">Number: ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
              </tr>
            </thead>

            <tbody>
              @foreach ($users as $key => $user)
              <tr class="{{ $key % 2 == 0 ? 'even' : 'odd' }} pointer">
                <td class="a-center ">
                  <input type="checkbox" class="flat" name="table_records">
                </td>
                <td class=" ">{{ $user->id }}</td>
                <td class=" ">{{ $user->email }}</td>
                <td class=" ">{{ $user->is_active == 1 ? \Config::get('common.USER_ACTIVE') : \Config::get('common.USER_BLOCKED') }}</td>
                <td class=" ">{{ $user->is_admin == 1 ? \Config::get('common.ACCOUNT_TYPE_ADMIN') : \Config::get('common.ACCOUNT_TYPE_USER') }}</td>
                <td class=" ">{{ $user->created_at }}</td>
                <td class="last">
                  <a href="{{ route('admin.user.show', [$user->id]) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                  @if (!$user->isAdmin())
                    @if ($user->is_active == 1)
                    <a data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-lock btn-xs admin-user-index-delete">
                      <i class="fa fa-lock"></i> Block
                    </a>
                    @else
                    <a data-toggle="modal" data-target="#confirm-deleting" class="btn btn-danger btn-lock btn-xs admin-user-index-delete">
                      <i class="fa fa-unlock"></i> Unblock
                    </a>
                    @endif
                  @endif
                  <input type="hidden" value="{{ $user->id }}">
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @if (count($users) > 0 )
        <!-- Modal Confirmation -->
          <div class="modal fade" id="confirm-deleting" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Block hoặc unblock người dùng</h4>
                </div>
                <div class="modal-body">
                  <h5>Bạn có muốn <span id="backend-user-index-deleting-body"></span> người dùng này không?</h5>
                </div>
                <div class="modal-footer">
                    <form action="{{ url('') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
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
    $('#admin-user-index-table').DataTable({
      fixedHeader: true
    });
    $(document).ready(function() {
        $(document).on('click',".admin-user-index-delete", function() {
            $('#backend-user-index-deleting-body').html($(this).html());
            var id = $(this).next().val();
            $('form').attr('action','user/'+id);
        });
    });
  </script>
@stop