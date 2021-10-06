<?php
    require('database_connectivity.php');
    $sd_id=$_POST["sd_id"];
    $pd_id=$_POST["pd_id"];
    $sd_qty=$_POST["sd_qty"];
    $sd_unit_price=$_POST["sd_unit_price"];
    $sd_discount=$_POST["sd_discount"];
    $sd_discount_price=$_POST["sd_discount_price"];
    $sd_sale_price=$_POST["sd_sale_price"];
    $sd_status=$_POST["sd_status"];
    $sd_date=$_POST["sd_date"];

    $sql=$conn->prepare("UPDATE stock_details SET pd_id=?,sd_unit_price=?,sd_qty=?,sd_discount=?,sd_discount_price=?,sd_sale_price=?,sd_status=?,sd_date=? WHERE sd_id=?");
    $sql->bind_param("ididddssi",$pd_id,$sd_unit_price,$sd_qty,$sd_discount,$sd_discount_price,$sd_sale_price,$sd_status,$sd_date,$sd_id);

    if($sql->execute())
    {
     echo"<script type='text/javascript'>
     alert('Successfully Updated!');
      window.location='stock_view.php';
     </script>";
    }
     else
     {
      echo"<script type='text/javascript'>
     alert('Not Updated!');
      window.location='stock_view.php';
      </script>";   
     }
?>