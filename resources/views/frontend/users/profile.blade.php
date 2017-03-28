@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('errors-message')
    @include('common.errors')
@stop

@section('susscess-message')
    @include('common.success')
@stop


@section('content')
  <div class="content-container">
    <div class="content">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <div class="list-group">
          <span href="#" class="list-group-item active" align="center">
            Thông tin Cá nhân
          </span>
          <a href="{{ route('users.profile') }}" class="list-group-item">
            <i class="fa fa-user-circle" aria-hidden="true">
            </i> Profile
          </a>
          <a href="{{ route('users.approvalPosts') }}" class="list-group-item">
            <i class="fa fa-money" aria-hidden="true"></i> Đang bán
          </a>
          <a href="{{ route('users.rejectedPosts') }}" class="list-group-item">
            <i class="fa fa-window-close-o" aria-hidden="true"> Bị từ chối</i>
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-envelope-open" aria-hidden="true"></i> Notification
          </a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 " align="center">
        <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">
      </div>
      
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
        <div class="row">
          <table class="table table-user-information">
            <tbody>
              <tr>
                <td>Name:</td>
                <td>{{ Auth::user()->name }}</td>
              </tr>
              <tr>
                <td>Email:</td>
                <td>{{ Auth::user()->email }}</td>
              </tr>
              <tr>
                <td>Gender:</td>
                <td>{{ Auth::user()->gender == 1 ? 'Male':'Female' }}</td>
              </tr>
              <tr>
                <td>Birthday:</td>
                <td>{{ date("d/m/Y", strtotime(Auth::user()->birthday)) }}</td>
              </tr>
              <tr>
                <td>Address:</td>
                <td>{{ Auth::user()->address }}</td>
              </tr>
                <td>Phone:</td>
                <td>{{ Auth::user()->phone }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1">
            <a href="{{ route('users.edit', [Auth::user()->email]) }}" class="btn btn-primary btn-lg btn-block">Edit profile</a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <a href="#" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#user-profife-edit-modal">Change password</a>
            
            <!-- Modal -->
            <div class="modal fade" id="user-profife-edit-modal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <span type="button" class="close" data-dismiss="modal">&times;</span>
                    <h4 class="modal-title">Change password</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('users.updatePassword') }}" method="POST" name="user-edit-password-form">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="user-profile-current-password">Old password:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="current_password" id="user-profile-current-password" placeholder="Enter current password...">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="user-profile-new-password">New password:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="password" id="user-profile-new-password" placeholder="Enter new password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="user-profile-comfirmation-password">Retype password:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="password_confirmation" id="user-profile-comfirmation-password" placeholder="Enter confirmation password...">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer align-center">
                    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-offset-3 col-md-offset-3">
                      <a href="" class="btn btn-warning btn-lg btn-block" data-dismiss="modal">Close</a>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                      <a href="" name="user-edit-password-submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#user-profife-edit-modal">Confirm</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End modal -->
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('end-page-scripts')
<script type="text/javascript">
  $("a[name='user-edit-password-submit']").click(function() {
    $("form[name='user-edit-password-form']").submit();
  });
</script>
@endpush
