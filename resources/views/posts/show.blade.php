@extends('layouts.app')

@push('stylesheet')
  <link href="/css/tiksluscarousel.css" rel="stylesheet">
  <link href="/css/animate.css" rel="stylesheet">
  <style media="screen">
    #post-show-images ul li{
      padding-left: 0px;
    }
  </style>
@endpush

@section('main-title')
  @include('common.breadcrumb')
@endsection


@section('content')
<h2 id="content">{{ $post->title }}</h2>
<div class="row">
  <div class="col-md-8 col-sm-12 col-xs-12">
    <div id="post-show-images">
      <!-- {{$post->images}} -->
      <ul>
        @foreach ($post->images as $image)
        <li><img src="{{ route('posts.getPostImages', [$image->url]) }}" class="img-rounded"></li>
        @endforeach
        <!-- <li><img src="/images/pic02.jpg" class="img-rounded"></li>
        <li><img src="/images/pic03.jpg" class="img-rounded"></li>
        <li><img src="/images/pic04.jpg" class="img-rounded"></li>
        <li><img src="/images/pic05.jpg" class="img-rounded"></li>
        <li><img src="/images/pic06.jpg" class="img-rounded"></li> -->
      </ul>
    </div>
  </div>
  <div class="col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading"><strong>MUA HÀNG AN TOÀN</strong></div>
      <div class="panel-body">
        <ul class="alt">
          <li>KHÔNG trả tiền trước khi nhận hàng.</li>
          <li>Kiểm tra hàng cẩn thận, đặc biệt với hàng đắt tiền.</li>
          <li>Hẹn gặp ở nơi công cộng.</li>
          <li>Nếu bạn mua hàng hiệu, hãy gặp mặt tại cửa hàng để nhờ xác minh, tránh mua phải hàng giả.</li>
          <li>Tìm hiểu thêm về an toàn mua bán.</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row margin-top-10">
  <p>
    {{ $post->description }}
  </p>
</div>
<h4><i class="fa fa-address-card" aria-hidden="true"></i> Địa chỉ người đăng tin</h4>
<ul class="alt">
  <li>{{ $post->address }}</li>
</ul>



@endsection

@push('end-page-scripts')
  <script type="text/javascript" src="/js/tiksluscarousel.js"></script>
  <script type="text/javascript" src="/js/rainbow.min.js"></script>
  <script language="javascript">
		$(document).ready(function(){
        $("#post-show-images").tiksluscarousel({
          progressBar: true,
          width: 0,
          height: 200,
          nav: 'thumbnails',
          type: "slide"
        });
		});
		</script>
@endpush
