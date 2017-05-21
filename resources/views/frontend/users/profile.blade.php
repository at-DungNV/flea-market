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
            {{trans('users.label_profile')}}
          </span>
          <a href="{{ route('users.profile') }}" class="list-group-item list-group-item-success">
            <i class="fa fa-user-circle" aria-hidden="true">
            </i> {{trans('users.label_info')}}
          </a>
          <a href="{{ route('users.show.posts') }}" class="list-group-item">
            <i class="fa fa-money" aria-hidden="true"></i> {{trans('users.label_posts')}}
          </a>
          
          <a class="list-group-item" data-toggle="collapse" data-target="#frontend-user-profile-update-image-container">
            <i class="fa fa-file-image-o" aria-hidden="true"></i> Cập nhật ảnh đại diện <i class="fa fa-sort-desc" aria-hidden="true"></i>
          </a>
          <div id="frontend-user-profile-update-image-container" class="collapse well">
            <form class="avatar-form" action="{{ route('users.profile') }}" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <input class="avatar-input" id="imgInp" name="image" type="file" required="required" style="max-width: 216px !important;">
              </div>
              <div class="row">
                  <button class="btn btn-primary btn-block avatar-save" type="submit"> confirm </button>
              </div>
            </form>
          </div>




        </div>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 " align="center" id="frontend-user-profile-image-container">
        @if(Auth::user()->facebook_id != null)
        <img alt="User Pic" src="{{ Auth::user()->avatar }}" class="img-circle img-responsive">
        @else
        <img alt="User Pic" src="{{ Auth::user()->avatar }}" class="img-circle img-responsive">
        @endif
        
        
        
        
        
        
        
      </div>
      
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
        <div class="row">
          <table class="table table-user-information">
            <tbody>
              <tr>
                <td>{{trans('users.label_name')}}:</td>
                <td>{{ Auth::user()->name }}</td>
              </tr>
              <tr>
                <td>{{trans('users.label_email')}}:</td>
                <td>{{ Auth::user()->email }}</td>
              </tr>
              <tr>
                <td>{{trans('users.label_gender')}}:</td>
                <td>{{ Auth::user()->gender == 1 ? 'Male':'Female' }}</td>
              </tr>
              <tr>
                <td>{{trans('users.label_birthday')}}:</td>
                <td>{{ date("d/m/Y", strtotime(Auth::user()->birthday)) }}</td>
              </tr>
              <tr>
                <td>{{trans('users.label_address')}}:</td>
                <td>{{ Auth::user()->address }}</td>
              </tr>
                <td>{{trans('users.label_phone')}}:</td>
                <td>{{ Auth::user()->phone }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1">
            <a href="{{ route('users.edit', [Auth::user()->email]) }}" class="btn btn-primary btn-lg btn-block">{{trans('common.button_update')}}</a>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-5">
            <a href="#" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#user-profife-edit-modal">{{trans('users.button_change_password')}}</a>
            
            <!-- Modal -->
            <div class="modal fade" id="user-profife-edit-modal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <span type="button" class="close" data-dismiss="modal">&times;</span>
                    <h4 class="modal-title">{{trans('users.label_change_password')}}</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('users.updatePassword') }}" method="POST" name="user-edit-password-form">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="user-profile-current-password">{{trans('users.label_current_password')}}:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="current_password" id="user-profile-current-password" placeholder="Enter current password...">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="user-profile-new-password">{{trans('users.label_new_password')}}:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="password" id="user-profile-new-password" placeholder="Enter new password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-sm-3" for="user-profile-comfirmation-password">{{trans('users.label_retype_password')}}:</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="password_confirmation" id="user-profile-comfirmation-password" placeholder="Enter confirmation password...">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer align-center">
                    <div class="col-xs-6 col-sm-3 col-md-3 col-sm-offset-3 col-md-offset-3">
                      <a href="" class="btn btn-warning btn-lg btn-block" data-dismiss="modal">{{trans('common.button_cancel')}}</a>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                      <a href="" name="user-edit-password-submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#user-profife-edit-modal">{{trans('common.button_confirm')}}</a>
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
  
  console.log($('#frontend-user-profile-image-container').find('img'));
  
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              $('#frontend-user-profile-image-container').find('img').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
      }
  }
  
  $("#imgInp").change(function(){
      readURL(this);
  });
</script>
@endpush
