<?php
session_start();
require_once('../php/link.php');
if($_SESSION['usename']==""){
    echo "<script>window.location.href='../mine/login.html'</script>";
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
    <title>订单支付</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!--<link rel="stylesheet"  href="css/reset.css" />-->
        <link rel="stylesheet" href="../css/index.css">

        <!--公共样式-->
        <link rel="stylesheet" href="../css/global.css">
</head>
<body>
<!--最上层公共头-->
<div class="top"  onclick="javascript:history.back(-1);">
    <span class="glyphicon glyphicon-arrow-left"></span>
    <span id="title"></span>
</div>
<div id="blue" class="container">
    <div class="order-head">
        <p>订单配送至</p>
        <b>
        <?php
        if($_SESSION['address']!=""){
            echo $_SESSION['address'];
        } else {
            echo "<b>请填写地址</b>";
        }
        ?>
        </b>
        <p>
            <span><?php echo $_SESSION['usename']?></span>&nbsp
            <span><?php echo $_SESSION['tel'] ?></span>
        </p>
    </div>
    <div class="order-message">
        <div><span>配送时间</span><span>尽快送达</span></div>
        <div><span>支付方式</span><span>在线支付</span></div>
    </div>
    <div class="order-message">
        <div><span><?php echo $_SESSION['shop_name'] ?></span><span></span></div>
        <?php
          $name=$_POST["name"];
          $price=$_POST["price"];
          $num=$_POST["num"];
        //获取购物车数据
                      $t_name_array=explode(",",$name);
                      $price_array=explode(",",$price);
                      $quantity_array=explode(",",$num);
                      $total=0;

                      //显示购物车产品内容
                      //减一是因为数组下标溢出了
                      for($i=0;$i<count($t_name_array);$i++)
                      {
                          //计算小计金额
                          $sub_total=$price_array[$i]*$quantity_array[$i];
                            $total+=$sub_total;
                          //显示各字段数据
                          echo "<div>";
                          echo "<span class='name'>".$t_name_array[$i]."</span>";
                          echo "<span>数量".$quantity_array[$i]."</span>";
                          echo "<span>￥".$sub_total."</span>";
                          echo "</div>";
                          }

         ?>
        <div><span>优惠说明</span><span>小计￥<?php echo $total; ?></span></div>
    </div>
    <div class="order-message">
        <div><span>餐具份数</span><span>未选择</span></div>
        <div><span>订单备注</span><span>口味、偏好</span></div>
    </div>
</div>

<form action="../php/order/new.php" method="post" name="order">
    <?php
    //商品信息
        echo "<input name='price' type='hidden' value='".$price."' />";
        echo "<input name='name' type='hidden' value='".$name."' />";
        echo "<input name='num' type='hidden' value='".$num."' />";

    //订单信息
        echo "<input name='shop_id' type='hidden' value='".$_SESSION['shop_id']."' />";
        echo "<input name='user_id' type='hidden' value='".$_SESSION['user_id']."' />";
        echo "<input name='total' type='hidden' value='".$total."' />";
        echo "<input name='o_status' type='hidden' value='1' />";
        echo "<input name='pay_way' type='hidden' value='1' />";

    ?>
</form>

<footer class="det-foot-box">
    <div class="left">
        <b>￥<?php echo $total; ?></b>
    </div>
    <button type="button" class="btn right" onclick="">去支付</button>
</footer>

<!--先引入jq其他才会生效-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/global.js"></script>
<script>
$(document).ready(function(){
    $(".right").click(function(){
        $("form[name='order']").submit();
    });
});
</script>
</body>
</html>