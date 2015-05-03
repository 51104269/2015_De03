<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Violet1009">
<meta name="author" content="Dedorewan">
<title>VIOLET1009 SHOP</title>
<!-- CSS preloader -->
{!! HTML::style('css/main.css') !!}
{!! HTML::style('main/css/loader.css') !!}
<!-- Bootstrap core CSS -->
{!! HTML::style('main/css/bootstrap.min.css') !!}
<!-- Custom styles for this template -->
{!! HTML::style('main/css/megatron-template.css') !!}
<!-- CSS modules -->
{!! HTML::style('main/css/icomoon.css') !!}
{!! HTML::style('main/css/fontello.css') !!}
{!! HTML::style('main/css/flexslider.css') !!} 
{!! HTML::style('main/css/jcarousel.css') !!} 
{!! HTML::style('main/css/owl.carousel.css') !!} 
{!! HTML::style('main/css/owl.theme.css') !!}
{!! HTML::style('main/css/cloudzoom.css') !!}
{!! HTML::style('main/css/sfmenu.css') !!}
{!! HTML::style('main/css/isotope.css') !!} 
{!! HTML::style('main/css/smoothness/jquery-ui-1.10.3.custom.min.css') !!} 
{!! HTML::style('main/css/jquery.fancybox.css') !!} 
{!! HTML::style('main/css/hoverfold.css') !!} 
 
{!! HTML::style('main/rs-plugin/css/settings.css', array('media' => 'screen')) !!}
{!! HTML::style('main/rs-plugin/css/extralayers.css', array('media' => 'screen')) !!}
<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

</head>
<body class="responsive">
<div class="loader">
  <div class="bubblingG"> <span id="bubblingG_1"> </span> <span id="bubblingG_2"> </span> <span id="bubblingG_3"> </span> </div>
</div>
<!-- Off Canvas Menu -->
<nav id="off-canvas-menu" >
  <div id="off-canvas-menu-title">MENU<span class="icon icon-cancel-3" id="off-canvas-menu-close"></span></div>
  <ul class="expander-list">
    <li> <span class="name"><span class="expander">-</span> <a href="#">Trang Chủ</a></span></li>
    <li> <span class="name"><span class="expander">-</span> <a href="#">Khuyến Mãi</a></span></li>
    <li> <span class="name"> <span class="expander">-</span> <a href="#">Thư Mục</a> </span>
		<ul>
			@foreach(App\Category::all() as $cat)
				<?php if($cat->name !='sale' && $cat->name !='newProduct' && $cat->name !='bestSeller' && $cat->name !='violet' ) {?>
					<li> <span class="name"><a href="{{ URL::to('category', $cat->id) }}" > {{$cat['name']}} </a> </span></li>
				<?php }?>
			@endforeach
		</ul>
    </li>
    <li><span class="name"><a href="#">Liên Hệ</a></span></li>
  </ul>
</nav>
<!-- //end Off Canvas Menu -->

