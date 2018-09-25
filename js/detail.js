$(document).ready(function(){
    //加载商品数据
    ajax_data();
// 详情页活动切换按钮
    $(".show-btn").click(function(){
        $(".hide-box").fadeToggle(1000);
    });

    $(".left").click(function(){
        $(".b_panel").slideToggle("slow");
        goods_car();
    });


    //购物车清空按钮
    $(".clear").click(function (){
        let t = $(".goods_list").children(".goods_content");
        let j=t.find(".num");
        j.text(0);
        $("#allprice").text(0);
        $(".goods_car").html("");
        $(".right").text("￥5起送").addClass('disabled');
        $.ajax({
            type:"POST",
            url:"../php/home/del_cookie.php", //提交的地址
            error: function(request) {  //失败的话
                alert("链接失败");
            },
            success: function(data) {

            }
        });
    });

    $(".right").click(function(){
        goods_car();
        var thisURL = document.URL;
        var getval =thisURL.split('?')[1];
        var showval= getval.split("=")[1];
        var newurl="order_pay.php?shop_id="+showval;
        $("form[name='shop_car']").attr('action',newurl);
        $("form[name='shop_car']").submit();
    });


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
            //alert(data);
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
                $(".goods_list").append("<div class='goods_content'><div class='goods_pic'><img src='../pictures/可乐.png'></div><div class=\"goods_info\"><b class='goods_name'>"+json_data[i].g_name+"</b><p>月售"+json_data[i].sale+"</p><div style='color: red'>￥<span class='price'>"+json_data[i].price+"</span><div class='add'><span class='minus glyphicon glyphicon-minus' onclick='minus("+i+")'></span>&nbsp<span class='num'>0</span>&nbsp<span class='plus glyphicon glyphicon-plus' onclick='plus("+i+")'></span></div></div></div>");

            }
        }
    }
}


//商品加减按钮
function minus(i){
    let t = $(".goods_list").children(".goods_content").eq(i);
    let j=t.find(".num");
    j.text(parseInt(j.text()) - 1);
    if (j.text() <= 0) {
        j.text(0);
    }
    TotalPrice();
}
function plus(i){
    let t = $(".goods_list").children(".goods_content").eq(i);
    let j=t.find(".num");
    //alert(j.text());
    j.text(parseInt(j.text()) + 1);
    if (j.text() <= 0) {
        j.text(0);
    }
    TotalPrice();


}
// 计算价格
function TotalPrice() {
    let allprice = 0; //总价
        $(".goods_content").each(function() { //循环店铺里面的商品
            if ($(this).find(".num").text()>0) { //如果该商品被选中
                let name = $(this).find(".goods_name").text(); //得到商品的数量
                let num = $(this).find(".num").text(); //得到商品的数量
                let price = parseFloat($(this).find(".price").text()); //得到商品的单价
                let total = price * num; //计算单个商品的总价
                allprice += total; //计算该店铺的总价

                $.ajax({
                    type:"POST",
                    url:"../php/home/shop_car.php", //提交的地址
                    dataType:"json",
                    data:{name:name,num:num,price:price},
                    error: function(request) {  //失败的话
                        //alert("链接失败");
                    },
                    success: function(data) {
                    }
                });
            }

        });
    $("#allprice").text(allprice.toFixed(2)); //输出全部总价
    if(allprice>=5){
        $(".right").text("去支付").removeClass('disabled');
    }else{
        $(".right").text("￥5起送").addClass('disabled');
    }
}

function goods_car(){
    $.ajax({
        type:"GET",
        url:"../php/home/getcookie.php", //提交的地址
        error: function(request) {  //失败的话
            alert("链接失败");
        },
        success: function(data) {
            $(".goods_car").html(data);
        }
    });

}




