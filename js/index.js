$(document).ready(function(){
    // 头部搜索栏自适应
    // offset是对象的偏移量
    let top=$(".search").offset().top;
    $(window).scroll(function () {
        if ($(window).scrollTop() >= top) {
            $(".search").attr("style", "position:fixed;top:0;left:0;z-index:100;");
        } else {
            $(".search").attr("style", "");
        }
    }).trigger("scroll");

    // 商家推荐导航条自适应
    let top1=$(".box-nav").offset().top;
    var topwidth=$(".search").height();
    $(window).scroll(function () {
        if ($(window).scrollTop() >= top1-topwidth) {
            $(".box-nav").addClass("box-nav-fix");
        }else{
            $(".box-nav").removeClass("box-nav-fix");
        }
    }).trigger("scroll");
    // 活动页轮播图
    let mySwiper = new Swiper('.link-pic', {
        autoplay: true,//可选选项，自动滑动
    });


    // 推荐商家下拉加载
    let range = 50; //距下边界长度/单位px
    //let elemt = 500; //插入元素高度/单位px
    let maxnum = 20; //设置加载最多次数
    let num = 1;
    let totalheight = 0;
    let main = $("#content"); //主体元素
    $(window).scroll(function() {
        let srollPos = $(window).scrollTop(); //滚动条距顶部距离(页面超出窗口的高度)
//console.log("滚动条到顶部的垂直高度: "+$(document).scrollTop());
//console.log("页面的文档高度 ："+$(document).height());
//console.log('浏览器的高度：'+$(window).height());
        totalheight = parseFloat($(window).height()) + parseFloat(srollPos);
        if (($(document).height() - range) <= totalheight && num != maxnum) {
            main.append("<div class='content-items'>hello world" + srollPos + "---" + num + "</div>");
            num++;
        }
        // else{
        //     main.append("<div class='content-items'>已无更多数据</div>");
        // }
    })
});