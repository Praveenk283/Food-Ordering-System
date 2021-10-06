<?php 
require("database_connectivity.php");

$psc_id=$_POST["psc_id"];
$sql=$conn->prepare("DELETE FROM product_sub_category WHERE psc_id=?");
$sql->bind_param("i",$psc_id);
if($sql->execute()){
    echo"<script type='text/javascript'>
    alert('Record Successfully Deleted!');
    window.location='product_sub_category_view.php';
    </script>";
}else{
    echo"<script type='text/javascript'>
    alert('Record Not Deleted');
    window.location='product_sub_category_view.php';
    </script>";
}
?>