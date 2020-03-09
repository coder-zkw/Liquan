var id = document.URL.split("?")[1];
	function dajax(id){
		$.ajax({
			type:'POST',
			url:'admin/getID.php',
			data: id,
			dataType:"json",
			success:function(json) {
				analyJson(json);
			},
			error:function(err) {
				alert(err);
			}
		})
	}
	dajax(id);

	function analyJson(json) {
		for(var i = 0; i < json.length; i++){
			addNews(json[i]['title'],json[i]['newsword'],json[i]['picture'],transTime(json[i]['dates']));
		}
	}

	function ajax(id){
		$.ajax({
			type:'GET',
			url:'admin/getnews.php',
			dataType:"json",
			success:function(json) {
				newJson(json,id);
			},
			error:function(err) {
				alert(err);
			}
		})
	}
	ajax(id);

	function newJson(json,id) {
		var n = 0;
		n = json.length > 5 ? 5 : json.length;
		var Nnews = '';
		for(var i = 0; i < n; i++){
			Nnews += newNews(json[i]['Id'],json[i]['title'],json[i]['picture'],transTime(json[i]['dates']));
			$(".Nnews").html(Nnews);
		}
		var changeId = [];
		var titles = [];
		var num = id.split('=')[1];
		for(var i = 0; i < json.length; i++){
			if(json[i]['Id'] == num){
				if(i == 0){
					titles[0] = 'No news';
					titles[1] = json[i+1]['title'];
					changeId[0] = 'index=' + num;
					changeId[1] = 'index=' + json[i+1]['Id'];
				}else if(i == json.length-1){
					titles[0] = json[i-1]['title'];
					titles[1] = 'No news';
					changeId[0] = 'index=' + json[i-1]['Id'];
					changeId[1] = 'index=' + num;
				}else{
					titles[0] = json[i-1]['title'];
					titles[1] = json[i+1]['title'];
					changeId[0] = 'index=' + json[i-1]['Id'];
					changeId[1] = 'index=' + json[i+1]['Id'];
				}
			}
		}
		var newsEnd = '<div class="jump"><form action="morenews.html" method="get"><a class="pre" href="javascript:void(0)">上一条: '+titles[0]+'</a><input type="hidden" name="index" value="'+changeId[0]+'"></form><form action="morenews.html" method="get"><a class="nex" href="javascript:void(0)">下一条: '+titles[1]+'</a><input type="hidden" name="index" value="'+changeId[1]+'"></form></div>';
		$('.left').append(newsEnd);

		var timer = null;
		$('.left .pre').click(function(){
			timer = setTimeout(function(){
				dajax(changeId[0]);
				ajax(changeId[0]);
			},100)
		})
		$('.left .nex').click(function(){
			timer = setTimeout(function(){
				dajax(changeId[1]);
				ajax(changeId[1]);
			},100)
		})
	}

	function transTime(date) {
		var str = date.split("-");
		str[1] = str[1].length == 1 ? "0"+ str[1] : str[1];
		var m = '';
		switch(str[1]){
			case '01' : m = 'January';
			break;
			case '02' : m = 'February';
			break;
			case '03' : m = 'March';
			break;
			case '04' : m = 'April';
			break;
			case '05' : m = 'May';
			break;
			case '06' : m = 'June';
			break;
			case '07' : m = 'July';
			break;
			case '08' : m = 'August';
			break;
			case '09' : m = 'September';
			break;
			case '10' : m = 'October';
			break;
			case '11' : m = 'November';
			break;
			case '12' : m = 'December';
			break;
		}
		return m+" "+str[2]+","+str[0];
	}

	function addNews(tit,words,pic,tim) {
		var news = "<div class='h3'>"+tit+"</div><div class='saytime'><span>"+tim+"</span> / by admin </div><img src='updateImages/"+pic+"'><p>"+words+"</p>";
		$(".left").html(news);
	}

	function newNews(id,tit,pic,tim) {
		var news = '<div class="newsbox m_top"><form action="morenews.html" method="get"><div><a><img src="updateImages/'+pic+'" class="img-thumbnail" alt="暂无图片"></a><span class="time">'+tim+'</span></div><div class="title"><a>'+tit+'</a></div><input type="hidden" name="index" value="'+id+'"></form></div>';
		return news;
	}

	$(".right").delegate("a",'click',function() {
		$(this).parent().parent().submit();
	})