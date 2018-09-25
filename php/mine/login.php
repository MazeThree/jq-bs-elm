<?php
session_start();
//包含数据库连接文件
require_once('../link.php');
//注销登录
// if($_GET['action'] == "logout"){
//     unset($_SESSION['userid']);
//     unset($_SESSION['username']);
//     echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
//     exit;
// }

//登录
if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$tel = $_POST['tel'];
$passcode = $_POST['password'];
//检测用户名及密码是否正确
$sql = "select * from `user` where tel='$tel' and password='$passcode'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    //登录成功
    while($row = $result->fetch_assoc()){
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['address'] = $row['address'];
    $_SESSION['tel'] = $tel;
    $_SESSION['usename'] = $row['usename'];
    $_SESSION['money'] = $row['money'];
    echo "<script>window.location.href='../../mine/index.php'</script>";
    // echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';
    exit;
     }
} else {
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}
?>