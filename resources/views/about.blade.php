@extends('app')

@section('content')
	<section class="container">
        <nav class="breadcrumbs">
            <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> Về Team
        </nav>
    </section>
	<!-- Our team -->
  <section class="content-row">
    <div class="grey-container">
      <div class="container">
        <h3>TEAM VIOLET1009</h3>
        <div class="row">
          <div class="member-info col-sm-6 col-md-3 col-lg-3">
            <div class="photo"> <img class="img-responsive animate scale" src="{{ URL::asset('/') }}images/dedorewan.jpg" alt=""> </div>
            <div class="name"><strong>Nguyễn Tiến Thành</strong>, Developer</div>
            <div class="about">Sinh năm 1993.<br> Chuyên ngành Khoa Học Máy Tính trường Đại Học Bách Khoa TP.HCM.<br>Lĩnh vực nghiên cứu: Ứng dụng Website và Kỹ Thuật Dịch Ngược.<br>Nhà phát triển của young4ever.tk. </div>
            <a class="contact-icon" href="https://www.facebook.com/dedorewan"><span class="icon-facebook-3"></span></a></div>
        </div>
      </div>
    </div>
  </section>
  <section class="container content-row">
    <h3>CHÚNG TÔI NGHĨ</h3>
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="quote-block">
          <div class="media"> <a class="pull-left" href="#"> <img class="media-object" src="{{ URL::asset('/') }}images/dedorewan.jpg" width="100" height="100" alt="..."> </a>
            <div class="media-body">
              <h4 class="media-heading"><a href="#">Nguyễn Tiến Thành</a></h4>
              Tôi ghét nhất là khi Voldermort dùng hết chai dầu gội đầu của tôi... </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- //end Two columns content --> 
@endsection

@section('javascript')
	
@endsection
