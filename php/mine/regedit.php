<?php
require_once('../link.php');
$usename=$_POST['usename'];
$password=$_POST['password'];
$tel=$_POST['tel'];
$email=$_POST['email'];

//echo $usename,$password,$tel,$email;

$sql="select * from user where tel= '$tel'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
if($row!=0)
{
    mysqli_free_result($res);
    echo "<script>alert('用户已存在！');";
        echo "history.back(-1);";
        echo "</script>";
}
else
{
    $sql="insert into user (usename,password,tel,email) VALUES ('{$usename}','{$password}','{$tel}','{$email}')";
    $res=mysqli_query($conn,$sql);
    echo "<script>alert('注册成功！');";
    echo "history.back(-1);";
        echo "</script>";
}
?>