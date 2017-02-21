@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('content')
  <section>
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
  </section>
@endsection

@push('end-page-scripts')

  <script type="text/javascript" src="/bower_resources/twbs-pagination/jquery.twbsPagination.min.js"></script>
  <script type="text/javascript">
    var totalPages = "{{$totalPages}}";
    var visiblePages = 5;
    var currentUrl = "{{url()->current()}}";
    var currentPage = parseInt("{{$page}}");
    $('#post-index-pagination').twbsPagination({
        totalPages: totalPages,
        visiblePages: visiblePages,
        startPage: currentPage,
        initiateStartPageClick: false,
        onPageClick: function (event, page) {
          window.location = currentUrl+"?page="+page;
        }
    });
  </script>
@endpush
