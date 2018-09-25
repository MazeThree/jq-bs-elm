<?php
session_start();
require_once('../php/link.php');
    $o_id=$_GET['o_id'];
    $sql = "select * from `orderform` where o_id='{$o_id}'";
    $res=mysqli_query($conn,$sql);
    $row = $res->fetch_assoc();
    $name=$row['g_name'];
    $price=$row['g_price'];
    $num=$row['g_num'];
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
        <b>
        <?php
        if($row['o_status']==1){
            echo "订单处理中";
        } else {
            echo "订单已送达";
        }
        ?>
        >
        </b>

    </div>
    <div class="order-message">
        <div><span>感谢您的支持，你可以</span><span></span></div>
        <div>
            <button type="button" class="btn btn-success" onclick ="location.href='../index.php'">返回首页</button>
            <button type="button" class="btn btn-info">申请退单</button>
        </div>
    </div>
    <div class="order-message">
        <div><span><?php echo $_SESSION['shop_name'] ?></span><span></span></div>
        <?php


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
        <div><span>联系商家</span><span>实付￥<?php echo $total; ?></span></div>
    </div>
    <div class="order-message">
        <div><span>配送信息</span><span></span></div>
        <div><span>送达时间</span><span>尽快送达</span></div>
        <div style="height:8rem;"><span>收货地址</span><div class="address"><?php echo $_SESSION['address'] ?><?php echo $_SESSION['usename']?>&nbsp<?php echo $_SESSION['tel'] ?></div></div>
        <div><span>配送方式</span><span>商家配送</span></div>
    </div>
    <div class="order-message">
        <div><span>订单信息</span><span></span></div>
        <div><span>订单号</span><span><?php echo $row['o_id'] ?></span></div>
        <div><span>支付方式</span>
             <span>
             <?php
                     if($row['pay_way']==1){
                         echo "在线支付";
                     } else {
                         echo "现金支付";
                     }
                     ?>
             </span>
        </div>
        <div><span>下单时间</span><span><?php echo $row['create_time'] ?></span></div>
    </div>
</div>

<!--先引入jq其他才会生效-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/global.js"></script>
</body>
</html>