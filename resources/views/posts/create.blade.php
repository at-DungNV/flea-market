@extends('layouts.app')

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
          <input type="text" name="price" class="form-control" id="post-price">
        </div>
        <div class="form-group">
          <label class="radio-button-group">Type:</label>
  				<input type="radio" name="type" id="post-type-sell">
  				<label for="post-type-sell" class="radio-button">Sell</label>
  				<input type="radio" name="type" id="post-type-buy">
  				<label for="post-type-buy">Buy</label>
        </div>
        <div class="form-group">
          <label for="post-address">Address:</label>
          <input type="text" name="address" class="form-control" id="post-address">
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
