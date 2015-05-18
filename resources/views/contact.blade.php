@extends('app')

@section('content')
	<section class="container">
        <nav class="breadcrumbs">
            <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> Liên Hệ
        </nav>
    </section>
	<section class="container contacts">
      <div class="row">
        <section class="col-md-4 col-lg-4">
          <h3>Liện hệ với Violet 1009 </h3>
          <ul class="simple-list compressed-list address">
			<li><span class="icon icon-house"></span> Lý Thường Kiệt, Quận 10, Tp.HCM</li>
			<li><span class="icon icon-phone-4"></span> 016550432**</li>
			<li><span class="icon icon-envelop"></span> <a href="mailto:info@mydomain.com">51103220@hcmut.edu.vn</a></li>
			<li><span class="icon icon-skype-2"></span> <a href="#">violet1009.tk</a></li>
          </ul>
          <div class="map">
            <iframe src="https://www.google.com/maps/embed/v1/place?q=%C4%90%E1%BA%A1i%20h%E1%BB%8Dc%20B%C3%A1ch%20Khoa%2C%20ph%C6%B0%E1%BB%9Dng%2014%2C%20H%E1%BB%93%20Ch%C3%AD%20Minh%2C%20Vi%E1%BB%87t%20Nam&key=AIzaSyCoFs6v5E-BEcI-FW6bcGpo9bUyzYNp25E" class="google-map-big"></iframe>
          </div>
        </section>
        <section class="col-md-8 col-lg-8"> 
          
          <!-- Contacts form -->
          <div class="contacts-form">
            <div class="wrap-paper">
             
            <img class="back" src="{{ URL::asset('/') }}images/women.png" alt=""> </div>
          <!-- //end Contacts form --> 
          
        </section>
      </div>
    </section>
    <!-- //end Two columns content --> 
@endsection

@section('javascript')
	
@endsection
