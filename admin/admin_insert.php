<?php
require('database_connectivity.php');
$ad_id=$_POST["ad_id"];
$ad_name=$_POST["ad_name"];
$ad_contact=$_POST["ad_contact"];
$ad_email=$_POST["ad_email"];
$ad_address=$_POST["ad_address"];
$ad_username=$_POST["ad_username"];
$ad_password=base64_encode($_POST["ad_password"]);
//$ad_password=($_POST["ad_password"]);
$ad_date=$_POST["ad_date"];
$sql=$conn->prepare("insert into admin(ad_name,ad_contact,ad_email,ad_address,ad_username,ad_password,ad_date)VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("sisssss",$ad_name,$ad_contact,$ad_email,$ad_address,$ad_username,$ad_password,$ad_date);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Record Successfully Inserted!');
 window.location='admin_view.php';
 </script>";
}
 else
 {
  echo"<script type='text/javascript'>
 alert('Record Not Inserted!');
 window.location='admin_form.php';
 </script>";  
 }
?>