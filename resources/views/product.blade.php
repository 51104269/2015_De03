@extends('app')

@section('content')
	<section class="container">
      <nav class="breadcrumbs"> <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> {{$product->name}} </nav>
    </section>
    <!-- //end Breadcrumbs --> 
    <!-- Small Previews -->
    <section class="container hidden-xs">
      <div class="small-previews"> <a href="#" class="prev"></a>
        <div class="small-preview prev"><img src="{{ URL::asset('/') }}{{$product->url}}" alt="" class="img-responsive"></div>
        <a href="#" class="next"></a>
        <div class="small-preview next"><img src="{{ URL::asset('/') }}{{$product->url}}" alt="" class="img-responsive"></div>
      </div>
    </section>
    <!-- //end Small Previews --> 
    <!-- One column content -->
    <section class="container"> 
      
      <!-- Product view -->
      <div class="product-view row">
        <div class="col-sm-6 col-md-6 col-lg-6">
          <div class="large-image"> <img alt="{{$product->name}}" class = "cloudzoom cartUrl {{$product->id}}" src = "{{ URL::asset('/') }}{{$product->url}}" data-cloudzoom = "zoomImage: '{{ URL::asset('/') }}{{$product->url}}', autoInside : 991" /> </div>
          <div class="flexslider flexslider-thumb">

            <ul class="previews-list slides">
              <li><img class = 'cloudzoom-gallery' alt="#"  src = "{{ URL::asset('/') }}{{$product->url}}" data-cloudzoom = "useZoom: '.cloudzoom', image: '{{ URL::asset('/') }}{{$product->url}}', zoomImage: '{{ URL::asset('/') }}{{$product->url}}', autoInside : 991" ></li>
              <li><img class = 'cloudzoom-gallery' alt="#"  src = "{{ URL::asset('/') }}{{$product->url}}" data-cloudzoom = "useZoom: '.cloudzoom', image: '{{ URL::asset('/') }}{{$product->url}}', zoomImage: '{{ URL::asset('/') }}{{$product->url}}' " ></li>
              <li><img class = 'cloudzoom-gallery' alt="#"  src = "{{ URL::asset('/') }}{{$product->url}}" data-cloudzoom = "useZoom: '.cloudzoom', image: '{{ URL::asset('/') }}{{$product->url}}', zoomImage: '{{ URL::asset('/') }}{{$product->url}}' " ></li>
              <li><img class = 'cloudzoom-gallery' alt="#"  src = "{{ URL::asset('/') }}{{$product->url}}" data-cloudzoom = "useZoom: '.cloudzoom', image: '{{ URL::asset('/') }}{{$product->url}}', zoomImage: '{{ URL::asset('/') }}{{$product->url}}' " ></li> 			  
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6"> 
          
          <!-- Product label -->
          <div class="product-label">
            <div class="box-wrap">
              <div class="box-wrap-top"></div>
              <div class="box-wrap-bot"></div>
              <div class="box-wrap-center"></div>
              <div class="box">
                <div class="box-content">
                  <h2 class="cartName {{$product->id}}">{{$product->name}}</h2>
				  <?php if(in_array($product,App\Category::sale())) {?>
					<span class="price old">{{$product->price}}</span> <span class="price new lastprice {{$product->id}}"><?php echo 0.9*$product->price ;?></span> <br>
				  <?php } else { ?>
					<span class="price lastprice {{$product->id}}">{{$product->price}}</span> <br>
				  <?php } ?>
				  <h2 class ="CartAlert {{$product->id}}">Đã Thêm</h2>
               </div>
              </div>
            </div>
          </div>
          <!-- //end Product label --> 
          
          <!-- Description -->
          <div class="product-description"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span>
            <form>
				  <div class="option"> <b>Số lượng:</b>
					<div class="input-group quantity-control"> <span class="input-group-addon">&minus;</span>
					  <input type="text" class="form-control quantity {{$product->id}}" value="1">
					  <span class="input-group-addon">+</span> </div>
				  </div>
				  <div class="clearfix visible-xs"></div>
				  <a class ="purchase" src="{{URL::asset('/')}}" id="{{$product->id}}"><button class="btn btn-mega btn-lg">MUA HÀNG</button></a>
            </form>
            <div class="panel-group accordion-simple" id="product-accordion">
              <div class="panel">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#product-accordion" href="#product-description"> <span class="arrow-down icon-arrow-down-4"></span> <span class="arrow-up icon-arrow-up-4"></span> Mô tả </a> </div>
                <div id="product-description" class="panel-collapse collapse in">
                  <div class="panel-body"> {{$product->description}} </div>
                </div>
              </div>
			  <div class="panel">
                <div class="panel-heading"> <a data-toggle="collapse" data-parent="#product-accordion" href="#product-size" class="collapsed"> <span class="arrow-down icon-arrow-down-4"></span> <span class="arrow-up icon-arrow-up-4"></span> Bình Luận </a> </div>
                <div id="product-size" class="panel-collapse collapse">
                  <div class="panel-body commentPanel">
						<ul class="commentList">
					   <?php if(count(App\Comment::load_Comments($product->id)) != 0){ ?>
							
								@foreach(App\Comment::load_Comments($product->id) as $com)
								<li><b>{{$com['email']}} :</b><br>
									{{$com['content']}}
								</li>
								@endforeach
							
					   <?php } else echo "<p>Chưa có bình luận nào</p>"; ?>
					    </ul>
					   @if(Auth::check())
						    <form action = "{{url('product/comment') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" id ="product_id" name="product_id" value="{{$product->id}}">
								<input type="hidden" id ="account_id" name="account_id" value=<?php echo Auth::user()->id; ?> src=<?php echo Auth::user()->email; ?>>
								<textarea id="content" name="content" rows="4" cols="50"></textarea>
								<button class="btn btn-mega btn-lg">ĐĂNG</button>
						    </form>
							<p class="result"></p>
					   @else
							<a href="{{ url('loginView')}}">Đăng Nhập để bình luận</a>
					   @endif
				  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- //end Description --> 
          
        </div>
      </div>
      <!-- //end Product view --> <!-- Services -->
      <section class="services-block single small row">
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 divider-right"><a href="#" class="item"> <span class="icon icon-truck"></span>
          <div class="text"><span class="title">Miễn Phi Vận Chuyển</span> </div>
          </a> </div>
      </section>
      <!-- //end Services --> 
      <!-- Upsell products -->
      <section class="slider-products content-box">
        <h3>Các sản phẩm liên quan</h3>
        
        <!-- Products list -->
        <div class="products-list-small">
          <ul class="slides">
			@foreach($related_products as $prod)
				<li>
				  <div class="product-preview">
					<div class="preview animate scale"> <a href="{{ URL::to('product', $prod->id) }}" title="{{$prod->name}}"> <img src="{{ URL::asset('/') }}{{$prod->url}}" alt=""></a> <a href="{{ URL::asset('/') }}{{$prod->url}}" class="quick-view" title="{{$prod->name}}"> <span class="icon-zoom-in-2"></span> Xem </a> </div>
				  </div>
				</li>
			@endforeach
          </ul>
        </div>
        <!-- //end Products list --> 
        <!-- Product view compact -->
        <div class="product-view-ajax">
          <div class="ajax-loader progress progress-striped active">
            <div class="progress-bar progress-bar-danger" role="progressbar"></div>
          </div>
          <div class="layar"></div>
          <div class="product-view-container"> </div>
        </div>
        <!-- //end Product view compact --> 
      </section>
      <!-- //end Upsell products --> 
      
    </section>
    <!-- //end Two columns content -->
	
@endsection

@section('javascript')
<script src="{{ URL::asset('/') }}javascript/comment.js"></script>
@endsection
