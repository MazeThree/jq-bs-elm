<?php
    session_start();
  require_once('../php/link.php');
  require_once('../php/home/del_cookie.php');
  $shop_id=$_GET['shop_id'];
  $_SESSION['shop_id'] = $shop_id;
  //echo $usename,$password,$tel,$email;

  $sql="select * from shop where shop_id= '{$shop_id}'";

  $res = $conn->query($sql);
  $row = $res->fetch_assoc();
  $_SESSION['shop_name'] = $row['shop_name'];
  ?>