<div id="outer">
  <div id="outer-canvas"> <!-- Navbar -->
    <header> 
      
      <!-- Back to top -->
      <div class="back-to-top"><span class="icon-arrow-up-4"></span></div>
      <!-- //end Back to top -->
      
      <section class="navbar">
        <div class="background">
          <div class="container"> 
            <!-- Logo -->
            <div class="navbar-logo pull-left"> <a href="#"><img src="{{ URL::asset('/') }}images/header-logo.png" alt="Violet1009"></a></div>
            <div class="navbar-welcome pull-left compact-hidden hidden-xs">Chào mừng đến với Violet1009  <?php echo Cookie::get('cart'); ?> </div>
            <div class="clearfix visible-sm"></div>
            <!-- //end Logo --> 
            <!-- Secondary menu -->
            <div class="navbar-secondary-menu pull-right hidden-xs">
				@if(Auth::check())
					<div class="btn-group compact-hidden"> <p class="btn btn-xs btn-default ">Chào Mừng {{Auth::user()->email}}</p>	
					</div>
				@endif	
              <div class="btn-group compact-hidden"> <a href="#"  class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown"> <span class="icon icon-vcard"></span> Tài Khoản <span class="caret"></span> </a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Thanh Toán</a></li>
                  <li class="divider"></li>
				  @if (!Auth::check())
					<li><a href="{{ url('loginView')}}">Đăng Nhập</a></li>
					<li><a href="{{ url('signupView') }}">Đăng Ký</a></li>
				  @else 
					  <li><a href="#">Tài Khoản</a></li>
					 <li><a href="{{ url('auth/user-logout') }}">Đăng Xuất</a></li>	
					 <li><a href="{{ url('cart')}}">Giỏ Hàng</a></li>	
				  @endif
                </ul>
              </div>
              <div class="btn-group"> <a href="#"  class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown"> <span class="compact-hidden">Giỏ hàng - <span class = "preview-cart total">{{App\Order::total_price(Cookie::get('cart'))}}</span> 000VND</span> <span class="icon-xcart-animate"><span class="box ajaxCartQuantity">{{App\Order::number_items(Cookie::get('cart'))}}</span><span class="handle"></span></span> </a>
                <div class="dropdown-menu pull-right shoppingcart-box" role="menu"> Sản phẩm mới thêm vào 
                  <ul class="list">
					<?php $product = App\Order::last_product(Cookie::get('cart'));
						  if ($product != null){
					?>
                    <li class="item"> <a href="#" class="preview-image"><img class="preview preview-cart url" src="{{ URL::asset('/') }}{{$product->url}}" alt=""></a>
                      <div class="description"> <a href="#" class = "preview-cart name">{{$product->name}}</a> <strong class="preview-cart price">{{$product->price}}</strong>VND</div>
                    </li>
					<?php } else echo "<li>Không có sản phẩm nào</li>";?>
                  </ul>
                  <div class="total">Tổng cộng: <span class ="preview-cart total">{{App\Order::total_price(Cookie::get('cart'))}}</span> 000VND</div>
                  <a href="#" class="btn btn-mega">Thanh Toán</a>
                  <div class="view-link"><a href="{{ url('cart')}}">Xem giỏ hàng </a></div>
                </div>
              </div>
            </div>
            
            <!-- Search -->
            <form class="navbar-search form-inline hidden-xs pull-right" role="form">
              <div class="form-group">
                <button type="submit" class="button"><span class="icon-search-2"></span></button>
                <input type="text" class="form-control" value="Tìm Kiếm" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if(this.value == 'Search') {this.value = '';}">
              </div>
              <div class="dropdown-search">
                <ul>
                  <li><a href="#"><span class="amount">12</span>search auto</a></li>
                  <li><a href="#"><span class="amount">22</span>search auto</a></li>
                </ul>
              </div>
            </form>
            <!-- //end Search --> <!-- Main menu -->
            <dl class="navbar-main-menu hidden-xs">
              <dt class="item">
                <ul class="sf-menu">
                  <li><a href="#" class="btn-main"><span class="icon icon-home"></span></a>
                  </li>
                </ul>
              </dt>
              <dd></dd>
              <dt class="item">
                <ul class="sf-menu">
                  <li> <a href="#"> Sản Phẩm Nữ </a>
                    <ul>
						@foreach(App\Category::female_products() as $i => $cat)
							<li> <a href="{{ URL::to('category', $cat['id']) }}" > {{$cat['name']}} </a> </li>
						@endforeach
                    </ul>
                  </li>
                </ul>
              </dt>
              <dd></dd>
				<dt class="item">
				<ul class="sf-menu">
				  <li> <a href="#"> Sản Phẩm Nam </a>
					<ul>
					    @foreach(App\Category::male_products() as $i => $cat)
							<li> <a href="{{ URL::to('category', $cat['id']) }}" > {{$cat['name']}} </a> </li>
						@endforeach
					</ul>
				  </li>
				</ul>
				</dt>	
			  <dd></dd>
			  <dt class="item">
				<ul class="sf-menu">
				  <li> <a href="#"> VIOLET style </a>
					<ul>
					  <li> <a href="{{ URL::to('category', 15) }}"> Hàng Độc </a> </li>
					</ul>
				  </li>
				</ul>
				</dt>	
			  <dd></dd>
              <dt class="item compact-hidden"> <a href="#" class="btn-main line">Khuyến Mãi</a> </dt>
              <dd class="item-content">
                <div class="navbar-main-submenu">
                  <div class="row wrapper">
					@foreach(App\Category::sale() as $product)
                    <div class="col-xs-4 col-md-3 col-lg-2">
                      <div class="submenu-block submenu-block-other"> <img src="{{ URL::asset('/') }}{{$product->url}}" class="img-responsive" alt="">
                        <div class="title"><a class="name" href="{{ URL::to('product', $product->id) }}">{{$product->name}}</a> <span class="label label-mega">-10%</span></div>
                        <ul>
                          <li><a href="#">{{$product->name}}</a></li>
                        </ul>
                        <p>{{$product->name}} đang giảm giá 10%</p>
                      </div>
                    </div>
					@endforeach
                  </div>
                </div>
              </dd>
              <dt class="item"> <a href="#" class="btn-main line">LIÊN HỆ</a> </dt>
              <dd></dd>
            </dl>
            <!-- //end Main menu --> 
            
          </div>
        </div>
        <!-- Mobile menu -->
        <div class="container visible-xs">
          <div class="mobile-nav row">
            <div class="nav-item item-01"><a href="#" id="off-canvas-menu-toggle"><span class="icon icon-list-4"></span></a></div>
            <div class="nav-item item-02"><a href="#"><span class="icon icon-vcard"></span></a>
              <div class="tab-content">
                <ul class="menu-list">
                  <li><a href="#">Thanh Toán</a></li>
                   @if (!Auth::check())
					<li><a href="{{ url('loginView')}}">Đăng Nhập</a></li>
					<li><a href="{{ url('signupView') }}">Đăng Ký</a></li>
				  @else 
					 <li><a href="#">Tài Khoản</a></li>
					 <li><a href="{{ url('auth/user-logout') }}">Đăng Xuất</a></li>	
				  @endif
                </ul>
              </div>
            </div>
            <div class="nav-item item-03"><a href="#"><span class="icon icon-search-2"></span></a>
              <div class="tab-content"> <!-- Search -->
                <form class="navbar-search form-inline" role="form">
                  <div class="form-group">
                    <button type="submit" class="button"><span class="icon-search-2"></span></button>
                    <input type="text" class="form-control" value="Tiềm Kiếm" onblur="if (this.value == '') {this.value = 'Search';}" onfocus="if(this.value == 'Search') {this.value = '';}">
                  </div>
                </form>
                <!-- //end Search --> 
              </div>
            </div>
            <div class="nav-item item-04"><a href="#"><span class="icon-xcart-white"><span class="box ajaxCartQuantity">{{App\Order::number_items(Cookie::get('cart'))}}</span></span></a>
              <div class="tab-content">
                <div class="shoppingcart-box">
                  <div class="title">Sản phẩm mới thêm vào</div>
                  <ul class="list">
                    <?php $product = App\Order::last_product(Cookie::get('cart'));
						  if ($product != null){
					?>
                    <li class="item"> <a href="#" class="preview-image"><img class="preview preview-cart url" src="{{ URL::asset('/') }}{{$product->url}}" alt=""></a>
                      <div class="description"> <a href="#" class = "preview-cart name">{{$product->name}}</a> <strong class="preview-cart price">{{$product->price}}</strong>VND</div>
                    </li>
					<?php } else echo "<li>Không có sản phẩm nào</li>";?>
                  </ul>
                  <div class="total">Tổng cộng: <span class ="preview-cart total">{{App\Order::total_price(Cookie::get('cart'))}}</span> 000VND</div>
                  <a href="#" class="btn btn-mega">Thanh Toán</a>
                  <div class="view-link"><a href="#">Xem giỏ hàng </a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- //end Mobile menu --> 
        <!-- Navbar switcher -->
        <div class="navbar-switcher-container">
          <div class="navbar-switcher"> <span class="i-inactive"><img src="{{ URL::asset('/') }}images/icon-megatron.png" width="35" height="35" alt=""></span> <span class="i-active icon-cancel-3"></span> </div>
        </div>
        <!-- //end Navbar switcher --> 
        
      </section>
      <!-- Navbar height -->
      <div class="navbar-height-inner"></div>
      <!-- Navbar height --> 
      
      <!-- Navbar height -->
      <div class="navbar-height"></div>
      <!-- Navbar height --> 
    </header>
    <!-- //end Navbar -->
	
	<!-- CONTENTS -->
    @yield('content')
	<!-- end CONTENTS-->
	
    <!-- Blog widget -->
    <section class="blog-widget parallax">
      <div class="container content">
        <h3>Thời Trang NEWS</h3>
        <div class="posts flexslider">
          <ul class="slides">
            <li>
              <div class="image-cell"><a href="blog.html"><img src="{{ URL::asset('/') }}images/temp/block-image-03-176x119.jpg" class="img-responsive animate scale" alt=""></a></div>
              <div class="offset-image">
                <h4><a href="#">Cập Nhật Giao Diện Chính </a></h4>
                <p>Thêm các chức năng màn hình chính.<br> Nguyễn Tiến Thành 01-05-2015</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- //end Blog widget --> <!-- Social navbar -->
    <section class="content content-border nopad-xs social-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6  col-lg-6 newsletter collapsed-block">
            <div class="row">
              <div class="col-lg-5  col-md-12 col-sm-12 ">
                <h3>ĐĂNG KÝ NHẬN TIN <a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
              </div>
              <div class="col-sm-12 col-md-12 col-lg-6 tabBlock" id="TabBlock-1">
                <p>Điền email và gửi cho Violet1009 để nhận được Voucher 10%</p>
                <form class="form-inline" role="form">
                  <div class="form-group input-control">
                    <button type="submit" class="button"><span class="icon-envelop"></span></button>
                    <input type="text" class="form-control" value="Địa Chỉ E-mail..." onblur="if (this.value == '') {this.value = 'Your E-mail...';}" onfocus="if(this.value == 'Your E-mail...') {this.value = '';}">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 collapsed-block">
            <h3>TRUY CẬP FANPAGE<a class="expander visible-xs" href="#TabBlock-2">+</a></h3>
            <div  class="tabBlock" id="TabBlock-2">
              <ul class="find-us">
                <li class="divider"><a href="#" class="animate-scale"><span class="icon icon-facebook-3"></span></a></li>
                <li class="divider"><a href="#" class="animate-scale"><span class="icon icon-youtube-3"></span></a></li>
                <li class="divider"><a href="#" class="animate-scale"><span class="icon icon-googleplus-2"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- //end Social navbar --> 
    
    <!-- Footer -->
    <footer>
      <section class="footer-navbar dark">
        <div class="container content nopad-xs">
          <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 collapsed-block">
              <h3>Thông tin<a class="expander visible-xs" href="#TabBlock-3">+</a></h3>
              <div  class="tabBlock" id="TabBlock-3">
                <ul class="menu">
                  <li><a href="about.html">Về Team</a></li>
                  <li><a href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 collapsed-block"> <h3><span class="attention"><span class="attention_icon"></span></span>Khách Hàng<a class="expander visible-xs" href="#TabBlock-4">+</a></h3>
              <div  class="tabBlock" id="TabBlock-4">
                <ul class="menu">
                  <li><a href="#">Hỗ Trợ Online</a></li>
                </ul>
              </div>
            </div>
            <div class="clearfix visible-sm"></div>
            <div class="col-sm-6 col-md-3 col-lg-3 collapsed-block">
              <h3>Tài Khoản<a class="expander visible-xs" href="#TabBlock-5">+</a></h3>
              <div  class="tabBlock" id="TabBlock-5">
                <ul class="menu">
                  <li><a href="#">Tài Khoản Của Bạn</a></li>
                  <li><a href="#">Lịch Sử Đặt Hàng</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 collapsed-block">
              <h3>Địa Chỉ Violet 1009<a class="expander visible-xs" href="#TabBlock-6">+</a></h3>
              <div  class="tabBlock" id="TabBlock-6">
                <ul class="menu">
                  <li><span class="icon icon-house"></span> Lý Thường Kiệt, Quận 10, Tp.HCM</li>
                  <li><span class="icon icon-phone-4"></span> 016550432**</li>
                  <li><span class="icon icon-envelop"></span> <a href="mailto:info@mydomain.com">51103220@hcmut.edu.vn</a></li>
                  <li><span class="icon icon-skype-2"></span> <a href="#">violet1009.tk</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </footer>
    <div id="outer-overlay"></div>
    <!-- //end Footer --></div>
