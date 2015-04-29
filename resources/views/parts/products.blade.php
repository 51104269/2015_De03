<section class="container content slider-products"> 
      <!-- Products list -->
      <div class="row">
        <div class="products-list-isotope">
		@foreach(App\Category::sale() as $product)
          <div class="product-preview category3">
            <div class="preview animate scale"> <a href="{{ URL::to('product', $product->id) }}" class="preview-image"><img class="img-responsive animate scale" src="{{ URL::asset('/') }}{{$product->url}}" width="270" height="328" alt=""></a>
              <ul class="product-controls-list right">
                <li><span class="label label-sale">SALE</span></li>
                <li><span class="label">-10%</span></li>
              </ul>
              <ul class="product-controls-list right hide-right">
                <li class="top-out"></li>
                <li><a href="#" class="cart"><span class="icon-basket"></span></a></li>
              </ul>
              <a href="{{ URL::to('product', $product->id) }}" class="quick-view  fancybox fancybox.ajax hidden-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span> <span class="icon-zoom-in-2"></span> Xem </a>
              <div class="quick-view visible-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span></div>
            </div>
            <h3 class="title"><a href="#">{{$product->name}}</a></h3>
            <span class="price old">{{$product->price}}</span> <span class="price new"><?php echo 0.9*$product->price ;?></span> </div>
        @endforeach  
		@foreach(App\Category::bestSeller() as $product)
          <div class="product-preview category1">
            <div class="preview animate scale"> <a href="{{ URL::to('product', $product->id) }}" class="preview-image"><img class="img-responsive animate scale" src="{{ URL::asset('/') }}{{$product->url}}" width="270" height="328" alt=""></a>
              <ul class="product-controls-list right hide-right">
                <li class="top-out"></li>
                <li><a href="#" class="cart"><span class="icon-basket"></span></a></li>
              </ul>
              <a href="{{ URL::to('product', $product->id) }}" class="quick-view  fancybox fancybox.ajax hidden-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span> <span class="icon-zoom-in-2"></span> Xem </a>
              <div class="quick-view visible-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span></div>
            </div>
            <h3 class="title"><a href="#">{{$product->name}}</a></h3>
           <span class="price">{{$product->price}}</span> </div>
        @endforeach 
		@foreach(App\Category::newProduct() as $product)
          <div class="product-preview category2">
            <div class="preview animate scale"> <a href="{{ URL::to('product', $product->id) }}" class="preview-image"><img class="img-responsive animate scale" src="{{ URL::asset('/') }}{{$product->url}}" width="270" height="328" alt=""></a>
              <ul class="product-controls-list">
                <li><span class="label label-new">NEW</span></li>
              </ul>
			  <ul class="product-controls-list right hide-right">
                <li class="top-out"></li>
                <li><a href="#" class="cart"><span class="icon-basket"></span></a></li>
              </ul>
              <a href="{{ URL::to('product', $product->id) }}" class="quick-view  fancybox fancybox.ajax hidden-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span> <span class="icon-zoom-in-2"></span> Xem </a>
              <div class="quick-view visible-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span></div>
            </div>
            <h3 class="title"><a href="#">{{$product->name}}</a></h3>
            <span class="price">{{$product->price}}</span> </div>
        @endforeach
		@foreach(App\Category::violet() as $product)
          <div class="product-preview category4">
            <div class="preview animate scale"> <a href="{{ URL::to('product', $product->id) }}" class="preview-image"><img class="img-responsive animate scale" src="{{ URL::asset('/') }}{{$product->url}}" width="270" height="328" alt=""></a>
              <ul class="product-controls-list">
                <li><span class="label label-new">VIOLET</span></li>
              </ul>
			  <ul class="product-controls-list right hide-right">
                <li class="top-out"></li>
                <li><a href="#" class="cart"><span class="icon-basket"></span></a></li>
              </ul>
              <a href="{{ URL::to('product', $product->id) }}" class="quick-view  fancybox fancybox.ajax hidden-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span> <span class="icon-zoom-in-2"></span> Xem </a>
              <div class="quick-view visible-xs"> <span class="rating"> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-3"></i> <i class="icon-star-empty"></i> </span></div>
            </div>
            <h3 class="title"><a href="#">{{$product->name}}</a></h3>
            <span class="price">{{$product->price}}</span> </div>
        @endforeach
          
      <!-- //end Products list --> 
</section>