<?php 
require("database_connectivity.php");

$pc_id=$_POST["pc_id"];
$sql=$conn->prepare("DELETE FROM product_category WHERE pc_id=?");
$sql->bind_param("i",$pc_id);
if($sql->execute()){
    echo"<script type='text/javascript'>
    alert('Record Successfully Deleted!');
    window.location='product_category_view.php';
    </script>";
}else{
    echo"<script type='text/javascript'>
    alert('Record Not Deleted!');
    window.location='product_category_view.php';
    </script>";
}
?>