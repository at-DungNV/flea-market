@extends('layouts.backend.app')

@section('content')

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Show Post Detail Management</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">
          <h2 class="text-center">{{ $post->title }}</h2>
          <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div id="post-show-images" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  @foreach ($post->images as $key => $image)
                  <li data-target="#post-show-images" class="{{ $key == 0 ? 'active' : '' }}"></li>
                  @endforeach
                </ol>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  @foreach ($post->images as $key => $image)
                  <div class="item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ route('post.getPostImages', [$image->url]) }}" class="img-rounded">
                  </div>
                  @endforeach
                </div>
                
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#post-show-images" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#post-show-images" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
              <div class="panel panel-primary">
                <div class="panel-heading" align="center"><strong>Thông tin bài đăng</strong></div>
                <ul class="list-group">
                  <li class="list-group-item">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i> Author: {{ $post->user->name }}
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i> State: {{ $post->state }}
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-balance-scale" aria-hidden="true"></i> Type: {{ $post->type }}
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-phone" aria-hidden="true"></i> Phone: {{ $post->phone }}
                  </li>
                  <li class="list-group-item">
                    <i class="fa fa-check-square" aria-hidden="true"></i> Chỉnh sửa: 
                    <a href="{{ route('admin.post.edit', [$post->id]) }}" class="btn btn-info btn-block"><i class="fa fa-pencil"></i> Edit </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <hr>
          
          <h4><i class="fa fa-address-card" aria-hidden="true"></i> Địa chỉ người đăng tin</h4>
          {{ $post->address }}
          <h2><i class="fa fa-money" aria-hidden="true"></i>: {{ number_format ( $post->price  , 0 , "." , "." ) }} VNĐ</h2>
          <p class="margin-top-10">
            {!! nl2br(e($post->description)) !!}
          </p>
      </div>
    </div>
  </div>
@stop