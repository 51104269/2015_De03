@extends('app')

@section('content')
	<section class="container">
        <nav class="breadcrumbs">
            <a href="{{ url('/')}}">Home</a> <span class="divider">›</span> Tìm Kiếm
        </nav>
    </section>
	<section class="container">
    <h3>Kết quả tìm kiếm cho {{$value}}</h3>
    <div class="row">
		<?php if(empty($products))
				echo " <div class=\"col-sm-4\"><p>Không Tìm Thấy Sản Phẩm Nào</p></div>";
			  else
		?>
		@foreach($products as $prod)
        <div class="col-sm-4">
          <div class="image-wrapper"><a class="fancybox-gallery" href="{{ URL::to('product', $prod['id']) }}"><img class="animate scale" src="{{ URL::asset('/') }}{{$prod['url']}}" alt="Image1">
            <div class="image-hover"><i class="icon-zoom-in-2"></i></div>
            <div class="image-title">{{$prod['name']}}</div>
            </a> </div>
        </div>
		@endforeach
		
    </div>
    </section>
@endsection

@section('javascript')
	
@endsection
