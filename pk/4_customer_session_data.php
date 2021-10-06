<?php
if(isset($_SESSION['customer']))
{
$customer_session=TRUE;
require("database_connectivity.php");
$sql=$conn->prepare("SELECT * FROM customer WHERE cus_username=?");
$sql->bind_param("s",$_SESSION["customer"]);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$cus_fname=$row["cus_fname"];
$cus_lname=$row["cus_lname"];
$cus_name=$cus_fname." ".$cus_lname;
$cus_id=$row["cus_id"];
$cus_contact=$row["cus_contact"];
$cus_email=$row["cus_email"];
$cus_address=$row["cus_address"];
$cus_username=$row["cus_username"];
$cus_password_enc=$row["cus_password"];
$cus_password=base64_decode($cus_password_enc);
}
else
{
    $customer_session=FALSE;
}
?>