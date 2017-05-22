@extends('layouts.app')

@push('stylesheet')
@endpush

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('content')
<div class="content-container">
  <div class="content">
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
            <span class="sr-only">{{trans('posts.label_previous')}}</span>
          </a>
          <a class="right carousel-control" href="#post-show-images" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">{{trans('posts.label_next')}}</span>
          </a>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading" align="center"><strong>{{trans('posts.label_announcement')}}</strong></div>
          <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> {{trans('posts.content_announcement1')}}</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> {{trans('posts.content_announcement2')}}</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> {{trans('posts.content_announcement3')}}</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> {{trans('posts.content_announcement4')}}</li>
            <li class="list-group-item"><i class="fa fa-check-square" aria-hidden="true"></i> {{trans('posts.content_announcement5')}}</li>
              @if(Auth::user()->id == $post->user->id && ($post->state == \Config::get('common.TYPE_POST_ACTIVE') || $post->state == \Config::get('common.TYPE_POST_HIDDEN')))
                <li class="list-group-item">
                  <i class="fa fa-adjust" aria-hidden="true"></i> <span style="font-weight:bold; font-size: 20px;">{{trans('posts.label_update_post')}}: </span>
                  <div class="form-group">
                    <select class="form-control frontend-post-show-state">
                      @foreach ($states as $state)
                        <option value="{{ $state }}"> {{ $state }}</option>
                      @endforeach
                    </select>
                    <a data-toggle="modal" data-target="#frontend-confirm-updating" class="btn btn-danger btn-block frontend-post-show-update">
                      <i class="fa fa-rocket"></i> {{trans('posts.label_update')}}
                    </a>
                  </div>
                </li>
              @endif
          </ul>
        </div>
      </div>
    </div>
    <hr>
    
    <h4><i class="fa fa-address-card" aria-hidden="true"></i> {{trans('posts.label_post_owner_address')}}</h4>
    <ul class="alt">
      <li>{{trans('posts.label_type')}}: {{ $post->type ==  \Config::get('common.SELL_TYPE') ? trans('posts.label_type_sell') : trans('posts.label_type_buy')}}</li>
      <li>{{trans('posts.label_address')}}: {{ $post->address }}</li>
      <li>{{trans('posts.label_phone')}}: {{ $post->phone }}</li>
    </ul>
    <hr>
    @if($post->type == \Config::get('common.SELL_TYPE') && Auth::user()->id != $post->user->id)
    <h2><i class="fa fa-money" aria-hidden="true"></i>: {{ number_format ( $post->price  , 0 , "." , "." ) }} {{trans('common.label_currency')}}</h2>
    @endif
    <p class="margin-top-10">
      {!! nl2br(e($post->description)) !!}
    </p>
  </div>

  <div class="modal fade" id="frontend-confirm-updating" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{trans('posts.label_update_post')}}</h4>
        </div>
        <div class="modal-body">
          <h5>{{trans('posts.label_current_state')}}: {{$post->state}}</h5>
          <h5>{{trans('posts.label_updated_state')}}: <span class="frontend-post-show-label-state"> </span></h5>
        </div>
        <div class="modal-footer">
            <form action="{{ route('frontend.post.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="hidden" name="state" value="">
                <button type="submit" class="btn btn-danger">{{trans('common.button_update')}}</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('common.button_cancel')}}</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@push('end-page-scripts')
<script type="text/javascript">
  $(document).ready(function() {
      $(document).on('click',".frontend-post-show-update", function() {
          var state = $('.frontend-post-show-state').val();
          $('input[name="state"]').val(state);
          $('.frontend-post-show-label-state').html(state);
      });
  });
</script>
@endpush
