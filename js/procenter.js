function ajax() { 
		var url = "admin/getdesign.php?no-cache="+ Math.random();
		$.ajax({
			type:'GET',
			url:url,
			dataType:"json",
			success:function(json) {
				analyJson(json);
			},
			error:function(err) {
				alert(err);
			}
		})
	}

	function analyJson(json) {
		for(var i = 0; i < json.length; i++){
			addDesign(json[i]['id'],json[i]['proname'],json[i]['picture1']);
		}
	}

	$(".designwrap").delegate("a",'click',function() {
		$(this).parent().parent().submit();
	})