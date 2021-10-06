<?php 
session_start();
require('database_connectivity.php');
require('4_customer_session_data.php');

$order_no="";
$characters = array_merge(range('0','9'));
for ($i = 0; $i < 6; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $order_no .= $characters[$rand];
}

$b_name = ['b_name'];
$delivery_charges=$_POST["ci_delivery_charges"];
$sub_total=$_POST['ci_sub_total'];
$cgst_percent=$_POST['ci_cgst_percent'];
$cgst=$_POST['ci_cgst'];
$sgst_percent=$_POST['ci_sgst_percent'];
$sgst=$_POST['ci_sgst'];
$payment_mode=$_POST["payment_mode"];
$shipping_address=$_POST["ci_shipping_address"];
$landmark=$_POST["ci_landmark"];
$contact_no=$_POST["cus_contact"];
$date=date('Y-m-d');
$total_price=$_POST['Grand_total'];
if($payment_mode=="COD")
{
    $transaction_no=0;
}else
{    
    $transaction_no=$_POST["ci_transaction_no"];
}
$status="ORDER PENDING";

$message = "Your ORDER NO :$order_no Has Been Placed Successfully,Will Confirm Your Order Soon";
$data=urlencode($message);
$sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$contact&text=$data&priority=ndnd&stype=normal";
    
$sql=$conn->prepare("INSERT INTO customer_invoice(cus_id,ci_order_no,b_name,ci_shipping_address,ci_landmark,ci_delivery_charges,ci_total_price,cus_contact,ci_date,ci_payment_mode,ci_transaction_no,ci_status,ci_cgst_percent,ci_cgst,ci_sgst_percent,ci_sgst,ci_sub_total)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$sql->bind_param("iissssiissssdddddi",$cd_id,$order_no,$b_name,$shipping_address,$landmark,$delivery_charges,$total_price,$contact_no,$date,$payment_mode,$transaction_no,$status,$cgst_percent,$cgst,$sgst_percent,$sgst,$sub_total);
$sql->execute();

$pcd_cart="CART";
$prod_cart_status="ORDER PLACED";
$sql1=$conn->prepare("UPDATE product_cart_details SET pcd_order_no=?,pcd_status=? WHERE cus_id=? AND pcd_status=?");
$sql1->bind_param("isis",$order_no,$prod_cart_status,$cd_id,$pcd_cart);
if($sql1->execute())
{

    echo"<script type='text/javascript'>
    alert('ORDER PLACED SUCCESSFULLY');
    window.location='index.php';
    </script>";
}else{
    echo"<script type='text/javascript'>
    alert('ORDER NOT PLACED!!!');
    window.history.back();
    </script>";
}

?>
