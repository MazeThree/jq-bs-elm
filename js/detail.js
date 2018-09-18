$(document).ready(function(){
// 详情页活动切换按钮
    $(".show-btn").click(function(){
        $(".hide-box").fadeToggle(1000);
    });


    ajax_data();
});

function ajax_data(){
    var thisURL = document.URL;
    var getval =thisURL.split('?')[1];
    var showval= getval.split("=")[1];
    $.ajax({
        type:"POST",
        url:"../php/home/shop_data.php", //提交的地址
        data:{shop_id:showval},
        error: function(request) {  //失败的话
            alert("Connection error");
        },
        success: function(data) {  //成功
            //$("#im_table").text($("#form1").serialize());
            alert(data);  //就将返回的数据显示出来
            //$("#good1").html(data);
        }
    });
}