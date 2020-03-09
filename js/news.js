var pageNum_items = $('.pagination .item');
var psize = 10;
function ajax() { 
	$.ajax({
		type:'GET',
		url:'admin/getnews.php',
		dataType:"json",
		success:function(json) {
			analyJson(json);
			goPage(1,psize);
		},
		error:function(err) {
			alert(err);
		}
	})
}

function analyJson(json) {
	for(var i = 0; i < json.length; i++){
		addNews(json[i]['Id'],json[i]['title'],json[i]['newsword'],json[i]['picture'],transTime(json[i]['dates']));
	}
}

function transTime(date) {
	var str = date.split("-");
	if(str[1]){
		str[1] = str[1].length == 1 ? "0"+ str[1] : str[1];
	}
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

function goPage(pnum,psize) {//当前页数，每页条数
	var news = $(".newsbox");
	var num = news.length;
	var pages = 0;
	if(num%psize == 0){
		pages = parseInt(num/psize);
	}else{
		pages = parseInt(num/psize) + 1;
	}
	var startnews = (pnum-1)*psize;
	var endnews = pnum*psize;
	for(var i = 0; i < num; i++){
		if(i >= startnews && i < endnews){
			$(news[i]).show();
		}else{
			$(news[i]).hide();
		}
	}
	// 判断页数，对应按钮数改变
	pageChange(pnum, pages);
	//总页数的第几页
	$(".pnum").text(pnum);
	$(".pages").text(pages);
}
//跳到固定页数
$(".pagination").delegate("li",'click',function() {
	var n = parseInt($(this).text());
	if(isNaN(n)){
		return false;
	}else{
		goPage(n,psize);
	}
})
//Previous
$(".pagination").delegate(".Previous",'click',function() {
	var pnum = $(".pnum").text();
	if(pnum == 1){
		return false;
	}else{
		goPage(pnum-1,psize);
	}
})
//Next
$(".pagination").delegate(".Next",'click',function() {
	var pnum = parseInt($(".pnum").text());
	var pages = parseInt($(".pages").text());
	if(pnum == pages){
		return false;
	}else{
		goPage(pnum+1,psize);
	}
})
//跳转到指定页面
$('.goto').click(function() {
	var goNum = parseInt($('.pagination input').val());
	var pages = parseInt($(".pages").text());
	goNum = goNum > pages ? pages : goNum;
	goNum = goNum <= 0 ? 1 : goNum;
	if(goNum){
		goPage(goNum,psize);
		$('.pagination input').val(goNum);
	}
})

function pageChange(pnum, pages) {
	// 清空五个按钮手动添加的类，去高亮
	for(var i = 0; i < 5; i++){
		pageNum_items.eq(i).css('backgroundColor','#fff').css('color','#0c69ac');
	}
	// 总页面少于6，多余按钮隐藏
	if(pages < 6) {
		for(var i = 5; i > pages; i--){
			pageNum_items.eq(i-1).hide();
		}
		// 加高亮
		pageNum_items.eq(pnum-1).css('backgroundColor','#0c69ac').css('color','#fff');
	}
	else{
		if(pnum < 4) {
			// 按钮值对应变化
			pageNum_items.eq(0).html(1);
			pageNum_items.eq(1).html(2);
			pageNum_items.eq(2).html(3);
			pageNum_items.eq(3).html(4);
			pageNum_items.eq(4).html(5);
			// 加对应的高亮
			pageNum_items.eq(pnum-1).css('backgroundColor','#0c69ac').css('color','#fff');
		}else if(pnum > pages-3){
			// 按钮值对应变化
			pageNum_items.eq(0).html(pages-4);
			pageNum_items.eq(1).html(pages-3);
			pageNum_items.eq(2).html(pages-2);
			pageNum_items.eq(3).html(pages-1);
			pageNum_items.eq(4).html(pages);
			// 加对应的高亮
			pageNum_items.eq(pnum-(pages-4)).css('backgroundColor','#0c69ac').css('color','#fff');
		}else{
			// 按钮值对应变化
			pageNum_items.eq(0).html(pnum-2);
			pageNum_items.eq(1).html(pnum-1);
			pageNum_items.eq(2).html(pnum);
			pageNum_items.eq(3).html(pnum+1);
			pageNum_items.eq(4).html(pnum+2);
			// 加对应的高亮
			pageNum_items.eq(2).css('backgroundColor','#0c69ac').css('color','#fff');
		}
	}
}

$(".newswrap").delegate("a",'click',function() {
	$(this).parent().parent().submit();
})