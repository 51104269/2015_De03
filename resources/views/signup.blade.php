@extends('app')

@section('content')
	<section class="container">
      <nav class="breadcrumbs"> <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> Đăng Ký </nav>
    </section>
	<section class="container">
      <div class="row">
        <section class="col-sm-12 col-md-12 col-lg-12">
          <section class="container-with-large-icon login-form">
            <div class="large-icon"><img src="images/large-icon-lock.png" alt=""></div>
            <div class="wrap">
              <h3>ĐĂNG KÝ</h3>
              <form action="{{ url('auth/user-signup') }}"  role = "form" method = "POST" id="form-returning">
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
                  <label for="re-password">Nhập lại Password</label>
                  <input type="password" class="form-control" name="re-password" id="re-password">
                </div>
				<div class="form-group">
                  <label for="account-type">Loại tài khoản</label>
                  <select name="account-type" id="account-type" class="form-control">
						  <option value="user">Khách Hàng</option>
					</select>
                </div>
                <button type="submit" class="btn btn-mega">ĐĂNG KÝ</button>
              </form>
            </div>
			<p id="result"></p>
          </section>
        </section>
      </div>
    </section>
@endsection

@section('javascript')
	<script src="javascript/signup.js"></script>
@endsection
