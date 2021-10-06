<?php 
require('database_connectivity.php');
session_start();
require("4_customer_session_data.php");//CONTAINS USER SESSION DATA

$pcd_id=$_POST['pcd_id'];
$pd_id=$_POST['pd_id'];
$update_qty=$_POST['update_qty'];
$unit_price=$_POST['sd_unit_price'];
$stock_discount=$_POST['sd_discount'];
$tot_prod_cart_price=$unit_price-$stock_discount;
$total_price=$tot_prod_cart_price*$update_qty;

// $sql4=$conn->prepare("SELECT * FROM extra_charges");
// $sql4->execute();
// $result4=$sql4->get_result();
// $row4=$result4->fetch_assoc();
// $max_stock_qty=$row4["max_stock_qty"];

$sql5=$conn->prepare("SELECT * FROM stock_details WHERE pd_id=?");
$sql5->bind_param("i",$pd_id);
$sql5->execute();
$result5=$sql5->get_result();
$row5=$result5->fetch_assoc();
$stock_qty=$row5["sd_qty"];

$sql1=$conn->prepare("SELECT * FROM product_cart_details WHERE pcd_id=? AND cus_id=?");
$sql1->bind_param("ii",$pcd_id,$cus_id);
$sql1->execute();
$result1=$sql1->get_result();
$row1=$result1->fetch_assoc();
$prod_cart_qty=$row1["pcd_qty"];

if($update_qty>$stock_qty)
{
    echo "<script type='text/javascript'>    
    alert('Quantity Exceeds Limit');        
    window.history.back();
    </script>";        
}
else if($prod_cart_qty==$update_qty)
{
    echo "<script type='text/javascript'>
    alert('Item Already Added');        
    window.history.back();
    </script>";    
}
else if($update_qty<=0){
    echo "<script type='text/javascript'>
    alert('Quantity Cannot Be Equal or Less than Zero');        
    window.history.back();
    </script>";    
}
else{
//INSERT ITEM INTO CART
$sql=$conn->prepare("UPDATE product_cart_details SET pcd_qty=?,pcd_total_amount=? WHERE pcd_id=? AND cus_id=?");
$sql->bind_param("idii",$update_qty,$total_price,$pcd_id,$cus_id);
if($sql->execute())
{
    echo "<script type='text/javascript'>
    alert('Item Updated to Cart');        
    window.history.back();
    </script>";
}else
{
    echo "<script type='text/javascript'>
    alert('Item Not Updated');        
    window.history.back();
    </script>";    
}
}
?>