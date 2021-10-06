<?php 
require('database_connectivity.php');
session_start();
require("4_customer_session_data.php");//CONTAINS USER SESSION DATA

$pcd_id=$_REQUEST['pcd_id'];
$cart_status="CART";
$sql1=$conn->prepare("DELETE FROM product_cart_details WHERE cus_id=? AND pcd_id=? AND pcd_status=?");
$sql1->bind_param("iis",$cus_id,$pcd_id,$cart_status);
if($sql1->execute()){
echo "<script type='text/javascript'>
alert('Product Deleted From Cart');        
window.history.back();
</script>";    
}else
{
echo "<script type='text/javascript'>
alert('Product Not Deleted');        
window.history.back();
</script>";        
}
?>