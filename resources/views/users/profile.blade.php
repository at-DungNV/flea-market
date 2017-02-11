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
  <div class="row">
    <!-- <div class="col-xs-12 col-sm-12 col-md-12" >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">{{ ucfirst(Auth::user()->name) }} - Information</h3>
        </div>
        <div class="panel-body">
          <div class="row"> -->
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 " align="center">
              <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">
            </div>

            <div class="col-xs-12 col-sm-6 col-md-9 col-lg-9 ">
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
                    <td>{{ Auth::user()->birthday }}</td>
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
          </div>
          <div class="row align-center">
            <div class="col-xs-6 col-sm-3 col-md-3 col-sm-offset-6 col-md-offset-3">
              <a href="#" class="btn btn-primary btn-block">Edit profile</a>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3">
              <a href="#" class="btn btn-primary btn-block">Change password</a>
            </div>
          </div>


        <!-- </div>
      </div>
    </div> -->
  </div>
@endsection

@push('end-page-scripts')

@endpush
