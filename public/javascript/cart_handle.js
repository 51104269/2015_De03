/*
  Created 27/04/2015 by NTT	
*/

$(".product-preview .cart").click(function(e){
	e.preventDefault();
	var id = $(this).attr('href');
	var quantity = 1;
	var price = parseInt($(".product-preview .lastprice" + "." + id.toString()).html());
	price = price/1000;
	var name =	$(".product-preview .cartName" + "." + id.toString()).html();
	var url = $(".product-preview .cartUrl" + "." + id.toString()).attr('src');
	var currentNum = parseInt($(".ajaxCartQuantity").html());
	var currentPrice = parseInt($("span.preview-cart.total").html());
	$.ajax({
        url: "cart/add",
        type: "get",
        data: {id: id, quantity: quantity, price: price},
		dataType: 'json',	
        success: function(data){
			$(".ajaxCartQuantity").html(currentNum + 1);
			$("span.preview-cart.total").html(currentPrice + price);
			$("a.preview-cart.name").html(name);
			$("strong.preview-cart.price").html(price);
			$("img.preview-cart.url").attr('src',url);
			$(".product-preview .product-controls-list .CartAlert" + "." + id.toString()).show('slow');
			$( ".product-preview .product-controls-list .CartAlert" + "." + id.toString()).hide( "slide", { direction: "right" }, "slow" );
			
        },
        error: function(request, status, error) {
			alert(request.responseText);
		}
    });
});

$(".product-view .purchase").click(function(e){
	e.preventDefault();
	var src = $(this).attr('src');
	var id = $(this).attr('id');
	var quantity = parseInt($(".product-view .quantity" + "." + id.toString()).val());
	var price = parseInt($(".product-view .lastprice" + "." + id.toString()).html());
	price = price*quantity/1000;
	var name = $(".product-view .cartName" + "." + id.toString()).html();
	var url = $(".product-view .cartUrl" + "." + id.toString()).attr('src');
	var currentNum = parseInt($(".ajaxCartQuantity").html());
	currentNum = currentNum + quantity;
	var currentPrice = parseInt($("span.preview-cart.total").html());
	currentPrice = currentPrice + price;
	$.ajax({
        url: src +"cart/add",
        type: "get",
        data: {id: id, quantity: quantity, price: price},
		dataType: 'json',	
        success: function(data){
			$(".ajaxCartQuantity").html(currentNum);
			$("span.preview-cart.total").html(currentPrice);
			$("a.preview-cart.name").html(name);
			$("strong.preview-cart.price").html(price);
			$("img.preview-cart.url").attr('src',url);
			$(".product-view .CartAlert" + "." + id.toString()).show('slow');
			$(".product-view .CartAlert" + "." + id.toString()).hide( "slide", { direction: "right" }, "slow" );
			
        },
        error: function(request, status, error) {
			alert(request.responseText);
		}
    });
});

$(".shopping_cart .remove-button").click(function(e){
	e.preventDefault();
	var src = $(this).attr('src');
	var id = $(this).attr('href');
	var quantity = parseInt($(".shopping_cart .quantity" + "." + id.toString()).val());
	var price = parseInt($(".shopping_cart .lastprice" + "." + id.toString()).html());
	var currentNum = parseInt($(".ajaxCartQuantity").html());
	currentNum = currentNum - quantity;
	var currentPrice = parseInt($("span.preview-cart.total").html());
	currentPrice = currentPrice - price;
	var total = parseInt($(".shopping_cart .price").html());
	total = total - price;
	$.ajax({
        url: src +"cart/delete",
        type: "get",
        data: {id: id},
		dataType: 'json',	
        success: function(data){
			$(".ajaxCartQuantity").html(currentNum);
			$("span.preview-cart.total").html(currentPrice);
			$(".shopping_cart .price").html(total);
			$(".shopping_cart table tbody tr" + "#" + id.toString()).fadeOut(3600, "linear");
        },
        error: function(request, status, error) {
			alert(request.responseText);
		}
    });
});
$(".shopping_cart .edit-button").click(function(e){
	e.preventDefault();
	var src = $(this).attr('src');
	var id = $(this).attr('href');
	var oldquantity = parseInt($(".shopping_cart .oldQuantity" + "." + id.toString()).html());
	var quantity = parseInt($(".shopping_cart .quantity" + "." + id.toString()).val());
	var offset = quantity - oldquantity;		
	var price = parseInt($(".shopping_cart .lastprice" + "." + id.toString()).html());
	var newprice = (price/oldquantity)*quantity;
	var currentNum = parseInt($(".ajaxCartQuantity").html());
	currentNum = currentNum + offset;
	var currentPrice = parseInt($("span.preview-cart.total").html());
	currentPrice = currentPrice + (newprice-price);
	var total = parseInt($(".shopping_cart .price").html());
	total = total + (newprice-price);
	$.ajax({
        url: src +"cart/edit",
        type: "get",
        data: {id: id,quantity:offset,price:(newprice-price)},
		dataType: 'json',	
        success: function(data){
			$(".ajaxCartQuantity").html(currentNum);
			$("span.preview-cart.total").html(currentPrice);
			$(".shopping_cart .price").html(total);
			$(".shopping_cart .lastprice" + "." + id.toString()).html(newprice);
        },
        error: function(request, status, error) {
			alert(request.responseText);
		}
    });
});