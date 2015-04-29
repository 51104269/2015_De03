/*
  Created 27/04/2015 by NTT	
*/

$("#form-returning").submit(function(e){
	e.preventDefault();
	if($(this).find("#password").val().length < 6) {
		$("#result").html("Password phải có độ dài >=6 ");
	}
	else if($(this).find("#re-password").val() != $(this).find("#password").val()){
		$("#result").html("Password nhập vào không khớp");
	}
	else {
		$.ajax({
			url: "auth/user-signup",
			type: "post",
			data: $(this).serialize(),
			dataType: 'json',	
			success: function(data){
				var arr = $.map(data, function(el) { return el; });
				if(arr[0] == 'ok') {
					$("#result").html("Tài Khoản đã được tạo -- Trình duyệt sẽ tự chuyển đến nơi mua sắm!");
					setTimeout(function(){ window.location.href = 'home'; }, 2000);
				}
				else 
					$("#result").html("Email này đã có người sử dụng !");
			},
			error:function(){
				alert("failure");
			}
		});
	}
});

