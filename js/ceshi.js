var id = document.URL.split("?")[1];
	$.ajax({
		type:'POST',
		url:'admin/getproId.php',
		data: id,
		dataType:"json",
		success:function(json) {
			analyJson(json);
		},
		error:function(err) {
			alert(err);
		}
	})

	function addDesign(pname,sta,char,pic) {
		var newpro = '<div class="h2 text-center">'+pname+'</div><div class="m_top"><div class="imgbox pull-left"><div class="imgborad"><img src="updateImages/'+pic+'" alt="暂无图片"></div></div><div class="detail pull-left m_left"><div class="h4"><b>产品说明：</b></div><p>'+mText(sta)+'</p><div class="h4 m_top"><b>产品特性：</b></div>'+mText(char)+'</div></div>';
		$(".prowrap").append(newpro);
		$('.curr').html(pname);
	}

	function analyJson(json) {
		for(var i = 0; i < json.length; i++){
			addDesign(json[i]['proname'],json[i]['state'],json[i]['charact'],json[i]['picture']);
		}
	}

	function mText(str) {
		var strs = str.split("\n");
		var rows = "";
		for(var i = 0; i < strs.length; i++){
			if(strs[i] != '\r'){
				rows += '<p>'+strs[i]+'</p>';
			}
		}
		return rows;
	}