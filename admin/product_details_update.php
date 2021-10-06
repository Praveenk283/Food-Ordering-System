<?php
require('database_connectivity.php');
require("function.php");

$pd_id=$_POST["pd_id"];
$pc_id=$_POST["pc_id"];
$psc_id=$_POST["psc_id"];
$pd_name=$_POST["pd_name"];
$pd_description=$_POST["pd_description"];
$pd_price=$_POST["pd_price"];
$pd_date=$_POST["pd_date"];

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

/*
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

$sql=$conn->prepare("UPDATE product_details SET pc_id=?,psc_id=?,pd_name=?,pd_description=?,pd_price=?,pd_image1=?,pd_date=? WHERE pd_id=?");
$sql->bind_param("iississi",$pc_id,$psc_id,$pd_name,$pd_description,$pd_price,$pd_image1,/* $pd_image2, */ $pd_date,$pd_id);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Successfully Updated!');
  window.location='product_details_view.php';
 </script>";
}
 else
 {
 echo"<script type='text/javascript'>
  window.location='product_details_view.php';
 alert('Not Updated!');
 </script>";
}
?>
