<?php
require('database_connectivity.php');
//$psc_id=$_POST["psc_id"];
$psc_name=$_POST["psc_name"];
$psc_date=$_POST["psc_date"];
$sql=$conn->prepare("INSERT INTO product_sub_category(psc_name,psc_date)VALUES(?,?)");
$sql->bind_param("ss",$psc_name,$psc_date);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Successfully Inserted!');
 window.location='product_sub_category_view.php';
 </script>";
}
 else
 {
  echo"<script type='text/javascript'>
 alert('Not Inserted!');
 window.location='product_sub_category_view.php';
 </script>";      
 }
?>
