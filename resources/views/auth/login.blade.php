@extends('layouts.app')

@section('errors-message')
    @include('common.errors')
@stop

@section('susscess-message')
    @include('common.success')
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default row margin-top-20">
                <div class="panel-heading">
                  <div class="row center">
              	    <div class="col-xs-4 col-sm-4">
          		        <a href="{{ route('auth.facebook') }}" class="btn btn-primary btn-lg btn-block">
          			        <i class="fa fa-facebook-official" aria-hidden="true"></i>
          			        <span class="hidden-xs">Facebook</span>
          		        </a>
          	        </div>
                  	<div class="col-xs-4 col-sm-4">
          		        <a href="#" class="btn btn btn-info btn-lg btn-block">
          			        <i class="fa fa-twitter-square" aria-hidden="true"></i>
          			        <span class="hidden-xs">Twitter</span>
          		        </a>
          	        </div>	
                  	<div class="col-xs-4 col-sm-4">
          		        <a href="#" class="btn btn btn-danger btn-lg btn-block">
          			        <i class="fa fa-google-plus" aria-hidden="true"></i>
          			        <span class="hidden-xs">Google+</span>
          		        </a>
          	        </div>	
              		</div>
                </div>
                <div class="panel-body">
                  <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}" style="height: 40px !important;">
              						<span class="input-group-addon"><i class="fa fa-user"></i></span>
              						<input id="email" type="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email" style="height: 40px !important;">

                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
              					</div>
              					<span class="help-block"></span>
              					<div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}" style="height: 40px !important;">
              						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
              						<input id="password" type="password" class="form-control" name="password" placeholder="Password" required style="height: 40px !important;">
                          
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
              					</div>
                        <span class="help-block"></span>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                      Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>
              					<button class="btn btn-lg btn-warning btn-block" type="submit">Login</button>
                    </form>
                  </div>
                </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
</div>
@endsection
