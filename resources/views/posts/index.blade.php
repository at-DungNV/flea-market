@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('content')
  <section>
    <article  id="post-index-article-default">
      <a href="#" class="post-index-article-image image">
        <img src="images/pic01.jpg" alt="" /></a>
      </a>
      <h3 class="post-index-article-title"></h3>
      <p class="post-index-article-content">

      </p>
      <ul class="actions">
        <li><a href="" class="button post-index-article-more">More</a></li>
      </ul>
    </article>
    <div class="posts">

    </div>
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
    var urlIndex = "{{ url()->current() }}";
    var urlPagination = urlIndex + "/pagination";
    var urlImage = "{{url('/')}}/image";
    var newArticle;
    var originalArticle = $('#post-index-article-default');
    $('#post-index-pagination').twbsPagination({
        totalPages: totalPages,
        visiblePages: visiblePages,
        onPageClick: function (event, page) {
          $( '.posts' ).empty();
          $.get( urlPagination, {page: page}, function( data ) {
            for (var i = 0; i < data.posts.length; i++) {
              addArticle(i, data.posts[i].title, data.posts[i].description, data.posts[i].slug, data.posts[i].images[0]);
            }
          });
        }
    });

    function addArticle(index, title, description, slug, image) {
      newArticle = originalArticle.clone().attr('id', 'post-index-article-' + index);
      newArticle.find('.post-index-article-title').html(title.substr(0, 25));
      newArticle.find('.post-index-article-content').html(description.substr(0, 100) + "...");
      newArticle.find('.post-index-article-more').attr("href", urlIndex + "/" + slug);
      newArticle.find('.post-index-article-image').attr("href", urlIndex + "/" + slug);
      if (typeof image != 'undefined') {
        newArticle.find('.post-index-article-image').children().attr("src", urlImage + "/" + image.url);
      }
      $('.posts').append(newArticle);
    }

  </script>
@endpush
