<?php
require('database_connectivity.php');
//$cus_id=$_POST["cus_id"];
$cus_fname=$_POST["cus_fname"];
$cus_lname=$_POST["cus_lname"];
$cus_name=$cus_fname." ".$cus_lname;
$cus_contact=$_POST["cus_contact"];
$cus_email=$_POST["cus_email"];
$cus_address=$_POST["cus_address"];
$cus_username=$_POST["cus_username"];
$cus_password=base64_encode($_POST["cus_password"]);
$cus_date=date('d-m-Y');

$sql1=$conn->prepare("select * from customer where cus_contact=?");
$sql1->bind_param("i",$cus_contact);
$sql1->execute();
$result1=$sql1->get_result();

$sql2=$conn->prepare("select * from customer where cus_email=?");
$sql2->bind_param("s",$cus_email);
$sql2->execute();
$result2=$sql2->get_result();


$sql3=$conn->prepare("select * from customer where cus_username=?");
$sql3->bind_param("s",$cus_username);
$sql3->execute();
$result3=$sql3->get_result();

if($result1->num_rows > 0)
{
    echo"<script type='text/javascript'>
 alert('Contact Already Exists!');
window.history.back();
 </script>";
}
else if($result2->num_rows > 0)
{
     echo"<script type='text/javascript'>
 alert('Email Already Exists!');
window.history.back();
 </script>";
}
else if($result3->num_rows > 0)
{
     echo"<script type='text/javascript'>
 alert('Username Already Exists! Try a different one!');
window.history.back();
 </script>";   
}
else
{
    $sql=$conn->prepare("INSERT INTO customer(cus_fname,cus_lname,cus_name,cus_contact,cus_email,cus_address,cus_username,cus_password,cus_date)VALUES(?,?,?,?,?,?,?,?,?)");
$sql->bind_param("sssisssss",$cus_fname,$cus_lname,$cus_name,$cus_contact,$cus_email,$cus_address,$cus_username,$cus_password,$cus_date);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Successfully Registered!');
window.location='../index.php';
 </script>";
}
 else
 {
  echo"<script type='text/javascript'>
 alert('Not Registered!');
 window.location='../index.php';
 </script>";       
 }
}

?>
