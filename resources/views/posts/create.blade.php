@extends('layouts.app')

@section('breadcrumb')
    @include('common.breadcrumb')
@stop

@section('errors-message')
    @include('common.errors')
@stop

@section('susscess-message')
    @include('common.success')
@stop


@section('content')
  <div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
      <form action="{{ route('posts.store') }}" method="POST" class="form-horizontal" name="post-form" enctype="multipart/form-data" novalidate>
        {{ csrf_field() }}
        <div class="form-group">
          <label for="post-title">Title:</label>
          <input type="text" name="title" class="form-control" id="post-title">
        </div>
        <div class="form-group">
          <label for="post-price">Price:</label>
          <input type="text" name="price" class="form-control" id="post-price" value="0">
        </div>
        <div class="form-group">
          <label class="radio-button-group">Type:</label>
  				<input type="radio" name="type" id="post-type-sell" value="{{ \Config::get('common.SELL_TYPE') }}" checked>
  				<label for="post-type-sell" class="radio-button">Sell</label>
  				<input type="radio" name="type" id="post-type-buy" value="{{ \Config::get('common.BUY_TYPE') }}">
  				<label for="post-type-buy">Buy</label>
        </div>
        <div class="form-group">
          <label for="post-phone">Phone:</label>
          <input type="text" name="phone" class="form-control" id="post-phone" value="{{Auth::user()->phone}}">
        </div>
        <div class="form-group">
          <label for="post-address">Address:</label>
          <input type="text" name="address" class="form-control" id="post-address" value="{{Auth::user()->address}}">
        </div>
        <div class="form-group">
          <label for="post-images">Images:</label>
          <input type="file" name="images[]" multiple class="form-control" id="post-images" accept="image/*">
        </div>
        <div class="form-group">
          <label for="post-description">Description:</label>
          <textarea class="form-control" rows="5" name="description" id="post-description"></textarea>
        </div>
        <div class="form-group">
          <div class="col-md-3 col-md-offset-3">
            <a href="#" class="button icon fa-download">Cancel</a>
          </div>
          <div class="col-md-3">
            <a href="#" class="button special icon fa-search" name="post-submit">Confirm</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('end-page-scripts')
<script type="text/javascript">
  $("a[name='post-submit']").click(function() {
    $("form[name='post-form']").submit();
  });
</script>
@endpush
