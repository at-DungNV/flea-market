<div class="row">
  <form action="{{ route('post.index') }}" method="GET" name="search-form">
    <div class="col-xs-6 col-sm-6 col-md-8 padding-right-0">
      <input type="text" name="q" placeholder="Nhập từ khoá bạn tìm kiếm" value="{{ !is_null($q) ? $q : ' ' }}" style=" border-radius: 0.375em; border: 0;
    box-shadow: inset 0 0 0 2px #f56a6a; height: 2.8em;">
    </div>
    <div class="col-xs-3 col-sm-3 col-md-2 padding-left-0 padding-right-0 align-center">
      <a class="button btn-block advanced-search" data-toggle="collapse" data-target="#advanced-search">
        <span class="glyphicon glyphicon-cog"></span> Advanced Search
      </a>
    </div>
    <div class="col-xs-3 col-sm-3 col-md-2 padding-left-0">
      <button type="submit" class="btn-block"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
    </div>
    <div id="advanced-search" class="collapse col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
        </div>
      </div>
    </div>   
  </form>
  
  <div class="" id="advanced-search-original-elements" style="display: none;">
    <div class="form-group">
        <label>Địa danh:</label>
        <select name="address" class="form-control">
          <option value="">Địa danh</option>
          @foreach ($addresses as $province)
          <option value="{{$province->name}}" {{ $address == $province->name ? 'selected' : ' ' }}>{{$province->name}}</option>
          @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Loại:</label>
        <select name="type" class="form-control">
            <option value="">Loại</option>
            <option value="{{ \Config::get('common.SELL_TYPE') }}" {{ $type == \Config::get('common.SELL_TYPE') ? 'selected' : ' ' }}>{{ \Config::get('common.SELL_TYPE') }}</option>
            <option value="{{ \Config::get('common.BUY_TYPE') }}" {{ $type == \Config::get('common.BUY_TYPE') ? 'selected' : ' ' }}>{{ \Config::get('common.BUY_TYPE') }}</option>
        </select>                                
    </div>
    <div class="form-group">
        <label>Danh mục:</label>
        <select name="category" class="form-control">
            <option value="">Danh mục</option>
            <option value="default">IT</option>
            <option value="default">CFL</option>
        </select>                                
    </div>
    <div class="form-group">
        <label class="filter-col" style="margin-right:0;" for="pref-orderby">Sắp xếp:</label>
        <select name="order" class="form-control">
            <option value="">Sắp xếp</option>
            <option value="asc" {{ $order == \Config::get('common.ASCENDANT') ? 'selected' : ' ' }}>Giá thấp nhất</option>
            <option value="desc" {{ $order == \Config::get('common.DESCENDANT') ? 'selected' : ' ' }}>Giá cao nhất</option>
        </select>                                
    </div>
  </div>
</div>
<script type="text/javascript">
  var addresses = [
    @foreach ($addresses as $province)
      "{{ $province->name }}",
    @endforeach
  ];
</script>
<!-- search -->
<script src="/js/search.js"></script>
  