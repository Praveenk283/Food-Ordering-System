<?php
require('database_connectivity.php');
require("function.php");

$pc_id=$_POST["pc_id"];
$pc_name=$_POST["pc_name"];
$pc_date=$_POST["pc_date"];

$folder="photos/";

$pc_image=$_FILES["pc_image"]["name"];
$tmp_pc_image=$_FILES["pc_image"]["tmp_name"];

if(empty($pc_image))
{
	$pc_image=$_POST["old_pc_image"];
}
else
{
	$pc_image=upload_image($pc_image,$tmp_pc_image,$folder);
}

$sql=$conn->prepare("UPDATE product_category SET pc_name=?,pc_image=?,pc_date=? WHERE pc_id=?");
$sql->bind_param("sssi",$pc_name,$pc_image,$pc_date,$pc_id);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Successfully Updated!');
  window.location='product_category_view.php';
 </script>";
}
 else
 {
  echo"<script type='text/javascript'>
 alert('Not Updated!');
  window.location='product_category_view.php';
 </script>";      
 }
?>
