<?php
require("database_connectivity.php");

$ad_id=$_POST["ad_id"];
$ad_name=$_POST["ad_name"];
$ad_address=$_POST["ad_address"];
$ad_contact=$_POST["ad_contact"];
$ad_email=$_POST["ad_email"];
$ad_username=$_POST["ad_username"];
$ad_date=$_POST["ad_date"];

$sql=$conn->prepare("UPDATE admin SET ad_name=?,ad_address=?,ad_username=?,ad_contact=?,ad_email=?,ad_date=? WHERE ad_id=?");
$sql->bind_param("sssissi",$ad_name,$ad_address,$ad_username,$ad_contact,$ad_email,$ad_date,$ad_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>
        alert('Sucessfully Updated!');
        window.location='admin_profile.php';
    </script>";
}else{
        echo"<script type='text/javascript'>
        alert('Not Updated!');
        window.location='admin_profile.php';
    </script>";
}
?>