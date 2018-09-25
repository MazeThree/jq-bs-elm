<?php

  $name=$_POST['name'];
  $price=$_POST['price'];
  $quantity=$_POST['num'];

  if(empty($quantity)) $quantity=1;

  //购物车无产品，添加
  if (empty ($_COOKIE["t_name_list"]))
  {
     setcookie("t_name_list",$name);
     setcookie("price_list",$price);
     setcookie("quantity_list",$quantity);
  }
  //有产品，则更新数据
  else
  {
      //将字符串拆分为数组

      $t_name_array=explode(",",$_COOKIE["t_name_list"]);
      $price_array=explode(",",$_COOKIE["price_list"]);
      $quantity_array=explode(",",$_COOKIE["quantity_list"]);
       ///搜索是否存在对应$id，存在增加对应数量，不存在则创建
      if(in_array($name,$t_name_array))
      {
          $key=array_search($name,$t_name_array);
          $quantity_array[$key]=$quantity;
      }
      else
      {
          $t_name_array[]=$name;
          $price_array[]=$price;
          $quantity_array[]=$quantity;
      }
        //将数组元素组合为字符串
      setcookie("t_name_list",implode(",",$t_name_array));
      setcookie("price_list",implode(",",$price_array));
      setcookie("quantity_list",implode(",",$quantity_array));
  }


?>