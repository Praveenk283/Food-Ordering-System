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

$b_id = ['b_id'];
// $delivery_charges=$_POST["ci_delivery_charges"];
$subtotal=$_POST['ci_subtotal'];
$tax=$_POST['ci_tax'];
$total_discount=$_POST['ci_total_discount'];
$grand_total=$_POST['ci_grand_total'];


$ci_delivery_charges=100;

$payment_mode=$_POST["payment_mode"];
$ci_shipping_address=$_POST["ci_shipping_address"];
$ci_landmark=$_POST["ci_landmark"];
$ci_city=$_POST["ci_city"];
$ci_pin=$_POST["ci_pin"];
$ci_state=$_POST['ci_state'];
$ci_country=$_POST['ci_country'];
$ci_contact_no=$_POST["cus_contact"];
$ci_date=date('d-m-Y');

// echo $ci_date;
// echo $ci_contact_no;

if($payment_mode=="COD")
{
    $transaction_no=0;
}else
{    
    $transaction_no=$_POST["ci_transaction_no"];
}
$status="ORDER PENDING";

//$message = "Your ORDER NO :$order_no Has Been Placed Successfully,Will Confirm Your Order Soon";
//$data=urlencode($message);
// $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$contact&text=$data&priority=ndnd&stype=normal";

$sql=$conn->prepare("INSERT INTO customer_invoice(cus_id,b_id,ci_order_no,ci_shipping_address,ci_landmark,ci_city,ci_pin,ci_state,ci_country,ci_delivery_charges,ci_contact_no,ci_date,ci_payment_mode,ci_transaction_no,ci_subtotal,ci_tax,ci_total_discount,ci_grand_total,ci_status)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

$sql->bind_param("iissssissiisssdddds",$cus_id,$b_id,$order_no,$ci_shipping_address,$ci_landmark,$ci_city,$ci_pin,$ci_state,$ci_country,$ci_delivery_charges,$ci_contact_no,$ci_date,$payment_mode,$transaction_no,$subtotal,$tax,$total_discount,$grand_total,$status);

$sql->execute();

$pcd_cart="CART";
$pcd_date=date("d-m-Y");
$prod_cart_status="ORDER PLACED";
$sql1=$conn->prepare("UPDATE product_cart_details SET pcd_status=?,pcd_date=? WHERE cus_id=? AND pcd_status=?");
$sql1->bind_param("siss",$prod_cart_status,$cd_id,$pcd_cart,$pcd_date);
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