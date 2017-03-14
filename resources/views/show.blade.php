@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{ $post->title }}</h1>
        <img style="max-height:150px;" src="{{ $post->image }}"/>
        <div id="app">
          <comments post_id="{{ $post->id }}" comments_url="{{ route('comments.list',$post->id) }}"
            post_url="{{ route('comments.create',$post->id) }}"></comments>
        </div>
    </div>
@stop