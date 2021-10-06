<?php
require('database_connectivity.php');
$b_id=$_POST["b_id"];
$b_name=$_POST["b_name"];
$b_location=$_POST["b_location"];
$b_contact=$_POST["b_contact"];
$b_address=$_POST["b_address"];
$b_date=$_POST["b_date"];
$sql=$conn->prepare("UPDATE branch SET b_name=?,b_location=?,b_contact=?,b_address=?,b_date=? WHERE b_id=?");
$sql->bind_param("ssissi",$b_name,$b_location,$b_contact,$b_address,$b_date,$b_id);
if($sql->execute())
{
echo"<script type='text/javascript'>
alert('Successfully Updated!');
window.location='hotel_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('Not Updated!'); 
window.location='hotel_view.php';
</script>";    
}
?>
