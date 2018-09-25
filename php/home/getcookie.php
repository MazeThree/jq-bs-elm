<?php
   //若购物车为空，则无显示
          if(empty ($_COOKIE["t_name_list"]))
          {
             echo "<p align='center'>购物车暂无数据</p>";
          }
          else
          {
              $price=$_COOKIE["price_list"];
              $name=$_COOKIE["t_name_list"];
              $num=$_COOKIE["quantity_list"];
              //获取购物车数据
              $t_name_array=explode(",",$name);
              $price_array=explode(",",$price);
              $quantity_array=explode(",",$num);

              //显示购物车产品内容
              //减一是因为数组下标溢出了
              for($i=0;$i<count($t_name_array);$i++)
              {
                  //计算小计金额
                  $sub_total=$price_array[$i]*$quantity_array[$i];

                  //显示各字段数据
                  echo "<p>";
                  echo "<b name='name'>".$t_name_array[$i]."</b>";
                  echo "<span>￥".$sub_total."</span>";
                  echo "<span>数量".$quantity_array[$i]."</span>";
                  echo "</p>";
          }
          echo "<input name='price' type='hidden' value='".$price."' />";
          echo "<input name='name' type='hidden' value='".$name."' />";
          echo "<input name='num' type='hidden' value='".$num."' />";

          }
          ?>