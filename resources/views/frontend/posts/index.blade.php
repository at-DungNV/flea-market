@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('navigation-search')
    @include('layouts.parts.search')
@stop

@section('content')
  <section>
    @if(count($posts) > 0) 
      @foreach ($posts->chunk(3) as $chunk)
          <div class="row">
              @foreach ($chunk as $post)
                  <div class="col-xs-4 col-md-4">
                    @if(Storage::disk('local')->exists($post->images->first()['url']))
                    <a href="{{ route('post.show', [$post->slug]) }}" class="image"><img class="image" src="{{ route('post.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
                    @else
                    <a href="{{ route('post.show', [$post->slug]) }}" class="image"><img class="image" src="images/pic01.jpg" alt="" /></a>
                    @endif
                    <h3>{{ str_limit($post->title, $limit = 100, $end = '...') }}</h3>
                    <p>
                      {{ str_limit($post->description, $limit = 100, $end = '...') }}
                    </p>
                    <ul class="actions">
                      <li><a href="{{ route('post.show', [$post->slug]) }}" class="button">More</a></li>
                    </ul>
                    <hr class="margin-top-10">
                  </div>
              @endforeach
          </div>
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
