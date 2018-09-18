<?php
   require_once('../link.php');
   $shop_id=$_POST['shop_id'];

   //echo $usename,$password,$tel,$email;

   $sql= "SELECT a.cate_name, a.shop_id,a.cate_id, b.g_name,b.price,b.sale FROM goods_cate a,goods b where a.shop_id = b.shop_id and a.shop_id='{$shop_id}'";

   $res=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($res)){
   echo json_encode($row,JSON_UNESCAPED_UNICODE);
}
?>