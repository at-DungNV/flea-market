<!-- <section>
  <div class="posts">
    @foreach ($posts as $post)
      <article>
        @if(Storage::disk('local')->exists($post->images->first()['url']))
          <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img src="{{ route('posts.getPostImages', [$post->images->first()['url']]) }}" alt="" /></a>
        @else
          <a href="{{ route('posts.show', [$post->slug]) }}" class="image"><img src="images/pic01.jpg" alt="" /></a>
        @endif
        <h3>{{ $post->title }}</h3>
        <p>
          {{ str_limit($post->description, $limit = 100, $end = '...') }}
        </p>
        <ul class="actions">
          <li><a href="{{ route('posts.show', [$post->slug]) }}" class="button">More</a></li>
        </ul>
      </article>
    @endforeach





  </div>
  <div class="pagination text-center">
    <a href="{{ url()->current() }}?page=1">first</a>
    <a href="{{ url()->current() }}?page=1">&laquo;</a>
    @for ($i = 1; $i <= $totalPages; $i++)
    <a href="{{ url()->current() }}?page={{$i}}" id="post-index-pagination-{{$i}}">{{ $i }}</a>
    @endfor
    <a href="{{ url()->current() }}?page={{$totalPages}}">&raquo;</a>
    <a href="{{ url()->current() }}?page={{$totalPages}}">last</a>
  </div>


</section> -->
