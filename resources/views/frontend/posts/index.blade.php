@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('navigation-search')
    @include('layouts.parts.search')
@stop

@section('content')

  <div class="container object">
    <div id="main-container-image">
      <section class="work">
        @if(count($posts) > 0) 
          @foreach ($posts as $post)
            <figure class="white">
              <!-- <h6>{{ str_limit($post->title, $limit = 15, $end = '...') }}</h6> -->
              <div class="title-text" style="margin-left: 5%;
                margin-top: 5%;">{{ str_limit($post->title, $limit = 30, $end = '...') }} </div>
              <a href="{{ route('post.show', [$post->slug]) }}">
                @if(Storage::disk('local')->exists($post->images->first()['url']))
                <a href="{{ route('post.show', [$post->slug]) }}" class="image"><img class="image" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
                @else
                <a href="{{ route('post.show', [$post->slug]) }}" class="image"><img class="image" src="images/pic01.jpg" alt="" /></a>
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
              <div id="wrapper-part-info">
                <div class="part-info-image"><img src="images/money.svg" alt="" width="28" height="28"/></div>
                <div id="part-info">
                  {{ $post->price }} - <a href="{{ route('post.show', [$post->slug]) }}" class="button"> {{ $post->created_at->diffForHumans() }}</a>
                </div>
              </div>
            </figure>
          @endforeach
          
          <div class="text-center">
            <ul id="post-index-pagination" class="pagination-sm"></ul>
          </div>
        @else
          <div class="text-center text-center error-template">
             <h1>Oops!</h1>
             <h2>404 Not Found</h2>
             <div class="error-details">
                Sorry, an error has occured, Requested page not found!
             </div>
             <div class="error-actions">
                <a href="{{ route('post.index') }}" class="button special"><span class="glyphicon glyphicon-home"></span>
                  Back First Page
                </a>
                <a href="" class="button"><span class="glyphicon glyphicon-envelope"></span>
                  Contact Support
                </a>
             </div>
          </div>
        @endif
        
      </section>

    </div>	
    
  </div>

  <div id="wrapper-oldnew">
    <div class="text-center">
      <ul id="post-index-pagination" class="pagination-sm"></ul>
    </div>
  </div>  
  
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
