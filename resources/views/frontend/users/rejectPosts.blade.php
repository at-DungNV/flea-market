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
          <a href="{{ route('users.waitingPosts') }}" class="list-group-item">
            <i class="fa fa-telegram" aria-hidden="true"></i> Chờ duyệt
          </a>
          <a href="{{ route('users.rejectedPosts') }}" class="list-group-item">
            <i class="fa fa-window-close-o" aria-hidden="true"> Bị từ chối</i>
          </a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 ">
        @if(count($posts) > 0) 
          <section class="work-col-4">
            @foreach ($posts as $post)
              <figure class="white">
                <!-- <h6>{{ str_limit($post->title, $limit = 15, $end = '...') }}</h6> -->
                <div style="margin-left: 5%;
                  margin-top: 5%;">{{ str_limit($post->title, $limit = 30, $end = '...') }} </div>
                <a href="{{ route('post.show', [$post->slug]) }}">
                  @if(Storage::disk('local')->exists($post->images->first()['url']))
                  <a href="{{ route('post.show', [$post->slug]) }}" class="image"><img class="image" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
                  @else
                  <a href="{{ route('post.show', [$post->slug]) }}" class="image"><img class="image" src="/images/pic01.jpg" alt="" /></a>
                  @endif
                  <!-- mouse hover will display description -->
                  <dl>
                    <dt>
                      <a href="{{ route('post.show', [$post->slug]) }}">
                        {{ str_limit($post->title, $limit = 15, $end = '...') }}
                      </a>
                    </dt>
                    <dd>
                      {{ str_limit($post->description, $limit = 100, $end = '...') }}
                    </dd>	
                  </dl>
                </a>
                <div class="wrapper-part-info">
                  <div class="part-info-image"><img src="/images/money.svg" alt="" width="28" height="28"/></div>
                  <div class="part-info part-info-font-12">
                    {{ $post->price }} - <a href="{{ route('post.show', [$post->slug]) }}" class="button"> {{ $post->created_at->diffForHumans() }}</a>
                  </div>
                </div>
              </figure>
            @endforeach
          </section>
          <div class="text-center col-xs-12 col-sm-12 col-md-12">
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
                <a href="{{ route('users.rejectedPosts') }}" class="button special"><span class="glyphicon glyphicon-home"></span>
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
  </div>

@endsection

@push('end-page-scripts')
@endpush
