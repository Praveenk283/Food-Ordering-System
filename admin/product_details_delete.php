<?php 
require("database_connectivity.php");

$pd_id=$_POST["pd_id"];
$sql=$conn->prepare("DELETE FROM product_details WHERE pd_id=?");
$sql->bind_param("i",$pd_id);
if($sql->execute()){
    echo"<script type='text/javascript'>
    alert('Record Successfully Deleted!');
    window.location='product_details_view.php';
    </script>";
}
else{
    echo"<script type='text/javascript'>
    alert('Record Not Deleted!');
    window.location='product_details_view.php';
    </script>";
}
?>