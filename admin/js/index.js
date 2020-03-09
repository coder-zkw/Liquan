function pageClick(k) {
	$(k).parent().find("div").removeClass("active");
	$(k).addClass("active");
	$("#flTitle").text($(k).text());
	var n = $(".lines>div").index($(k));
	$(".content>iframe").attr("src","content"+n+".html");
	//$(".content>div").eq(n).show().siblings("div").hide();
}
//content js
function getCookie(name){ 
	var arr = document.cookie.split("; "); 
	for(var i=0; i<arr.length; i++){ 
		var arr2 = arr[i].split("="); 
		if(arr2[0] == name){ 
			return arr2[1]; 
		} 
	} 
	return ""; 
}
function back() {
	if(!getCookie('PHPSESSID')){
		window.location.href = "index.html";
	}
}

$(".news>div").eq(1).hide();
$(".nav>span").click(function() {
	$(this).addClass("active").siblings().removeClass("active");
	var n = $(".nav>span").index($(this));
	$(".news>div").eq(n).show().siblings("div").hide();
})

$(".btn>input").eq(0).click(function() {
	$(".title>input").val("");
	$("#newswords").val("");
	$(".pros>textarea").val("");
	$(".file>input").val("");
	$(".time>input").val("");
	$(".remark>input").val("");
})

$(".manage").delegate('input','click',function() {
	var data = $(this).parent().parent().children().eq(0).text();
	$('.manage input[type="hidden"]').val(data);
	if(confirm("确定删除？删除后不可返回！")){
		$(".manage form").submit();
	}else{
		return false;
	}
})
