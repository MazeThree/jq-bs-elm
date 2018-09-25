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
    <title>首页</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!--<link rel="stylesheet"  href="../css/reset.css" />-->
    <link rel="stylesheet" href="../css/index.css">

    <!--公共样式-->
    <link rel="stylesheet" href="../css/global.css">
</head>
<body>

<div class="container">
    <h4>我的订单</h4>
    <div id="content" class="box-content content">
        <?php
             session_start();
             require_once('../php/link.php');
             $user=$_SESSION['user_id'];
             $sql= "SELECT a.o_id,a.o_price,a.o_status,a.g_name,b.shop_name,b.shop_id FROM orderform a,shop b where a.shop_id = b.shop_id and a.user_id='{$user}'";
             $res=mysqli_query($conn,$sql);
             while($row = mysqli_fetch_assoc($res)){
                echo "<div class='order-message'>";
                echo "<div><a href='../home/detail.php?shop_id=".$row['shop_id']."'>";
                echo "<span>".$row['shop_name']."</span>";
                echo "<span style='float:right'>订单已处理</span></a></div>";
                echo "<div><a href='../order/message.php?o_id=".$row['o_id']."'>";
                echo "<span style='float:right'>".$row['g_name']."</span>";
                echo "<span>￥".$row['o_price']."</span></a></div>";
            }
            mysqli_close($conn);
           ?>
    </div>
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
    <div class="flex-items">
        <a href="../find/index.html" >
            <span class="glyphicon glyphicon-search"></span>
            <br>
            <span>发现</span>
        </a>
    </div>
    <div class="flex-items">
        <a href="../order/index.php" class="active">
            <span class="glyphicon glyphicon-list-alt"></span>
            <br>
            <span>订单</span>
        </a>
    </div>
    <div class="flex-items">
        <a href="../mine/index.php">
            <span class="glyphicon glyphicon-user"></span>
            <br>
            <span>我的</span>
        </a>
    </div>
</footer>

<!--先引入jq其他才会生效-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/index.js"></script>

</body>
</html>