<?php require_once('../php/home/detail.php'); ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge，chrome=1"/>
    <!-- meta使用viewport以确保页面可自由缩放 -->
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
    <meta name="format-detection" content="telephone=no,email=no,address=no"/>
    <!--适配safari私有meta标签，允许全屏模式浏览，隐藏浏览器导航栏-->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="keywords" content="前端工程师，湖南理工学院，计算机科学,jquery+bootstrap仿制"/>
    <meta name="description"  content="jq+bs仿制移动端elm"/>
    <meta name="author" content="吴鹏,1849630277@qqmail.com"/>
    <title>商家详情</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/css/swiper.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!--<link rel="stylesheet"  href="css/reset.css" />-->
    <link rel="stylesheet" href="../css/index.css">

    <!--公共样式-->
    <link rel="stylesheet" href="../css/global.css">

</head>
<body>
<!--头部-->
<div class="header">
    <input type="text" class="form-control search" placeholder="搜索商家、商品名称">
</div>
<!--主体内容-->
<div class="content">
    <!--商家信息-->
    <div class="shop-message">
        <div class="img-box">
            <img src="../pictures/可乐.png" alt="">
        </div>
        <b><?php echo $row['shop_name']; ?></b>
        <p><span>评价4.5</span> | <span>月售<?php echo $row['salenum']; ?></span> | <span>配送时间</span></p>
    </div>
    <!--优惠活动-->
    <div class="activity">
        <div class="show-btn">
            <p>xxxxxxxxxxxx</p>
            <p>xxxxxxxxxx</p>
        </div>
        <div class="hide-box" style="display: none">
            <p>xxxx</p>
            <p>xxxx</p>
            <p>xxxx</p>
        </div>
    </div>
    <!--选项卡-->
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">点餐</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">评价</a></li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">商家</a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active" id="home">
            <nav id="navbar-example" class="navbar navbar-default col-xs-3 col-md-3" role="navigation" >
    			<ul class="nav navbar-nav cate_list">
    			<!--js处理后台数据动态生成分类表-->
    			</ul>
            </nav>
            <div class="col-xs-9 col-md-9 goods_list" data-spy="scroll" data-target="#navbar-example" data-offset="0"
            	 style="height:28rem;overflow:auto; position: relative;">
            	 <!--js处理后台数据动态生成商品表-->
            </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="profile">评价页面</div>
            <div role="tabpanel" class="tab-pane fade" id="messages">商家信息</div>

        </div>
    </div>
</div>
<!--底部购物车-->
<!--购买商品-->
<div class="b_panel">
      <form action="" method="post" name="shop_car">
          <p class="clear">已购商品 <span class="glyphicon glyphicon-trash" onclick="clear()">清空</span></p>
          <div class="goods_car"></div>
      </form>
</div>
<footer class="det-foot-box">
    <div class="left">
        <img src="../pictures/可乐.png" alt="">
        <b>￥<span id="allprice">0</span></b>
    </div>
    <button type="button" class="btn right disabled">￥5起送</button>
</footer>
<!--先引入jq其他才会生效-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/detail.js"></script>

</body>
</html>