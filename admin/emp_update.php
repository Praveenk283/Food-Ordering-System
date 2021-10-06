<?php
require('database_connectivity.php');
require("function.php");
$e_id=$_POST["e_id"];
$b_id=$_POST["b_id"];
$e_name=$_POST["e_name"];
$e_contact=$_POST["e_contact"];
$e_address=$_POST["e_address"];
$e_email=$_POST["e_email"];
$e_username=$_POST["e_username"];
$e_password=$_POST["e_password"];
$e_date=$_POST["e_date"];

/*
$folder="photos/";

$pd_image1=$_FILES["pd_image1"]["name"];
$tmp_pd_image1=$_FILES["pd_image1"]["tmp_name"];

if(empty($pd_image1))
{
	$pd_image1=$_POST["old_pd_image1"];
}
else
{
	$pd_image1=upload_image($pd_image1,$tmp_pd_image1,$folder);
}


$pd_image2=$_FILES["pd_image2"]["name"];
$tmp_pd_image2=$_FILES["pd_image2"]["tmp_name"];

if(empty($pd_image2))
{
	$pd_image2=$_POST["old_pd_image2"];
}
else
{
	$pd_image2=upload_image($pd_image2,$tmp_pd_image2,$folder);
}
*/

$sql=$conn->prepare("UPDATE employee SET b_id=?,e_name=?,e_contact=?,e_address=?,e_email=?,e_username=?,e_password=?,e_date=? WHERE e_id=?");
$sql->bind_param("isisssssi",$b_id,$e_name,$e_contact,$e_address,$e_email,$e_username,$e_password,$e_date,$e_id); 

if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Successfully Updated!');
  window.location='emp_view.php';
 </script>";
}
 else
 {
 echo"<script type='text/javascript'>
  alert('Not Updated!');
  window.location='emp_view.php';

 </script>";
}
?>
