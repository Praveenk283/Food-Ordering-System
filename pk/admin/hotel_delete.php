<?php 
require("database_connectivity.php");

$b_id=$_POST["b_id"];
$sql=$conn->prepare("DELETE FROM branch WHERE b_id=?");
$sql->bind_param("i",$b_id);
if($sql->execute()){
echo"<script type='text/javascript'>
alert('Record Successfully Deleted!');
window.location='hotel_view.php';
</script>";
}else{
echo"<script type='text/javascript'>
alert('Record Not Deleted!');
window.location='hotel_view.php';
</script>";
}
?>