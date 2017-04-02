@extends('layouts.app')

@push('stylesheet')
@endpush

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('content')
<div class="content-container">
  <div class="content">
    <h2 id="content" class="text-center">{{ $post->title }}</h2>
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
          <div class="panel-heading" align="center"><strong>MUA HÀNG AN TOÀN</strong></div>
          <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> KHÔNG trả tiền trước khi nhận hàng.</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> Kiểm tra hàng cẩn thận, đặc biệt với hàng đắt tiền.</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> Hẹn gặp ở nơi công cộng.</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> Nếu bạn mua hàng hiệu, hãy gặp mặt tại cửa hàng để nhờ xác minh, tránh mua phải hàng giả.</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> Tìm hiểu thêm về an toàn mua bán.</li>
          </ul>
        </div>
      </div>
    </div>
    <hr>
    
    <h4><i class="fa fa-address-card" aria-hidden="true"></i> Địa chỉ người đăng tin</h4>
    <ul class="alt">
      <li>{{ $post->address }}</li>
    </ul>
    <h2><i class="fa fa-money" aria-hidden="true"></i>: {{ $post->price }} VNĐ</h2>
    <p class="margin-top-10">
      {!! nl2br(e($post->description)) !!}
    </p>
  </div>
</div>


@endsection

@push('end-page-scripts')
@endpush
