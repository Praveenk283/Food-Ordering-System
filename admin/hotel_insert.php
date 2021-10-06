<?php
require('database_connectivity.php');
$b_name=$_POST["b_name"];
$b_location=$_POST["b_location"];
$b_contact=$_POST["b_contact"];
$b_address=$_POST["b_address"];
$b_date=$_POST["b_date"];
$sql=$conn->prepare("INSERT INTO branch(b_name,b_location,b_contact,b_address,b_date)VALUES(?,?,?,?,?)");
$sql->bind_param("ssiss",$b_name,$b_location,$b_contact,$b_address,$b_date);
if($sql->execute())
{
echo"<script type='text/javascript'>
alert('Successfully Regestered!');
window.location='hotel_view.php';
</script>";
}
else
{
echo"<script type='text/javascript'>
alert('Not Registered!');
window.location='hotel_form.php';
</script>";    
}
?>
}}