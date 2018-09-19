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
        dataType:"json",
        data:{shop_id:showval},
        error: function(request) {  //失败的话
            alert("链接失败");
        },
        success: function(data) {
            alert(data);
            //data为查询到的商品json对象
            get_list(data);
            //alert(cate);

            //$("#good1").html(data);
        }
    });
}

//商品分类数据去重，获取商品分类表list
function get_list(json_data){

    let arr=[json_data[0].cate_id],list=[json_data[0].cate_name];
    for(let i=1;i<json_data.length;i++){
        if(json_data[i].cate_id!==arr[arr.length-1]){
            arr.push(json_data[i].cate_id);
            list.push(json_data[i].cate_name);
        }
    }
    for(let j=0;j<arr.length;j++){
        $(".cate_list").append("<li><a href='#good"+arr[j]+"'>"+list[j]+"</a></li>");

        $(".goods_list").append("<h4 id='good"+arr[j]+"'>"+list[j]+"</h4>");
        //alert(arr[j]);
        for(let i=0;i<json_data.length;i++){
            if(arr[j]==json_data[i].cate_id){
                $(".goods_list").append("<p>"+json_data[i].g_name+"&&销量"+json_data[i].sale+"&&价格"+json_data[i].price+"</p>");
            }
        }
    }
}