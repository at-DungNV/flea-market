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

@push('stylesheet')
  <link rel="stylesheet" href="/bower_resources/jquery-ui/themes/smoothness/jquery-ui.min.css" type="text/css" media="all" />
@endpush


@section('content')
  <div class="content-container">
    <div class="col-md-8 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1">
      <div class="title-text text-center">Edit Profile </div>
      <form action="{{ route('users.update') }}" method="POST" data-toggle="validator" role="form" class="form-horizontal" name="user-edit-form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <div class="form-group has-feedback">
          <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="user-edit-name">Name:<span class="required">*</span></label>
          <div class="col-xs-9 col-sm-9 col-md-10">
            <input type="text" name="name" pattern="^[_ A-z0-9]{1,}$" maxlength="256" value="{{Auth::user()->name}}" class="form-control" id="user-edit-name" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="user-edit-email">Email:<span class="required">*</span></label>
          <div class="col-xs-9 col-sm-9 col-md-10">
            <input type="email" name="email" maxlength="256" value="{{Auth::user()->email}}" class="form-control" id="user-edit-email" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <label class="col-xs-3 col-sm-3 col-md-2 control-label">Gender:<span class="required">*</span></label>
          <div class="col-xs-9 col-sm-9 col-md-10">
            <label class="radio-inline" for="user-edit-gender-male">
              <input type="radio" name="gender" id="user-edit-gender-male" value="{{ \Config::get('common.MALE_GENDER') }}" required
                {{Auth::user()->gender == \Config::get('common.MALE_GENDER') ? 'checked' : ''}}>Male
            </label>
            
            <label class="radio-inline" for="user-edit-gender-female">
              <input type="radio" name="gender" id="user-edit-gender-female" value="{{ \Config::get('common.FEMALE_GENDER') }}" required
                {{Auth::user()->gender == \Config::get('common.FEMALE_GENDER') ? 'checked' : ''}}>Female
            </label>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="user-edit-birthday">Birthday:<span class="required">*</span></label>
          <div class="col-xs-9 col-sm-9 col-md-10">
            <input type="text" name="birthday" value="{{ date("d/m/Y", strtotime(Auth::user()->birthday)) }}" class="form-control" id="user-edit-birthday" required
              pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$">
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="user-edit-phone">Phone:<span class="required">*</span></label>
          <div class="col-xs-9 col-sm-9 col-md-10">
            <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="user-edit-phone" pattern="^[0-9]{1,11}$" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="user-edit-address">Address:<span class="required">*</span></label>
          <div class="col-xs-9 col-sm-9 col-md-10">
            <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" id="user-edit-address" required>
            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-xs-12 col-md-3 col-md-offset-3">
            <a href="#" class="btn btn-warning btn-lg btn-block">Cancel</a>
          </div>
          <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-lg btn-block" name="user-edit-submit">Confirm</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('end-page-scripts')
<script src="/bower_resources/jquery-ui/jquery-ui.min.js" charset="utf-8"></script>
<script src="/bower_resources/bootstrap-validator/dist/validator.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $("a[name='user-edit-submit']").click(function() {
    $("form[name='user-edit-form']").submit();
  });
  $('#user-edit-birthday').datepicker({ dateFormat: 'dd/mm/yy' });
</script>
@endpush
