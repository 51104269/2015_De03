<!DOCTYPE HTML>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Violet1009 Administration</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container-fluid">
		<?php if($check == true) :?>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">VIOLET1009</a>
						<p class="navbar-brand">Chào quản trị viên !</p>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
								<li><a href="{{ url('/auth/admin-logout') }}">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>
		<?php endif ?>
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class ="notification"></h1>
				<?php if($check == false) :?>
					@include('admin.login')
				<?php endif ?>
			</div>
		</div>
		<div class="row">
			<?php if($check == true) :?>
				<div class="col-md-4">
					<button type="button" class="btn btn-danger accFunc">QUẢN LÝ TÀI KHOẢN</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-danger proFunc">QUẢN LÝ SẢN PHẨM</button>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-danger catFunc">QUẢN LÝ THƯ MỤC</button>
				</div>
				<div class="col-md-12">
					@if(Session::has('success'))
					<div class="alert-success">
						<h3>{!! Session::get('success') !!}</h3>
					</div>
					@endif
					@if(Session::has('error'))
						<h3 class="alert-danger">{!! Session::get('error') !!}</h3>
					@endif
				</div>
			<?php endif ?>
		
		</div>
		<div class="row">
			<?php if($check == true) :?>
				@include('admin.accFunc')
				@include('admin.proFunc')
				@include('admin.catFunc')
			<?php endif ?>
		</div>
	</div>
	
	
	<script src="{{ asset('/javascript/jquery-2.1.3.min.js') }}"></script>
	<script src="{{ asset('/javascript/boostrap.min.js') }}"></script>
	<script src="{{ asset('/javascript/admin.js') }}"></script
</body>
</html>