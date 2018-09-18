<?php
  require_once('../php/link.php');
  $shop_id=$_GET['shop_id'];

  //echo $usename,$password,$tel,$email;

  $sql="select * from shop where shop_id= '{$shop_id}'";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($res);

  ?>