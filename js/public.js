var windowWidth = $(window).width();
if(windowWidth < 768){
    $("#nav").removeClass('fixed');
}else{
    $(window).scroll(function() {
        if($(window).scrollTop()>33){
            $("#nav").addClass("fixed");
        }else{
            $("#nav").removeClass("fixed");
        }
        if($(window).scrollTop()>60){
            $(".box").addClass("active")
        }
        if($(window).scrollTop()>300){
            $(".xuanze").addClass("active")
        }
        if($(window).scrollTop()>50){
            $(".icobox>i").addClass("active");
        }
    })
}
$('.icon').click(function() {
    $("#nav .row").toggle();
})

$('#nav .close').click(function() {
    $("#nav .row").hide();
})
/*window.onclick = function(event) {
    var modal = document.getElementById('nav');
    console.log(event.target)
    if (event.target == modal) {
        $("#nav .col-md-1").hide();
    }
}*/

$('.eng').click(function() {
        window.location.href = "Eindex.html";
})
$('.zhong').click(function() {
    window.location.href = "index.html";
})

// 从后台获取备案号
$.ajax({
    url: 'admin/getRecord.php',
    method: 'get',
    dataType:"json",
    success: function(res) {
        // 全局改变备案号
        $('.ge a').eq(0).text('粤ICP备'+res.recordNum+'号');
    },
    error:function(err) {
        // console.log(err);
    }
})
// 给网站底部添加亮照标识
var Liang = '<div style="text-align:center; margin-top:10px;"><a href="https://cec.osichina.cn/bz868"&rs("liangzhaoid")&"5698.html"><img src="http://cec.osichina.cn/cec/gswj.png" alt="企业亮照验证电子标识" width="109" height="47" border="0" /></a></div>';
$('.ge').append(Liang);
