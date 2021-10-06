<?php
require("database_connectivity.php");
session_start();
$customer_username=$_POST["login_cus_username"];
$customer_password=$_POST["login_cus_password"];
$sql=$conn->prepare("SELECT * FROM customer WHERE cus_username=?");
$sql->bind_param("s",$customer_username);
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
$enc_password=$row['cus_password'];
$dec_password=base64_decode($enc_password);  
$url=$_POST["product_details_url"];
if($customer_password==$dec_password)
{
    $_SESSION['customer']=$customer_username;                
    if($url!="NAN")
    {
        header('Location: '.$url);
    }
    else
    {
        header('Location:index.php');
    }
}
else
{
    echo "<script type='text/javascript'>
            alert('Invalid Username or Password!');
            window.location='index.php';
            </script>";    
}
?>
