<?php
require("database_connectivity.php");

$e_id=$_POST["e_id"];
$e_name=$_POST["e_name"];
$e_address=$_POST["e_address"];
$e_contact=$_POST["e_contact"];
$e_email=$_POST["e_email"];

$sql=$conn->prepare("UPDATE employee SET e_name=?,e_address=?,e_contact=?,e_email=? WHERE e_id=?");
$sql->bind_param("ssisi",$e_name,$e_address,$e_contact,$e_email,$e_id);
if($sql->execute())
{
    echo"<script type='text/javascript'>
        alert('Profile Updated Sucessfully');
        window.location='emp_profile.php';
    </script>";
}else{
        echo"<script type='text/javascript'>
        alert('Profile Not Updated');
        window.location='emp_profile.php';
    </script>";
}
?>