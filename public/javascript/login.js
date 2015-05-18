/*
  Created 27/04/2015 by NTT	
*/

$("#form-returning").submit(function(e){
	
	e.preventDefault();
	$.ajax({
        url: "auth/user-login",
        type: "post",
        data: $(this).serialize(),
		dataType: 'json',	
        success: function(data){
			var arr = $.map(data, function(el) { return el; });
			
			if(arr[0] == 'ok'){
				window.location.href = 'home';
			}
			else 
				$("#result").html("Tài khoản không tồn tại");
			
        },
        error:function(){
            alert("failure");
        }
    });
});
$("#edit-form-returning").submit(function(e){
	
	e.preventDefault();
	if($(this).find("#re-password").val() != $(this).find("#password").val()){
		$("#result").html("Password nhập vào không khớp");
	}
	else {
		$.ajax({
			url: $(this).attr('action'),
			type: "post",
			data: $(this).serialize(),
			dataType: 'json',	
			success: function(data){
				var arr = $.map(data, function(el) { return el; });
				
				if(arr[0] == 'ok'){
					$("#result").html("ĐỔI MẬT KHẨU THÀNH CÔNg");
				}
				else 
					$("#result").html(arr[0]);
				
			},
			error: function(request, status, error) {
				$("#result").html(request.responseText);
			}
		});
	}
});
