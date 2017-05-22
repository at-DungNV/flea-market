@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('navigation-search')
    @include('layouts.parts.search')
@stop

@section('content')
  <div class="content-container">
    <div class="content">
      <div class="well">
        @include('layouts.parts.search')
      </div>
      <section class="work">
        @if(count($posts) > 0) 
          @foreach ($posts as $post)
            <figure class="white">
              <!-- <h6>{{ str_limit($post->title, $limit = 15, $end = '...') }}</h6> -->
              <div style="margin-left: 5%;
                margin-top: 5%;font-weight:bold;">{{ str_limit($post->title, $limit = 30, $end = '...') }} </div>
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
                      {{ str_limit($post->title, $limit = 25, $end = '...') }}
                    </a>
                  </dt>
                  <dd>
                    {!! str_limit(nl2br(e($post->description)), $limit = 100, $end = '...') !!}
                  </dd>	
                </dl>
              </a>
              <div class="wrapper-part-info">
                <div class="part-info-image"><img src="/images/money.svg" alt="" width="28" height="28"/></div>
                <div class="part-info part-info-font-12">
                  {{ number_format ( $post->price  , 0 , "." , "." ) }} {{trans('common.label_currency')}} - <a href="{{ route('posts.show', [$post->slug]) }}" class="button"> {{ $post->created_at->diffForHumans() }}</a>
                </div>
              </div>
            </figure>
          @endforeach
          <div class="text-center col-xs-12 col-sm-12 col-md-12">
            <ul id="post-index-pagination" class="pagination-sm"></ul>
          </div>
        @else
          @include('common.notFoundError')
        @endif
      </section>
        

    </div>	
    
  </div>

  <!-- <div id="wrapper-oldnew"> -->
    <div class="text-center">
      <ul id="post-index-pagination" class="pagination-sm"></ul>
    </div>
  <!-- </div>   -->
  
@endsection

@push('end-page-scripts')

  <script type="text/javascript" src="/bower_resources/twbs-pagination/jquery.twbsPagination.min.js"></script>
  <script type="text/javascript">
    var totalPages = "{{$totalPages}}";
    var visiblePages = 5;
    var baseCurrentUrl = "{{url()->current()}}";
    var currentUrl = "{{url()->full()}}";
    var currentPage = parseInt("{{$page}}");
    $('#post-index-pagination').twbsPagination({
        totalPages: totalPages,
        visiblePages: visiblePages,
        startPage: currentPage,
        initiateStartPageClick: false,
        onPageClick: function (event, page) {
          if (currentUrl == baseCurrentUrl) {
            currentUrl = currentUrl+"?page="+page;
          } else {
            currentUrl = currentUrl+"&page="+page;
          }
          window.location = currentUrl;
        }
    });
  </script>
@endpush
