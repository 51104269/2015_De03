@extends('app')

@section('content')
	<!-- Breadcrumbs -->
    <section class="container">
      <nav class="breadcrumbs"> <a href="{{ url('/')}}">Home</a> <span class="divider">›</span>Thanh Toán</nav>
    </section>
    <!-- //end Breadcrumbs --> 
    
    <!-- Two column content -->
    <section class="container">
      <div class="row">
        <section class="col-md-8 col-lg-8"> 
          
          <!-- Checkout -->
          <section class="content-box">
            <div class="checkout-page"> <img class="back img-responsive" src="images/shopping-cart-back.png" alt="">
              <div class="box">
                <h3>GIỎ HÀNG CỦA BẠN</h3>
                <table>
                  <thead>
                    <tr class="hidden-xs">
                      <th></th>
                      <th>Sản Phẩm</th>
                      <th>Đơn Giá</th>
                      <th>Số Lượng</th>
                      <th>Tổng Cộng</th>
                    </tr>
                  </thead>
                  <tbody>
					@foreach(App\Order::get_Cart(Cookie::get('cart')) as $item)
						<tr id="{{$item['product']->id}}">	
						  <td><a href="#" class="remove-button visible-xs"><span class="icon-cancel-2 "></span></a><a href=""><img class="preview" src="{{ URL::asset('/') }}{{$item['product']->url}}"></a></td>
						  <td><span class="td-name visible-xs">Product</span><a href="#">{{$item['product']->name}}</a></td>
						  <td><span class="td-name visible-xs">Price</span>{{$item['product']->price}}</td>
						  <td><span class="td-name oldQuantity {{$item['product']->id}} visible-xs">{{$item['quantity']}}</span><div class="input-group quantity-control">
							  <span class="form-control quantity {{$item['product']->id}}">{{$item['quantity']}}</span>
							  </div>				  
						  </td> 
						  <td><span class="td-name visible-xs">Total</span><span class="lastprice {{$item['product']->id}}">{{$item['price']}}</span><span> 000VND</span></td>
						</tr>
					@endforeach
                  </tbody>
                </table>
                <div class="pull-left"> <b class="title">Phí chuyển hàng:</b> Miễn Phí </div><br>
				<div class="pull-left"> <b class="title">Phương thức thanh toán:</b> COD (Chuyển tiền khi nhận hàng) </div><br>
                <div class="pull-right">
                  <p><b class="title">Tổng Cộng Hóa Đơn:</b> <span class="price">{{App\Order::total_price(Cookie::get('cart'))}}</span> 000 VND</p>
                </div>
                <div class="clearfix"></div>
				<?php if(App\Order::number_items(Cookie::get('cart')) != 0) { ?>
					<form action="#" id="mailForm">
						
					   <div class="form-group">
						<label class="light">TÊN<span class="required"> *</span></label>
						<input type="text" id="name" name ="name" class="form-control" required  >
					  </div>
					  <div class="form-group">
						<label class="light">ĐỊA CHỈ EMAIL<span class="required"> *</span></label>
						@if(!Auth::check())
							<input type="email" id="email" name ="email" class=form-control">
						@else
							<input type="email" id="email" name ="email" class="form-control" value="{{Auth::user()->email}}" disabled>
						@endif
					  </div>
					  <button type="submit" src="{{ URL::asset('/') }}" class="btn btn-mega">THANH TOÁN</button>
					  <img class="loading" src="{{ URL::asset('/') }}images\loader.gif">
					</form>
				<?php } else echo "<h5>GIỎ HÀNG CỦA BẠN TRỐNG</h5>"; ?> 
				<h5 class="mailNotification"></h5>
              </div>
            </div>
          </section>
          
          <!-- //end Shopping cart --> 
          
        </section>
        <aside class="col-md-4 col-lg-4 shopping_cart-aside"> 
          
          <!-- Coupon -->
          <section class="container-widget">
            <h3>Voucher</h3>
            <form role="form">
              <div class="form-group">
                <label for="coupon">Nhập mã voucher của bạn để nhận 10% giảm giá</label>
                <input type="email" class="form-control input-sm" id="coupon">
              </div>
              <button type="submit" class="btn btn-mega">Áp Dụng Voucher</button>
            </form>
          </section>
          <!-- //end Coupon --> 
          
          <!-- Estimate shipping -->
          <section class="container-widget">
            <h3>VẬN CHUYỂN</h3>
            <form role="form" id="addressForm">
              <div class="form-label">Điền thông tin nơi nhận hàng</div>
              <div class="form-group-sm btn-select btn-select-xl btn-select-wide"> <a href="#" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <span class="value">Tp.Hồ Chí Minh</span> <span class="caret min"></span> </a>
                <ul class="dropdown-menu">
                  <li>Tp.Hồ Chí Minh</li>
                </ul>
              </div>
              <div class="form-group-sm btn-select btn-select-xl btn-select-wide"> <a href="#" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <span class="value">Quận 10</span> <span class="caret min"></span> </a>
                <ul class="dropdown-menu">
                  <li>Quận 10</li>
                </ul>
              </div>
              <div class="form-group">
                <input type="text" name="address" id="address" class="form-control input-sm"  value="Địa Chỉ">
              </div>
              <button type="submit" class="btn btn-mega">Đăng Ký</button>
            </form>
          </section>
          <!-- //end Estimate shipping --> 
          
        </aside>
      </div>
    </section>
@endsection

@section('javascript')
	
@endsection
