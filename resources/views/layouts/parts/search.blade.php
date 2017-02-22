<div class="row">
  <form>
    <div class="col-xs-9 col-sm-9 col-md-10 padding-right-0">
      <input type="text" id="searchValue" placeholder="Nhập từ khoá bạn tìm kiếm" value="" style=" border-radius: 0.375em; border: 0;
    box-shadow: inset 0 0 0 2px #f56a6a; height: 2.8em;">
    </div>
    <div class="col-xs-3 col-sm-3 col-md-2 padding-left-0">
      <button type="submit" class="btn-block"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
    </div>
  </form>
  <div class="col-xs-12 col-sm-12 col-md-3 padding-right-0">
    <div class="dropdown">
      <button href="#" class="dropdown-toggle btn-block" data-toggle="dropdown">dia danh <b class="caret"></b></button>
      <ul class="dropdown-menu width-100-percent">
          <a class="dropdown-plus-title btn-block align-center">
              dia danh 
              <b class="pull-right glyphicon glyphicon-chevron-up"></b>
          </a>
          <li><a href="{{ route('post.index') }}">Gia cao nhat</a></li>
          <li class="divider"></li>
          <li><a href="{{ route('post.create') }}">Create</a></li>
      </ul>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-3 padding-left-0 padding-right-0">
    
    <div class="dropdown">
      <button href="#" class="dropdown-toggle btn-block" data-toggle="dropdown">danh muc <b class="caret"></b></button>
      <ul class="dropdown-menu width-100-percent">
          <a class="dropdown-plus-title btn-block align-center">
              DANH MUC 
              <b class="pull-right glyphicon glyphicon-chevron-up"></b>
          </a>
          <li><a href="{{ route('post.index') }}">Gia cao nhat</a></li>
          <li class="divider"></li>
          <li><a href="{{ route('post.create') }}">Create</a></li>
      </ul>
    </div>
  </div>
  
  <div class="col-xs-12 col-sm-12 col-md-3 padding-left-0 padding-right-0">
    
    <div class="dropdown">
      <button href="#" class="dropdown-toggle btn-block" data-toggle="dropdown">loai ban mua <b class="caret"></b></button>
      <ul class="dropdown-menu width-100-percent">
          <a class="dropdown-plus-title btn-block align-center">
              LOAI BAN MUA 
              <b class="pull-right glyphicon glyphicon-chevron-up"></b>
          </a>
          <li><a href="{{ route('post.index') }}?q={{\Config::get('common.SELL_TYPE')}}">Sell</a></li>
          <li class="divider"></li>
          <li><a href="{{ route('post.index') }}?q={{\Config::get('common.BUY_TYPE')}}">Buy</a></li>
      </ul>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-3 padding-left-0">
      <div class="dropdown">
        <button href="#" class="dropdown-toggle btn-block" data-toggle="dropdown">Sap xep <b class="caret"></b></button>
        <ul class="dropdown-menu width-100-percent">
            <a class="dropdown-plus-title btn-block align-center">
                Sap xep 
                <b class="pull-right glyphicon glyphicon-chevron-up"></b>
            </a>
            <li><a href="{{ route('post.index') }}">Gia cao nhat</a></li>
            <li class="divider"></li>
            <li><a href="{{ route('post.create') }}">Create</a></li>
        </ul>
      </div>
    </div>
</div>
  
  
  
  