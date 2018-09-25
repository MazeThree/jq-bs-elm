<?php
session_start();
require_once('../link.php');

    //获取商品信息
    $name=$_POST["name"];
    $price=$_POST["price"];
    $num=$_POST["num"];
    //获取订单信息
    $shop_id=$_POST["shop_id"];
    $user_id=$_POST["user_id"];
    $total=$_POST["total"];
    $o_status=$_POST["o_status"];
    $pay_way=$_POST["pay_way"];


    $sql="insert into orderform (shop_id, o_price, user_id, o_status,pay_way,g_name,g_price,g_num) VALUES ('{$shop_id}','{$total}','{$user_id}','{$o_status}','{$pay_way}','{$name}','{$price}','{$num}');";
    $sql.= "UPDATE user SET `money`=`money`-'{$total}' WHERE user_id='{$user_id}'";
    $_SESSION['money']=$_SESSION['money']-$total;
    $res=mysqli_query($conn,$sql);

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
    <title>订单支付</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
        <!--<link rel="stylesheet"  href="css/reset.css" />-->
        <link rel="stylesheet" href="../../css/index.css">

        <!--公共样式-->
        <link rel="stylesheet" href="../../css/global.css">
</head>
<body>
<!--最上层公共头-->
<div class="top"  onclick="javascript:history.back(-1);">
    <span class="glyphicon glyphicon-arrow-left"></span>
    <span id="title"></span>
</div>
<div id="blue" class="container">
    <div class="order-head">
        <b>
        <?php
        if($o_status==1){
            echo "订单处理中";
        } else {
            echo "订单已送达";
        }
        ?>
        >
        </b>

    </div>
    <div class="order-message">
        <div><span>下单成功！感谢您的支持，你可以</span><span></span></div>
        <div>
            <button type="button" class="btn btn-success" onclick ="location.href='../../index.php'">返回首页</button>
            <button type="button" class="btn btn-info" onclick ="location.href='../../order/index.php'">查看订单</button>
        </div>
    </div>

<!--先引入jq其他才会生效-->
<script src="../../js/jquery-3.3.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/global.js"></script>
</body>
</html>