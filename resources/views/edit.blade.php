@extends('app')

@section('content')
	<section class="container">
      <nav class="breadcrumbs"> <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> Đổi Mật Khẩu </nav>
    </section>
	<section class="container">
      <div class="row">
        <section class="col-sm-6 col-md-6 col-lg-6">
          <section class="container-with-large-icon login-form">
            <div class="large-icon"><img src="{{ URL::asset('/') }}images/large-icon-user.png" alt=""></div>
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
            <div class="large-icon"><img src="{{ URL::asset('/') }}images/large-icon-lock.png" alt=""></div>
            <div class="wrap">
              <h3>ĐỔI MẬT KHẨU</h3>
              <form action="{{url('auth/user-edit') }}"  role = "form" method = "POST" id="edit-form-returning">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="password">Nhập mẫu khẩu cũ</label>
                  <input type="password" class="form-control" name="old-password" id="old-password" required>
                </div>
				<div class="form-group">
                  <label for="password">Nhập mật khẩu mới</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
				<div class="form-group">
                  <label for="password">Nhập lại mật khẩu mới</label>
                  <input type="password" class="form-control" name="re-password" id="re-password" required>
                </div>
                <button type="submit" class="btn btn-mega">ĐỔI MẬT KHẨU</button>
              </form>
            </div>
			<p id="result"></p>
          </section>
        </section>
      </div>
    </section>
@endsection

@section('javascript')
	<script src="{{ URL::asset('/') }}javascript/login.js"></script>
@endsection
