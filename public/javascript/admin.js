/*
  Created 25/03/2015 by NTT	
*/
$(".accFunc").click(function(e){
	e.preventDefault();
	$("#pro-content").hide();
	$("#acc-content").show();
	$("#cat-content").hide();
});
$(".proFunc").click(function(e){
	e.preventDefault();
	$("#pro-content").show();
	$("#acc-content").hide();
	$("#cat-content").hide();
});
$(".catFunc").click(function(e){
	e.preventDefault();
	$("#pro-content").hide();
	$("#acc-content").hide();
	$("#cat-content").show();
});
$("#pro-content #gallery-btn").click(function(e){
	e.preventDefault();
	$("#addProduct .gallery").show();
});
$(".gallery #close-btn").click(function(e){
	e.preventDefault();
	$(".gallery").hide();
});
$("#addProduct .gallery ul li a").click(function(e){
	e.preventDefault();
	var src = $(this).attr('href');
	$("#product-new-form #url").val(src);
	$("#addProduct .gallery").hide();
});
/* 
  Functions and variables for editing Product 	
*/
var img_id;
$(".pro-url").click(function(){
	img_id = $(this).attr("id");
	$("#editProduct .gallery").show();
});
$("#editProduct .gallery ul li a").click(function(e){
	e.preventDefault();
	var src = $(this).attr('href');
	$("." + img_id + ".pro-url").attr("src",src);
	$("#editProduct .gallery").hide();
});

$("#admin-login-form").submit(function(e){
	e.preventDefault();
	$.ajax({
        url: "auth/admin-login",
        type: "post",
        data: $(this).serialize(),
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			
			if(arr[0] == 'ok'){
				window.location.href = 'admin';
			}
			else 
				$(".notification").html("Tài khoản không tồn tại");
			
        },
        error:function(){
            alert("failure");
        }
    });
});

$("#account-new-form").submit(function(e){
	e.preventDefault();
	if($(this).find("#password").val().length < 6) {
		$("#acc-content .new-result").html("Password phải có độ dài >=6 ");
	}
	else if($(this).find("#re-password").val() != $(this).find("#password").val()){
		$("#acc-content .new-result").html("Password nhập vào không khớp");
	}
	else {
		$.ajax({
			url: "account/new",
			type: "post",
			data: $(this).serialize(),
			dataType: 'json',	
			success: function(data){
				var arr = $.map(data, function(el) { return el; });
				if(arr[0] == 'ok')
					$("#acc-content .new-result").html("Tài Khoản đã được tạo !");	
				else 
					$("#acc-content .new-result").html("Email này đã có người sử dụng !");
			},
			error:function(){
				alert("failure");
			}
		});
	}
});

$("#acc-content .edit-link").click(function(e){
	e.preventDefault();
	var id = $(this).attr('id');
	var num = $(this).attr('num').toString();
	var group = $("#acc-content " + "." + num + ".group").val();
	$.ajax({
        url: "account/update/" + id,
        type: "get",
        data: {group: group},
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			$("#acc-content " + "." + num + ".edit-result").show();
			$("#acc-content " + "." + num + ".edit-result").html("Xong");
			$("#acc-content " + "." + num + ".edit-result").fadeOut(3600, "linear");
        },
        error:function(){
            alert("failure");
        }
    });
});

$("#acc-content .delete-link").click(function(e){
	e.preventDefault();
	var id = $(this).attr('id');
	var num = $(this).attr('num').toString();
	$.ajax({
        url: "account/destroy/" + id,
        type: "get",
        data: {data: "nothing"},
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			$("#acc-content " + "." + num + ".onerow").fadeOut(3600, "linear");
        },
        error:function(){
            alert("failure");
        }
    });
});

$("#cat-new-form").submit(function(e){
	e.preventDefault();
	if($(this).find("#name").val().length < 6) {
		$("#cat-content .new-result").html("Tên thư mục nên có độ dài >=3 ");
	}
	else {
		$.ajax({
			url: "category/new",
			type: "post",
			data: $(this).serialize(),
			dataType: 'json',	
			success: function(data){
				var arr = $.map(data, function(el) { return el; });				
				$("#cat-content .new-result").html("Thư mục đã được tạo !");	
			},
			error:function(){
				alert("failure");
			}
		});
	}
});

$("#cat-content .edit-link").click(function(e){
	e.preventDefault();
	var id = $(this).attr('id').toString();
	var name = $("#cat-content " + "." + id + ".cat-name").html();
	$.ajax({
        url: "category/update/" + id,
        type: "get",
        data: {name: name},
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			$("#cat-content " + "." + id + ".edit-result").show();
			$("#cat-content " + "." + id + ".edit-result").html("Xong");
			$("#cat-content " + "." + id + ".edit-result").fadeOut(3600, "linear");
        },
        error:function(){
            alert("failure");
        }
    });
});

$("#cat-content .delete-link").click(function(e){
	e.preventDefault();
	var id = $(this).attr('id').toString();
	$.ajax({
        url: "category/destroy/" + id,
        type: "get",
        data: {data: "nothing"},
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			$("#cat-content " + "." + id + ".onerow").fadeOut(3600, "linear");
        },
        error:function(){
            alert("failure");
        }
    });
});

$("#product-new-form").submit(function(e){
	e.preventDefault();
	$.ajax({
		url: "product/new",
		type: "post",
		data: $(this).serialize(),
		dataType: 'json',	
		success: function(data){
			var arr = $.map(data, function(el) { return el; });
			$("#pro-content .new-result").html("Sản Phẩm đã được tạo !");	
		},
		error:function(){
			alert("failure");
		}
	});
});

$("#pro-content .edit-link").click(function(e){
	e.preventDefault();
	var id = $(this).attr('id').toString();
	var name = $("#pro-content " + "." + id + ".pro-name").html();
	var url = $("#pro-content " + "." + id + ".pro-url").attr("src");
	var desc = $("#pro-content " + "." + id + ".pro-desc").html();
	var price = $("#pro-content " + "." + id + ".pro-price").val();
	var cat_id = $("#pro-content " + "." + id + ".pro-cat").html();
	$.ajax({
        url: "product/update/" + id,
        type: "get",
        data: {name: name, url: url, desc: desc, price: price, cat_id: cat_id },
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			$("#pro-content " + "." + id + ".edit-result").show();
			$("#pro-content " + "." + id + ".edit-result").html("Xong");
			$("#pro-content " + "." + id + ".edit-result").fadeOut(3600, "linear");
        },
        error:function(){
            alert("failure");
        }
    });
});

$("#pro-content .delete-link").click(function(e){
	e.preventDefault();
	var id = $(this).attr('id').toString();
	$.ajax({
        url: "product/destroy/" + id,
        type: "get",
        data: {data: "nothing"},
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			$("#pro-content " + "." + id + ".onerow").fadeOut(3600, "linear");
        },
        error:function(){
            alert("failure");
        }
    });
});