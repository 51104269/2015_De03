<div id = "admin-login-panel">
	<div class="panel panel-default">
		<div class="panel-heading">Đăng Nhập - Dành cho quản trị viên của Violet1009</div>
		<div class="panel-body">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Lỗi!</strong> Có lỗi với thông tin bạn nhập.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<form class="form-horizontal" role="form" id="admin-login-form" method="POST" action="{{ url('auth/admin-login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label class="col-md-4 control-label">E-Mail</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Mật Khẩu</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password" required>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember"> Ghi nhớ thông tin
						</label>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">Đăng Nhập</button>

					<a class="btn btn-link" href="{{ url('/password/email') }}">Quên mật khẩu?</a>
				</div>
			</div>
		</form>
		</div>
	</div>
</div> 

