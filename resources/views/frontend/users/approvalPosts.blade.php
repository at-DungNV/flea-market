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
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
      <div class="panel panel-default">
        <div class="panel-heading" align="center"><h3><strong>Thông tin cá nhân</strong></h3></div>
        <div class="panel-body">
          <ul class="alt">
            <li>
              <a href="{{ route('users.profile') }}">
                <i class="fa fa-user-circle" aria-hidden="true">
                </i>Profile
              </a>
            </li>
            <li>
              <a href="{{ route('users.approvalPosts') }}">
                <i class="fa fa-money" aria-hidden="true"></i>Đang bán
              </a>
            </li>
            <li>
              <a href="{{ route('users.rejectedPosts') }}">
                <i class="fa fa-window-close-o" aria-hidden="true">Bị từ chối</i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-envelope-open" aria-hidden="true"></i>Notification
              </a>
            </li>
            <li></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 ">
      @if(count($posts) > 0) 
        @foreach ($posts as $post)
        <div class="row">
          <div class="col-xs-3 col-sm-3 col-md-3">
            <span class="image left">
              <a href="{{ route('post.show', [$post->slug]) }}" class="image">
                <img class="image img-rounded" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" />
              </a>
            </span>
          </div>
          <div class="col-xs-9 col-sm-9 col-md-9">
            <h3>
              <a href="{{ route('post.show', [$post->slug]) }}" class="image">
                {{ str_limit($post->title, $limit = 50, $end = '...') }}
              </a>
            </h3>
            <p>{{ str_limit($post->description, $limit = 200, $end = '...') }}</p>
          </div>
        </div>
        <hr>
        @endforeach
        <div class="text-center">
          {{ $posts->links() }}
        </div>
      @else
        <div class="text-center text-center error-template">
           <h1>Oops!</h1>
           <h2>404 Not Found</h2>
           <div class="error-details">
              Sorry, an error has occured, Requested page not found!
           </div>
           <div class="error-actions">
              <a href="{{ route('users.approvalPosts') }}" class="button special"><span class="glyphicon glyphicon-home"></span>
                Back First Page
              </a>
              <a href="" class="button"><span class="glyphicon glyphicon-envelope"></span>
                Contact Support
              </a>
           </div>
        </div>
      @endif
    </div>
  </div>

@endsection

@push('end-page-scripts')
@endpush
