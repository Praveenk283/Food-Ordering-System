<?php
require('database_connectivity.php');
$e_id=$_POST["e_id"];
$e_name=$_POST["e_name"];
$e_contact=$_POST["e_contact"];
$e_email=$_POST["e_email"];
$e_address=$_POST["e_address"];
$e_username=$_POST["e_username"];
$e_password=base64_encode($_POST["e_password"]);
$e_date=$_POST["e_date"];
$sql=$conn->prepare("insert into employee(e_name,e_contact,e_email,e_address,e_username,e_password,e_date)VALUES(?,?,?,?,?,?,?)");
$sql->bind_param("sisssss",$e_name,$e_contact,$e_email,$e_address,$e_username,$e_password,$e_date);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('successfully inserted');
 window.location='emp_view.php';
 </script>";
}
 else
 {
  echo"<script type='text/javascript'>
 alert('not inserted');
 window.location='emp_form.php';
 </script>";  
 }
?>