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

@push('stylesheet')
  <link rel="stylesheet" href="/bower_resources/jquery-ui/themes/smoothness/jquery-ui.min.css" type="text/css" media="all" />
@endpush


@section('content')
  <div class="row">
    <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="title-text text-center">{{trans('posts.label_post_create')}} </div>
            <form action="{{ route('posts.store') }}" method="POST" data-toggle="validator" role="form" class="form-horizontal" name="post-form" enctype="multipart/form-data">
              <fieldset>
                {{ csrf_field() }}
                <!-- Text input-->
                <div class="form-group has-feedback">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-title">{{trans('posts.label_title')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <input type="text" name="title"  maxlength="256" placeholder="Nhập tiêu đề của bài đăng" class="form-control" id="post-title" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                
                
                
                
                <div class="form-group has-feedback">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label">{{trans('posts.label_type')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <label class="radio-inline" for="post-type-buy">
                      <input type="radio" name="type" id="post-type-buy" value="{{ \Config::get('common.BUY_TYPE') }}" required>{{trans('posts.label_type_buy')}}
                    </label>
                    
                    <label class="radio-inline" for="post-type-sell">
                      <input type="radio" name="type" id="post-type-sell" value="{{ \Config::get('common.SELL_TYPE') }}" required checked>{{trans('posts.label_type_sell')}}
                    </label>
                    
                  </div>
                </div>
                
                
                <div class="form-group has-feedback" id="frontend-post-create-price-container">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-price">{{trans('posts.label_price')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <input type="text" name="price" class="form-control" id="post-price" value="0" pattern="^[0-9]{1,}$" required />
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                
                <div class="form-group has-feedback">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label">{{trans('posts.label_category')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <select name="category" class="form-control">
                      @foreach ($categories as $category)
                        <optgroup label="{{ $category->name }}">
                          @foreach ($category->children as $child)
                            <option value="{{$child->slug}}">{{ $child->name }}</option>
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>     
                  </div>                           
                </div>
                
                <div class="form-group has-feedback">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-phone">{{trans('posts.label_phone')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <input type="text" name="phone" class="form-control" id="post-phone" value="{{Auth::user()->phone}}" pattern="^[0-9]{1,11}$" required />
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
                
                <!-- Text input-->
                <div class="form-group has-feedback">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-create-province">{{trans('posts.label_city')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <input type="text" id="post-create-province" placeholder="Nhập thành phố hoặc tỉnh thành" class="form-control" required>
                    <input type="hidden" name="province_id" id="post-create-province-hidden">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>

                <!-- Text input-->
                <div class="form-group has-feedback" id="post-create-district-ward-container">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-create-district">{{trans('posts.label_district')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-3 col-md-4">
                    <input type="text"  id="post-create-district" placeholder="district" class="form-control" disabled required>
                    <input type="hidden" name="district_id" id="post-create-district-hidden">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>

                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-create-ward">{{trans('posts.label_ward')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-3 col-md-4">
                    <input type="text" id="post-create-ward" placeholder="ward" class="form-control" disabled>
                    <input type="hidden" name="ward_id" id="post-create-ward-hidden">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
                
                <div class="form-group has-feedback">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-address">{{trans('posts.label_address')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <input type="text" name="address" class="form-control" id="post-address" value="{{Auth::user()->address}}" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  </div>
                </div>
                
                <div class="form-group has-feedback">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-images">{{trans('posts.label_image')}}:<span class="required">*</span></label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <input type="file" name="images[]" multiple class="form-control" id="post-images" accept="image/*" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-xs-3 col-sm-3 col-md-2 control-label" for="post-description">{{trans('posts.label_description')}}:</label>
                  <div class="col-xs-9 col-sm-9 col-md-10">
                    <textarea class="form-control" rows="5" name="description" id="post-description" placeholder="Nhập mô tả để người dùng dễ hình dung hơn"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-md-offset-3">
                    <a href="#" class="btn btn-warning btn-lg btn-block">{{trans('common.button_cancel')}}</a>
                  </div>
                  <div class="col-md-3">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="post-submit" value="{{trans('common.button_confirm')}}">
                  </div>
                </div>
                

              </fieldset>
            </form>
          </div>
      </div>
    </div>
  </div>
@endsection

@push('end-page-scripts')
  <script src="/bower_resources/jquery-ui/jquery-ui.min.js" charset="utf-8"></script>
  <script src="/bower_resources/bootstrap-validator/dist/validator.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    var provinceUrl = "{{ route('province.index')}}";
    var districtUrl = "{{ route('district.index')}}";
    var wardUrl = "{{ route('ward.index')}}";
    var APP_URL = {!! json_encode(url('/')) !!};
    
    var getDistrictUrlApi = APP_URL + "/api/provinces/";
    var getWardUrlApi = APP_URL + "/api/districts/";
    
    
    var inputProvince = "post-create-province";
    var inputDistrict = "post-create-district";
    var inputWard = "post-create-ward";
    
    $("input[name=type]").bind('change', function(){
      if ($(this).val() == 'buy') {
        $("#frontend-post-create-price-container").hide();
      } else {
        $("#frontend-post-create-price-container").show();
      }
    }); 
    
    $("#post-create-district-ward-container").hide();
    setAutoCompleteProvince();
    
    function setAutoCompleteProvince() {
      $.getJSON( provinceUrl, function( data ) {
        setAutocomplete("#post-create-province", data.provinces);
      });
    }
    
    $("a[name='post-submit']").validator();
    
    function setAutocomplete(selector, data) {
      $(selector).autocomplete({
        source: function (request, response) {
          response($.map(data, function (value, key) {
            return {
              label: value.id + ' - ' +value.name,
              name: value.name,
              id: value.id,
              index: key      
            }
          }));
        },
        messages: {
          noResults: '',
          results: function() {}
        },
        minLength: 0,
        select: function(event, ui) {
          if($(this).attr('id') == inputProvince){
            $("#post-create-province-hidden").val(ui.item.id);
            $.getJSON( getDistrictUrlApi + ui.item.id + '/districts', function( data ) {
              $("#post-create-district-ward-container").show();
              setAutocomplete("#post-create-district", data.districts);
            });
            $("#post-create-district").removeAttr('disabled');
          } else if ($(this).attr('id')== inputDistrict) {
            $("#post-create-district-hidden").val(ui.item.id);
            $.getJSON( getWardUrlApi + ui.item.id + '/wards', function( data ) {
              setAutocomplete("#post-create-ward", data.wards);
            });
            $("#post-create-ward").removeAttr('disabled');
          } else {
            $("#post-create-ward-hidden").val(ui.item.id);
          }
        }
      });
    }
  </script>
@endpush
