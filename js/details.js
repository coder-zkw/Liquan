var id = document.URL.split("?")[1];
	$.ajax({
		type:'POST',
		url:'admin/designID.php',
		data: id,
		dataType:"json",
		success:function(json) {
			analyJson(json);
		},
		error:function(err) {
			alert(err);
		}
	})

	function addDesign(pname,dname,ptype,tra,adv,rem,pic1,pic2) {
		var str = pic2.split('.');
		var newdesign;
		if(str.length>1){
			newdesign = '<div class="h2 text-center">'+pname+'</div><div class="m_top"><div class="imgbox pull-left"><div class="imgborad"><img src="updateImages/'+pic1+'" alt="暂无图片"></div><div><img src="updateImages/'+pic1+'" alt="暂无图片" class="img-thumbnail"><img src="updateImages/'+pic2+'" alt="暂无图片" class="img-thumbnail"></div></div><div class="detail pull-left m_left"><div class="h4"><b>产品：'+dname+'</b></div><div class="h4 m_left">'+ptype+'</div><div class="h4 m_top"><b>特点：</b></div>'+mText(tra)+'<div class="h4 m_top"><b>优势：</b></div>'+mText(adv)+'<div class="h5 m_top text-danger"><b>'+rem+'</b></div></div></div>';
		}else{
			newdesign = '<div class="h2 text-center">'+pname+'</div><div class="m_top"><div class="imgbox pull-left"><div class="imgborad"><img src="updateImages/'+pic1+'" alt="暂无图片"></div><div><img src="updateImages/'+pic1+'" alt="暂无图片" class="img-thumbnail"></div></div><div class="detail pull-left m_left"><div class="h4"><b>产品：'+dname+'</b></div><div class="h4 m_left">'+ptype+'</div><div class="h4 m_top"><b>特点：</b></div>'+mText(tra)+'<div class="h4 m_top"><b>优势：</b></div>'+mText(adv)+'<div class="h5 m_top text-danger"><b>'+rem+'</b></div></div></div>';
		}
		$(".prowrap").append(newdesign);
		$('.curr').html(pname);
	}

	function analyJson(json) {
		for(var i = 0; i < json.length; i++){
			addDesign(json[i]['proname'],json[i]['designname'],json[i]['protype'],json[i]['trait'],json[i]['advantage'],json[i]['remark'],json[i]['picture1'],json[i]['picture2']);
		}
	}

	function mText(str) {
		var strs = str.split("\n");
		var rows = "";
		for(var i = 0; i < strs.length; i++){
			if(strs[i] != '\r'){
				rows += '<p><i class="glyphicon glyphicon-tags"></i><span>'+strs[i]+'</span></p>';
			}
		}
		return rows;
	}

	$(".prowrap").delegate('img','mouseover',function() {
		var newsrc = $(this)[0].src;
		$(".imgbox>.imgborad>img").attr("src",newsrc);
	})