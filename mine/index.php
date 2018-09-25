<?php
session_start();
require_once('../php/link.php');
if($_SESSION['usename']==""){
    echo "<script>alert('未登录，请先登录');window.location.href='login.html'</script>";
}
?>
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
    <title>我的</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!--<link rel="stylesheet"  href="../css/reset.css" />-->
    <link rel="stylesheet" href="../css/mine.css">

    <!--公共样式-->
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>
<header>
<!--最上层公共头-->
<div class="top"  onclick="javascript:history.back(-1);">
    <span id="title"></span>
</div>

    <!--头部信息-->
    <div class="head">
        <a href="../mine/user-info.html">
            <div class="head-flex">
                <div class="head-pic">
                    <img src="../pictures/可乐.png" alt="">
                </div>
                <div class="head-info">
                    <?php echo $_SESSION['usename'] ?>
                    <span>，超级会员</span>
                </div>
                <div class="head-right">></div>
            </div>
        </a>
    </div>
    <!--相关选项-->
    <div class="head-flex head-nav">
        <div class="flex-items">
            <p><span style="color:blue">
            <?php
            if($_SESSION['money']!='')
            echo $_SESSION['money'];
            else{
            echo 0.00;
            }
            ?></span>元</p>
            <p>钱包</p>
        </div>
        <div class="flex-items">
            <p style="color: red"><span>2</span>个</p>
            <p>红包</p>
        </div>
        <div class="flex-items">
            <p style="color: red"><span>15</span>个</p>
            <p>金币</p>
        </div>
    </div>
</header>
<div>
    <div>超级会员特权</div>
    <div>88vip</div>
</div>
<div>
    <div class="select-items"><span></span>我的地址</div>
    <div class="select-items"><span></span>金币商城</div>
    <div class="select-items"><span></span>我的客服</div>
    <div class="select-items"><span></span>蚂蚁钻石会员特权</div>
</div>

<!--底部选项卡-->
<footer class="foot-box">
    <div class="flex-items">
        <a href="../index.php">
            <span class="glyphicon glyphicon-home"></span>
            <br>
            <span>首页</span>
        </a>
    </div>
    <div class="flex-items" class="active">
        <a href="../find/index.html" >
            <span class="glyphicon glyphicon-search"></span>
            <br>
            <span>发现</span>
        </a>
    </div>
    <div class="flex-items">
        <a href="../order/index.php">
            <span class="glyphicon glyphicon-list-alt"></span>
            <br>
            <span>订单</span>
        </a>
    </div>
    <div class="flex-items">
        <a href="../mine/index.php" class="active">
            <span class="glyphicon glyphicon-user"></span>
            <br>
            <span>我的</span>
        </a>
    </div>
</footer>

<!--先引入jq其他才会生效-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/global.js"></script>

</body>
</html>