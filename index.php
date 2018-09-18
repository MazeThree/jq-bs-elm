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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/css/swiper.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--<link rel="stylesheet"  href="css/reset.css" />-->
    <link rel="stylesheet" href="css/index.css">

    <!--公共样式-->
    <link rel="stylesheet" href="css/global.css">
</head>
<body  style="overflow:scroll; overflow-x:hidden;">
<!--搜索组件-->
<header>
    <div class="header">
        <div id="loaction">
            <a href="#">
                <span class="glyphicon glyphicon-map-marker"></span>
                湖南理工学院1（南院)
                <span class="glyphicon glyphicon-chevron-down"></span>
            </a>
        </div>
        <input type="text" class="form-control search" placeholder="搜索商家、商品名称">
    </div>
</header>

<div class="container">
    <!--活动页图片-->
    <div id="carousel-example-generic" class="carousel slide  link-pic" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="#">
                    <img src="" alt="活动页图片">
                </a>
            </div>
            <div class="item">
                <img src="..." alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
        </div>
    </div>
<!--页面主体-->
    <!--头部导航-->
    <nav class="head-nav">
        <div class="flex-items">
            <a href="#">
                <img src="pictures/红虾.png" alt="美食">
                <div>美食</div>
            </a>
        </div>
        <div class="flex-items">
            <a href="#">
                <img src="pictures/可乐.png" alt="晚餐">
                <div>晚餐</div>
            </a>
        </div>
        <div class="flex-items">
            <a href="#">
                <img src="pictures/橙子.png" alt="水果">
                <div>水果</div>
            </a>
        </div>
        <div class="flex-items">
            <a href="#">
                <img src="pictures/甜筒.png" alt="医药">
                <div>医药健康</div>
            </a>
        </div>
        <div class="flex-items">
            <a href="#">
                <img src="pictures/西蓝花.png" alt="鲜花">
                <div>浪漫鲜花</div>
            </a>
        </div>
        <div class="flex-items">
            <a href="#">
                <img src="pictures/甜点.png" alt="小吃">
                <div>地方小吃</div>
            </a>
        </div>
        <div class="flex-items">
            <a href="#">
                <img src="pictures/葡萄.png" alt="麻辣烫">
                <div>麻辣烫</div>
            </a>
        </div>
        <div class="flex-items">
            <a href="#">
                <img src="pictures/面包.png" alt="地方菜系">
                <div>地方菜系</div>
            </a>
        </div>
    </nav>

    <!--品质套餐、限量抢购-->
    <div class="vip-page">
        <div class="left">
            <b><span class="glyphicon glyphicon-gift"></span>
                超级会员&nbsp&nbsp·&nbsp&nbsp</b>
                已为我省<span>100</span>元
            </div>
        <div class="right">
                <a href="#">
                    <b style="color: red">1.5</b>
                    个奖励金
                    <span class="glyphicon glyphicon-menu-right"></span>
                </a>
            </div>
        </div>

    <div class="box">
            <div class="panic-buy">
                <a href="#">
                    <b style="font-size: 1.6rem">品质套餐</b>
                    <p>搭配齐全吃的好</p>
                    <p>立即抢购&nbsp<span class="glyphicon glyphicon-menu-right"></span></p>
                    <!--用绝对定位-->
                    <div class="right"></div>
                </a>
            </div>
            <div class="panic-buy">
                <a href="#">
                    <b style="color: red;font-size: 1.6rem">限量抢购</b>
                    <p>超值美味 9.9元起</p>
                    <p><span style="color: red">500人</span>正在抢&nbsp<span class="glyphicon glyphicon-menu-right"></span></p>
                    <div class="right"></div>
                </a>
            </div>
        </div>

    <div class="ant-vip">
            <a href="#">
                <p>蚂蚁钻石会员</p>
                <p>按时打算发发发啊沙发，啊实打实大发</p>
            </a>
        </div>

    <!--推荐商家-->
    <div class="main-box">
        <div class="box-head">---- 推荐商家 ----</div>
        <div class="box-nav">
            <div class="flex-items">综合排序</div>
            <div class="flex-items">距离最近</div>
            <div class="flex-items">会员红包</div>
            <div class="flex-items">筛选<span class="glyphicon glyphicon-glass"></span></div>
        </div>
        <!--数据显示-->
        <div id="content" class="box-content content">
        <div class="hiddendata">
                    <?php
                        require_once('php/link.php');
                        $sql = "SELECT * FROM shop";
                        $res=mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($res)){
                            echo "<a class='content-items' href='./home/detail.php?shop_id=".$row[0]."'>";
                            echo "<div class='col-xs-3 col-md-3'>
                                    <img src='./pictures/可乐.png' alt='商家图片'>
                                    </div>";
                            echo "<div class='col-xs-9 col-md-9'>";
                            echo "<p>".$row[1]."</p>";
                            echo "<p><span class=' glyphicon glyphicon-star' style='color: orange'>4.6</span>&nbsp<span>月售".$row['salenum']."</span></p>";
                            echo "<p><span>起送</span>&nbsp<span>配送</span></p>";
                            echo "<p>111</p>";
                            echo "</div></a>";
                        }
                        mysqli_close($conn);
                    ?>
                    <a class="content-items" href="./home/detail.html">
                                    <div class="col-xs-3 col-md-3 left">
                                        <img src="./pictures/可乐.png" alt="商家图片">
                                    </div>
                                    <div class="col-xs-9 col-md-9 ">
                                        <b>xxx商店</b>
                                        <p><span class=" glyphicon glyphicon-star" style="color: orange">4.6</span>&nbsp<span>月售</span></p>
                                        <p><span>起送</span>&nbsp<span>配送</span></p>
                                        <p>111</p>
                                    </div>
                                </a>
                </div>
                <ul class="list">数据加载中，请稍后...</ul>
                <div class="more"><a href="javascript:;" onClick="loadding.loadMore();">点击加载更多</a></div>
        </div>
    </div>

</div>

<!--侧边悬浮按钮-->
<div class="side-float">
    <div class=" side-bar up">
        <a href="home/shopping-cart">
            <span class="glyphicon glyphicon-shopping-cart"></span>
        </a>
    </div>
    <div class="side-bar down">
        <a href="#loaction" >
            <span class="glyphicon glyphicon-eject"></span>
        </a>
    </div>
</div>

<!--底部选项卡-->
<footer class="foot-box">
    <div class="flex-items">
        <a href="index.html" class="active">
            <span class="glyphicon glyphicon-home"></span>
            <br>
            <span>首页</span>
        </a>
    </div>
    <div class="flex-items">
        <a href="find/index.html" >
            <span class="glyphicon glyphicon-search"></span>
            <br>
            <span>发现</span>
        </a>
    </div>
    <div class="flex-items">
        <a href="order/index.html">
            <span class="glyphicon glyphicon-list-alt"></span>
            <br>
            <span>订单</span>
        </a>
    </div>
    <div class="flex-items">
        <a href="mine/index.php">
            <span class="glyphicon glyphicon-user"></span>
            <br>
            <span>我的</span>
        </a>
    </div>
</footer>

<!--先引入jq其他才会生效-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.2/js/swiper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>