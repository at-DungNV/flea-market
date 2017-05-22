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
          <a href="{{ route('users.profile') }}" class="list-group-item">
            <i class="fa fa-user-circle" aria-hidden="true">
            </i> {{trans('users.label_info')}}
          </a>
          <a href="{{ route('users.show.posts') }}" class="list-group-item list-group-item-success">
            <i class="fa fa-money" aria-hidden="true"></i> {{trans('users.label_posts')}}
          </a>
          <a class="list-group-item" data-toggle="collapse" data-target="#frontend-user-profile-update-image-container">
            <i class="fa fa-file-image-o" aria-hidden="true"></i> {{trans('users.label_change_avatar')}} <i class="fa fa-sort-desc" aria-hidden="true"></i>
          </a>
          <div id="frontend-user-profile-update-image-container" class="collapse well">
            <form class="avatar-form" action="{{ route('users.profile', [Auth::user()->id]) }}" enctype="multipart/form-data" method="post">
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <input class="avatar-input" id="imgInp" name="image" type="file" required="required" style="max-width: 216px !important;">
              </div>
              <div class="row">
                  <button class="btn btn-primary btn-block avatar-save" type="submit"> {{trans('common.button_confirm')}} </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
          <ul id="frontend-profile-tab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#frontend-profile-active" role="tab" data-toggle="tab" aria-expanded="true">{{trans('users.label_active_posts')}}</a>
            </li>
            <li role="presentation" class=""><a href="#frontend-profile-waiting" role="tab" data-toggle="tab" aria-expanded="false">{{trans('users.label_waiting_posts')}}</a>
            </li>
            <li role="presentation" class=""><a href="#frontend-profile-hidden" role="tab" data-toggle="tab" aria-expanded="false">{{trans('users.label_hidden_posts')}}</a>
            </li>
            <li role="presentation" class=""><a href="#frontend-profile-rejected" role="tab" data-toggle="tab" aria-expanded="false">{{trans('users.label_rejected_posts')}}</a>
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
                   <div class="error-details">
                      {{trans('common.content_empty_result')}}
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('posts.index') }}" class="btn btn-primary special"><span class="glyphicon glyphicon-home"></span>
                        {{trans('common.button_come_back_home_page')}}
                      </a>
                      <a href="{{ route('posts.create') }}" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>
                        {{trans('common.button_create_new_post')}}
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
                   <div class="error-details">
                      {{trans('common.content_empty_result')}}
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('posts.index') }}" class="btn btn-primary special"><span class="glyphicon glyphicon-home"></span>
                        {{trans('common.button_come_back_home_page')}}
                      </a>
                      <a href="{{ route('posts.create') }}" class="btn btn-warning">
                        <span class="glyphicon glyphicon-plus"></span>
                        {{trans('common.button_create_new_post')}}
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
                   <div class="error-details">
                      {{trans('common.content_empty_result')}}
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('posts.index') }}" class="btn btn-primary special"><span class="glyphicon glyphicon-home"></span>
                        {{trans('common.button_come_back_home_page')}}
                      </a>
                      <a href="{{ route('posts.create') }}" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>
                        {{trans('common.button_create_new_post')}}
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
                   <div class="error-details">
                      {{trans('common.content_empty_result')}}
                   </div>
                   <div class="error-actions">
                      <a href="{{ route('posts.index') }}" class="btn btn-primary special"><span class="glyphicon glyphicon-home"></span>
                        {{trans('common.button_come_back_home_page')}}
                      </a>
                      <a href="{{ route('posts.create') }}" class="btn btn-warning"><span class="glyphicon glyphicon-plus"></span>
                        {{trans('common.button_create_new_post')}}
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
