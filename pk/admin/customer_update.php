<?php
require('database_connectivity.php');
$cus_id=$_POST["cus_id"];
$cus_name=$_POST["cus_name"];
$cus_contact=$_POST["cus_contact"];
$cus_email=$_POST["cus_email"];
$cus_address=$_POST["cus_address"];
$cus_username=$_POST["cus_username"];
$cus_password=$_POST["cus_password"];
$cus_date=$_POST["cus_date"];

$sql=$conn->prepare("UPDATE customer SET cus_name=?,cus_contact=?,cus_email=?,cus_address=?,cus_username=?,cus_password=?,cus_date=? WHERE cus_id=?");
$sql->bind_param("sisssssi",$cus_name,$cus_contact,$cus_email,$cus_address,$cus_username,$cus_password,$cus_date,$cus_id);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Successfully Updated!');
 window.location='customer_view.php';                   
 </script>";
}
 else
 {
  echo"<script type='text/javascript'>
 alert('Not Updated!');
 window.location='customer_view.php';
 </script>";       
 }
?>
