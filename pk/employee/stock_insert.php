<?php
    require('database_connectivity.php');
    //$stock_id=$_POST["stock_id"];
    $pd_id=$_POST["pd_id"];
    $sd_qty=$_POST["sd_qty"];
    $sd_unit_price=$_POST["sd_unit_price"];
    $sd_total_price=$_POST["sd_sale_price"];
    $sd_status=$_POST["sd_status"];
    $sd_status=$_POST["sd_status"];
    $sd_date=$_POST["sd_date"];

    $sql=$conn->prepare("INSERT INTO stock_details(pd_id,sd_qty,sd_unit_price,sd_sale_price,sd_status,sd_date)VALUES(?,?,?,?,?,?)");
    $sql->bind_param("iiddss",$pd_id,$sd_qty,$sd_unit_price,$sd_total_price,$sd_status,$sd_date);

    if($sql->execute())
    {
     echo"<script type='text/javascript'>
     alert('successfully inserted');
	 window.location='stock_view.php';
     </script>";
    }
     else
     {
      echo"<script type='text/javascript'>
     alert('not  inserted');
	 window.location='stock_view.php';
     </script>";   
     }
?>