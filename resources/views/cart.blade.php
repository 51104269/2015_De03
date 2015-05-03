@extends('app')

@section('content')
	<!-- Breadcrumbs -->
    <section class="container">
      <nav class="breadcrumbs"> <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> Giỏ Hàng </nav>
    </section>
    <!-- //end Breadcrumbs --> 
    
    <!-- Two column content -->
    <section class="container">
      <div class="row">
        <section class="col-md-8 col-lg-8"> 
          
          <!-- Shopping cart -->
          <section class="content-box">
            <div class="shopping_cart"> <img class="back img-responsive" src="images/shopping-cart-back.png" alt="">
              <div class="box">
                <h3>GIỎ HÀNG CỦA BẠN</h3>
                <table>
                  <thead>
                    <tr class="hidden-xs">
                      <th></th>
                      <th></th>
                      <th>Sản Phẩm</th>
                      <th>Đơn Giá</th>
                      <th>Số Lượng</th>
                      <th>Tổng Cộng</th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
					@foreach(App\Order::get_Cart(Cookie::get('cart')) as $item)
						<tr id="{{$item['product']->id}}">	
						  <td><a href="{{$item['product']->id}}" src="{{ URL::asset('/')}}" class="remove-button hidden-xs"><span class="icon-cancel-2 "></span></a></td>
						  <td><a href="#" class="remove-button visible-xs"><span class="icon-cancel-2 "></span></a><a href=""><img class="preview" src="{{ URL::asset('/') }}{{$item['product']->url}}"></a></td>
						  <td><span class="td-name visible-xs">Product</span><a href="#">{{$item['product']->name}}</a></td>
						  <td><span class="td-name visible-xs">Price</span>{{$item['product']->price}}</td>
						  <td><span class="td-name oldQuantity {{$item['product']->id}} visible-xs">{{$item['quantity']}}</span><div class="input-group quantity-control"> <span class="input-group-addon">&minus;</span>
							  <input type="text" class="form-control quantity {{$item['product']->id}}" value="{{$item['quantity']}}">
							  <span class="input-group-addon">+</span>
							  </div>				  
						  </td> 
						  <td><span class="td-name visible-xs">Total</span><span class="lastprice {{$item['product']->id}}">{{$item['price']}}</span><span> 000VND</span></td>
						  <td><a href="{{$item['product']->id}}" src="{{ URL::asset('/')}}" class="edit-button btn  btn-default hidden-xs">Cập Nhập</span></a></td>
						</tr>
					@endforeach
                  </tbody>
                </table>
                <div class="pull-left"> <b class="title">Phí chuyển hàng:</b> Miễn Phí </div>
                <div class="pull-right">
                  <p><b class="title">Tổng Cộng Hóa Đơn:</b> <span class="price">{{App\Order::total_price(Cookie::get('cart'))}}</span> 000 VND</p>
                  <button type="submit" class="btn btn-mega">THANH TOÁN</button>
                </div>
                <div class="clearfix"></div>
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
            <form role="form">
              <div class="form-label">Điền thông tin nơi nhận hàng</div>
              <div class="form-group-sm btn-select btn-select-xl btn-select-wide"> <a href="#" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <span class="value">Tp.Hồ Chí Minh</span> <span class="caret min"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Tp.Hồ Chí Minh</a></li>
                </ul>
              </div>
              <div class="form-group-sm btn-select btn-select-xl btn-select-wide"> <a href="#" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <span class="value">Quận</span> <span class="caret min"></span> </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Quận 10<a></li>
                </ul>
              </div>
              <div class="form-group">
                <input type="text" class="form-control input-sm"  value="Zip/Postal Code" onblur="if (this.value == '') {this.value = 'Zip/Postal Code';}" onfocus="if(this.value == 'Zip/Postal Code') {this.value = '';}">
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
