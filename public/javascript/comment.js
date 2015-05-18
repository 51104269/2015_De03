/*
  Created 11/05/2015 by NTT	
*/

$(".commentPanel form").submit(function(e){
	e.preventDefault();
	
	if($(this).find("textarea").val().length < 1) {
		$(".commentPanel .result").html("Bạn phải viết bình luận !!!");
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
					
					$(".commentPanel .commentList").append("<li><b>"+ $(".commentPanel form").find("#account_id").attr('src') +"</b><br>"+ $(".commentPanel form").find("textarea").val() + "</li>");
				}				
			},
			error: function(request, status, error) {
				$(".commentPanel .result").html(request.responseText);
			}
		});
	}
	
});