</div>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --> 
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]--> 

{!! HTML::script('main/js/jquery-1.10.2.min.js') !!}
{!! HTML::script('main/js/jquery.easing.1.3.js') !!}
{!! HTML::script('main/js/jquery-ui-1.10.3.custom.min.js') !!}
{!! HTML::script('main/js/jquery.ui.touch-punch.min.js') !!}
{!! HTML::script('main/js/jquery.mousewheel.min.js') !!}
{!! HTML::script('main/js/bootstrap.min.js') !!}
{!! HTML::script('main/js/jquery.flexslider.js') !!}  
{!! HTML::script('main/js/owl.carousel.js') !!}
{!! HTML::script('main/js/jquery.jcarousel.min.js') !!} 
{!! HTML::script('main/js/cloudzoom.js') !!} 
{!! HTML::script('main/js/jquery.isotope.min.js') !!} 
{!! HTML::script('main/js/jquery.parallax.js') !!}
{!! HTML::script('main/js/jquery.fancybox.js?v=2.1.5.js') !!}
{!! HTML::script('main/js/jquery.inview.js') !!}
{!! HTML::script('main/js/hoverIntent.js') !!}
{!! HTML::script('main/js/superfish.js') !!}
{!! HTML::script('main/js/supersubs.js') !!}
{!! HTML::script('main/js/jquery.plugin.js') !!}
{!! HTML::script('main/js/jquery.countdown.js') !!} 
{!! HTML::script('main/js/jquery.carouFredSel-6.2.1-packed.js') !!}
{!! HTML::script('main/js/megatron.js') !!} 
{!! HTML::script('javascript/cart_handle.js') !!} 
<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="main/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="main/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript">
				jQuery(document).ready(function() {
					jQuery('.tp-banner').show().revolution(
					{
						dottedOverlay:"none",
						delay:16000,
						startwidth:1170,
						startheight:795,
						hideThumbs:200,
						
						thumbWidth:100,
						thumbHeight:50,
						thumbAmount:5,
						
						navigationType:"none",
						navigationArrows:"solo",
						navigationStyle:"none",
						
						touchenabled:"on",
						onHoverStop:"on",
						
						swipe_velocity: 0.7,
						swipe_min_touches: 1,
						swipe_max_touches: 1,
						drag_block_vertical: false,
												
												parallax:"mouse",
						parallaxBgFreeze:"on",
						parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
												
						keyboardNavigation:"off",
						
						navigationHAlign:"center",
						navigationVAlign:"bottom",
						navigationHOffset:0,
						navigationVOffset:20,

						soloArrowLeftHalign:"left",
						soloArrowLeftValign:"center",
						soloArrowLeftHOffset:20,
						soloArrowLeftVOffset:0,

						soloArrowRightHalign:"right",
						soloArrowRightValign:"center",
						soloArrowRightHOffset:20,
						soloArrowRightVOffset:0,
								
						shadow:0,
						fullWidth:"off",
						fullScreen:"on",

						spinner:"off",
						
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,

						shuffle:"off",
						
						autoHeight:"off",						
						forceFullWidth:"off",						
												
												
												
						hideThumbsOnMobile:"off",
						hideNavDelayOnMobile:1500,						
						hideBulletsOnMobile:"off",
						hideArrowsOnMobile:"off",
						hideThumbsUnderResolution:0,
						hideTimerBar:"on",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						startWithSlide:0,
						fullScreenOffsetContainer: ".navbar"	
					});
				});	//ready
			</script>
@yield('javascript')
</body>
</html>
