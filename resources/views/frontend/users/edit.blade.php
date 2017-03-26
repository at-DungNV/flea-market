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
  <div class="content">
    <div class="col-md-8 col-sm-10 col-xs-10 col-md-offset-2 col-sm-offset-1 col-xs-offset-1">
      <form action="{{ route('users.update') }}" method="POST" class="form-horizontal" name="user-edit-form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label for="user-edit-name">Name:</label>
          <input type="text" name="name" class="form-control" id="user-edit-name" value="{{Auth::user()->name}}">
        </div>
        <div class="form-group">
          <label for="user-edit-email">Email:</label>
          <input type="text" name="email" class="form-control" id="user-edit-email" value="{{Auth::user()->email}}">
        </div>
        <div class="form-group">
          <label class="radio-button-group">Gender:</label>
  				<input type="radio" name="gender" id="user-edit-gender-male" value="{{ \Config::get('common.MALE_GENDER') }}" checked>
  				<label for="user-edit-gender-male" class="radio-button">Male</label>
  				<input type="radio" name="gender" id="user-edit-gender-female" value="{{ \Config::get('common.FEMALE_GENDER') }}">
  				<label for="user-edit-gender-female">Female</label>
        </div>
        <div class="form-group">
          <label for="user-edit-birthday">Birthday:</label>
          <input type="text" name="birthday" class="form-control" id="user-edit-birthday" value="{{Auth::user()->birthday}}">
        </div>
        <div class="form-group">
          <label for="user-edit-phone">Phone:</label>
          <input type="text" name="phone" class="form-control" id="user-edit-phone" value="{{Auth::user()->phone}}">
        </div>
        <div class="form-group">
          <label for="user-edit-address">Address:</label>
          <input type="text" name="address" class="form-control" id="user-edit-address" value="{{Auth::user()->address}}">
        </div>
        <div class="form-group">
          <div class="col-xs-12 col-md-3 col-md-offset-3">
            <a href="#" class="button btn-block icon fa-download margin-top-10">Cancel</a>
          </div>
          <div class="col-md-3">
            <a href="#" class="button btn-block special icon fa-search margin-top-10" name="user-edit-submit">Confirm</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('end-page-scripts')
<script type="text/javascript">
  $("a[name='user-edit-submit']").click(function() {
    $("form[name='user-edit-form']").submit();
  });
</script>
@endpush
