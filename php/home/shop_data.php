<?php
   require_once('../link.php');
   $shop_id=$_POST['shop_id'];

   //echo $usename,$password,$tel,$email;
    $jarr = array();
   $sql= "SELECT a.cate_name,a.cate_id, b.g_name,b.price,b.sale FROM goods_cate a,goods b where a.shop_id = b.shop_id and a.shop_id='{$shop_id}' and a.cate_id=b.g_cate";
   $res=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($res)){
        $count=count($row);//不能在循环语句中，由于每次删除 row数组长度都减小
        for($i=0;$i<$count;$i++){
            unset($row[$i]);//删除冗余数据
        }
        array_push($jarr,$row);
}
echo $str=json_encode($jarr,JSON_UNESCAPED_UNICODE);
?>