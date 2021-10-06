<?php 
require("database_connectivity.php");

$cus_id=$_POST["cus_id"];
$sql=$conn->prepare("DELETE FROM customer WHERE cus_id=?");
$sql->bind_param("i",$cus_id);
if($sql->execute()){
    echo"<script type='text/javascript'>
    alert('Record Successfully Deleted!');
    window.location='customer_view.php';
    </script>";
}
else
{
    echo"<script type='text/javascript'>
    alert('Record Not Deleted!');
    window.location='customer_view.php';
    </script>";
}
?>