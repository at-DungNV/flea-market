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
          <a href="{{ route('users.show.posts') }}" class="list-group-item list-group-item-success">
            <i class="fa fa-money" aria-hidden="true"></i> Bài đăng
          </a>
        </div>
      </div>
      <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="frontend-profile-tab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#frontend-profile-active" role="tab" data-toggle="tab" aria-expanded="true">Active Posts</a>
            </li>
            <li role="presentation" class=""><a href="#frontend-profile-waiting" role="tab" data-toggle="tab" aria-expanded="false">Waiting Posts</a>
            </li>
            <li role="presentation" class=""><a href="#frontend-profile-hidden" role="tab" data-toggle="tab" aria-expanded="false">Hidden Posts</a>
            </li>
            <li role="presentation" class=""><a href="#frontend-profile-rejected" role="tab" data-toggle="tab" aria-expanded="false">Rejected Posts</a>
            </li>
          </ul>
          <div id="frontend-profile-tab-content" class="tab-content">
            
            <div role="tabpanel" class="tab-pane fade active in" id="frontend-profile-active" aria-labelledby="frontend-profile-active">
              @if(count($approvalPosts) > 0) 
                <section class="work-col-4">
                  @foreach ($approvalPosts as $post)
                    <figure class="white">
                      <!-- <h6>{{ str_limit($post->title, $limit = 15, $end = '...') }}</h6> -->
                      <div style="margin-left: 5%;
                        margin-top: 5%;">{{ str_limit($post->title, $limit = 30, $end = '...') }} </div>
                      <a href="{{ route('posts.show', [$post->slug]) }}">
                        @if(Storage::disk('local')->exists($post->images->first()['url']))
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
                        @else
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="/images/pic01.jpg" alt="" /></a>
                        @endif
                        <!-- mouse hover will display description -->
                        <dl>
                          <dt>
                            <a href="{{ route('posts.show', [$post->slug]) }}">
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
                          {{ $post->price }} - <a href="{{ route('posts.show', [$post->slug]) }}" class="button"> {{ $post->created_at->diffForHumans() }}</a>
                        </div>
                      </div>
                    </figure>
                  @endforeach
                </section>
                <div class="text-center col-xs-12 col-sm-12 col-md-12">
                  {{ $approvalPosts->links() }}
                </div>
              @else
                <div class="text-center text-center error-template">
                   <h1>Oops!</h1>
                   <h2>404 Not Found</h2>
                   <div class="error-details">
                      Sorry, an error has occured, Requested page not found!
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('users.show.posts') }}" class="button special"><span class="glyphicon glyphicon-home"></span>
                        Back First Page
                      </a>
                      <a href="" class="button"><span class="glyphicon glyphicon-envelope"></span>
                        Contact Support
                      </a>
                   </div>
                </div>
              @endif

            </div>
            <div role="tabpanel" class="tab-pane fade" id="frontend-profile-waiting" aria-labelledby="frontend-profile-waiting">

              @if(count($waitingPosts) > 0) 
                <section class="work-col-4">
                  @foreach ($waitingPosts as $post)
                    <figure class="white">
                      <!-- <h6>{{ str_limit($post->title, $limit = 15, $end = '...') }}</h6> -->
                      <div style="margin-left: 5%;
                        margin-top: 5%;">{{ str_limit($post->title, $limit = 30, $end = '...') }} </div>
                      <a href="{{ route('posts.show', [$post->slug]) }}">
                        @if(Storage::disk('local')->exists($post->images->first()['url']))
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
                        @else
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="/images/pic01.jpg" alt="" /></a>
                        @endif
                        <!-- mouse hover will display description -->
                        <dl>
                          <dt>
                            <a href="{{ route('posts.show', [$post->slug]) }}">
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
                          {{ $post->price }} - <a href="{{ route('posts.show', [$post->slug]) }}" class="button"> {{ $post->created_at->diffForHumans() }}</a>
                        </div>
                      </div>
                    </figure>
                  @endforeach
                </section>
                <div class="text-center col-xs-12 col-sm-12 col-md-12">
                  {{ $waitingPosts->links() }}
                </div>
              @else
                <div class="text-center text-center error-template">
                   <h1>Oops!</h1>
                   <h2>404 Not Found</h2>
                   <div class="error-details">
                      Sorry, an error has occured, Requested page not found!
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('users.show.posts') }}" class="button special"><span class="glyphicon glyphicon-home"></span>
                        Back First Page
                      </a>
                      <a href="" class="button"><span class="glyphicon glyphicon-envelope"></span>
                        Contact Support
                      </a>
                   </div>
                </div>
              @endif

            </div>
            <div role="tabpanel" class="tab-pane fade" id="frontend-profile-hidden" aria-labelledby="profile-tab">
              @if(count($hiddenPosts) > 0) 
                <section class="work-col-4">
                  @foreach ($hiddenPosts as $post)
                    <figure class="white">
                      <!-- <h6>{{ str_limit($post->title, $limit = 15, $end = '...') }}</h6> -->
                      <div style="margin-left: 5%;
                        margin-top: 5%;">{{ str_limit($post->title, $limit = 30, $end = '...') }} </div>
                      <a href="{{ route('posts.show', [$post->slug]) }}">
                        @if(Storage::disk('local')->exists($post->images->first()['url']))
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
                        @else
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="/images/pic01.jpg" alt="" /></a>
                        @endif
                        <!-- mouse hover will display description -->
                        <dl>
                          <dt>
                            <a href="{{ route('posts.show', [$post->slug]) }}">
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
                          {{ $post->price }} - <a href="{{ route('posts.show', [$post->slug]) }}" class="button"> {{ $post->created_at->diffForHumans() }}</a>
                        </div>
                      </div>
                    </figure>
                  @endforeach
                </section>
                <div class="text-center col-xs-12 col-sm-12 col-md-12">
                  {{ $hiddenPosts->links() }}
                </div>
              @else
                <div class="text-center text-center error-template">
                   <h1>Oops!</h1>
                   <h2>404 Not Found</h2>
                   <div class="error-details">
                      Sorry, an error has occured, Requested page not found!
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('users.show.posts') }}" class="button special"><span class="glyphicon glyphicon-home"></span>
                        Back First Page
                      </a>
                      <a href="" class="button"><span class="glyphicon glyphicon-envelope"></span>
                        Contact Support
                      </a>
                   </div>
                </div>
              @endif
            </div>
            
            <div role="tabpanel" class="tab-pane fade" id="frontend-profile-rejected" aria-labelledby="profile-tab">
              @if(count($rejectedPosts) > 0) 
                <section class="work-col-4">
                  @foreach ($rejectedPosts as $post)
                    <figure class="white">
                      <!-- <h6>{{ str_limit($post->title, $limit = 15, $end = '...') }}</h6> -->
                      <div style="margin-left: 5%;
                        margin-top: 5%;">{{ str_limit($post->title, $limit = 30, $end = '...') }} </div>
                      <a href="{{ route('posts.show', [$post->slug]) }}">
                        @if(Storage::disk('local')->exists($post->images->first()['url']))
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
                        @else
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img class="image" src="/images/pic01.jpg" alt="" /></a>
                        @endif
                        <!-- mouse hover will display description -->
                        <dl>
                          <dt>
                            <a href="{{ route('posts.show', [$post->slug]) }}">
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
                          {{ $post->price }} - <a href="{{ route('posts.show', [$post->slug]) }}" class="button"> {{ $post->created_at->diffForHumans() }}</a>
                        </div>
                      </div>
                    </figure>
                  @endforeach
                </section>
                <div class="text-center col-xs-12 col-sm-12 col-md-12">
                  {{ $rejectedPosts->links() }}
                </div>
              @else
                <div class="text-center text-center error-template">
                   <h1>Oops!</h1>
                   <h2>404 Not Found</h2>
                   <div class="error-details">
                      Sorry, an error has occured, Requested page not found!
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('users.show.posts') }}" class="button special"><span class="glyphicon glyphicon-home"></span>
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
      </div>
    </div>
    
  </div>
@endsection

@push('end-page-scripts')
@endpush
