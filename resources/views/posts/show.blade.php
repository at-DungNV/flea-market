@extends('layouts.app')

@push('stylesheet')
  <link href="/css/tiksluscarousel.css" rel="stylesheet">
  <link href="/css/animate.css" rel="stylesheet">
  <style media="screen">
    #post-show-images ul li{
      padding-left: 0px;
    }
    #post-show-images{
      /*border:4px solid #000;*/
    }
  </style>
@endpush

@section('content')
<h2 id="content">{{ $post->title }}</h2>
<div class="row">
  <div class="col-md-8 col-sm-12 col-xs-12">
    <div id="post-show-images">
      <ul>
        <li><img src="/images/pic01.jpg" class="img-rounded"></li>
        <li><img src="/images/pic02.jpg" class="img-rounded"></li>
        <li><img src="/images/pic03.jpg" class="img-rounded"></li>
        <li><img src="/images/pic04.jpg" class="img-rounded"></li>
        <li><img src="/images/pic05.jpg" class="img-rounded"></li>
        <li><img src="/images/pic06.jpg" class="img-rounded"></li>
      </ul>
    </div>
  </div>
  <div class="col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading"><strong>MUA HÀNG AN TOÀN</strong></div>
      <div class="panel-body">
        <ul class="list-group">
          <li class="list-group-item">KHÔNG trả tiền trước khi nhận hàng.</li>
          <li class="list-group-item">Kiểm tra hàng cẩn thận, đặc biệt với hàng đắt tiền.</li>
          <li class="list-group-item">Hẹn gặp ở nơi công cộng.</li>
          <li class="list-group-item">Nếu bạn mua hàng hiệu, hãy gặp mặt tại cửa hàng để nhờ xác minh, tránh mua phải hàng giả.</li>
          <li class="list-group-item">Tìm hiểu thêm về an toàn mua bán.</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="row margin-top-10">
  <!-- <p>
    Praesent ac adipiscing ullamcorper semper ut amet ac risus. Lorem sapien ut odio odio nunc. Ac adipiscing nibh porttitor erat risus justo adipiscing adipiscing amet placerat accumsan.
    Vis. Faucibus odio magna tempus adipiscing a non. In mi primis arcu ut non accumsan vivamus ac blandit adipiscing adipiscing arcu metus praesent turpis eu ac lacinia nunc ac commodo
    gravida adipiscing eget accumsan ac nunc adipiscing adipiscing lorem ipsum dolor sit amet nullam veroeros adipiscing.
  </p> -->
  <p>
    {{ $post->description }}
  </p>
</div>



@endsection

@push('end-page-scripts')
  <script type="text/javascript" src="/js/tiksluscarousel.js"></script>
  <script type="text/javascript" src="/js/rainbow.min.js"></script>
  <script language="javascript">
		$(document).ready(function(){
        $("#post-show-images").tiksluscarousel({
          progressBar:true,
          width:0,
          height:200,
          nav:'thumbnails',
          type:"slide"
        });
		});
		</script>
@endpush
