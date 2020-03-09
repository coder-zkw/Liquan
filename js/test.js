function ajax() { 
    var url = "admin/gettest.php?no-cache="+ Math.random();
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

function addPro(id,pro,pic,typ) {
    pro = ceStr(pro);
    var newpro = '<div class="probox"><form action="ceshi1.html" method="get"><div class="h4 text-center"><a>'+pro+'</a></div><div class="box"><a><img src="updateImages/'+pic+'" alt="暂无图片"></a></div><div class="more"><a>了解更多</a></div><input type="hidden" name="index" value="'+id+'"></form></div>';
    var target = '';
    switch(typ){
        case '0' : target = 'itester';
        break;
        case '1' : target = 'shiboqi';
        break;
        case '2' : target = 'fashengqi';
        break;
        case '3' : target = 'wanyongbiao';
        break;
        case '4' : target = 'dianyuan';
        break;
        case '5' : target = 'fenxi';
        break;
        case '6' : target = 'sepu';
        break;
        case '7' : target = 'mokuai';
        break;
    }
    $("."+target).append(newpro);
}

function analyJson(json) {
    for(var i = 0; i < json.length; i++){
        addPro(json[i]['id'],json[i]['proname'],json[i]['picture'],json[i]['protype']);
    }
}

function ceStr(str){
    if(str.indexOf('【已停产】')>0){
        str = str.replace(/【已停产】/,'<e class="text-danger">【已停产】</e>');
        console.log(str)
    }else{
        return str;
    }
    return str;
}

$(".borders").delegate("a",'click',function() {
    $(this).parent().parent().submit();
})