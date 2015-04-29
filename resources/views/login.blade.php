@extends('app')

@section('content')
	<section class="container">
      <nav class="breadcrumbs"> <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> Đăng Nhập </nav>
    </section>
	<section class="container">
      <div class="row">
        <section class="col-sm-6 col-md-6 col-lg-6">
          <section class="container-with-large-icon login-form">
            <div class="large-icon"><img src="images/large-icon-user.png" alt=""></div>
            <div class="wrap">
              <h3>KHÁCH HÀNG MỚI</h3>
              <p>Tạo tài khoản để nhận những ưu đãi của Forever Young.</p>
              <br>
              <a href="{{ url('signupView') }}"><button class="btn btn-mega">TIẾP TỤC</button></a>
            </div>
          </section>
        </section>
        <section class="col-sm-6 col-md-6 col-lg-6">
          <section class="container-with-large-icon login-form">
            <div class="large-icon"><img src="images/large-icon-lock.png" alt=""></div>
            <div class="wrap">
              <h3>ĐĂNG NHẬP</h3>
              <form action="{{ url('auth/user-login') }}"  role = "form" method = "POST" id="form-returning">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
				<div class="form-group">
                  <label for="password">Ghi Nhớ Thông Tin</label>
                  <input type="checkbox" name="remember">
                </div>
                <div class="form-link"> <a href="#">Quên Password?</a> </div>
                <button type="submit" class="btn btn-mega">ĐĂNG NHẬP</button>
              </form>
            </div>
			<p id="result"></p>
          </section>
        </section>
      </div>
    </section>
@endsection

@section('javascript')
	<script src="javascript/login.js"></script>
@endsection
