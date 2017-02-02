@extends('layouts.app')

@section('content')
  <section>
    <header class="major">
      <h2>Ipsum sed dolor</h2>
    </header>
    <div class="posts">
      @foreach ($posts as $post)
        <article>
          <a href="#" class="image"><img src="images/pic01.jpg" alt="" /></a>
          <h3>{{ $post->title }}</h3>
          <p>
            {{ str_limit($post->description, $limit = 100, $end = '...') }}
          </p>
          <ul class="actions">
            <li><a href="#" class="button">More</a></li>
          </ul>
        </article>
      @endforeach
    </div>
  </section>
@endsection
