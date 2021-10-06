<?php 
require("database_connectivity.php");

$e_id=$_POST["e_id"];
$sql=$conn->prepare("DELETE FROM employee WHERE e_id=?");
$sql->bind_param("i",$e_id);
if($sql->execute()){
    echo"<script type='text/javascript'>
    alert('Record Successfully Deleted!');
    window.location='emp_view.php';
    </script>";
}
else
{
    echo"<script type='text/javascript'>
    alert('Record Not Deleted!');
    window.location='emp_view.php';
    </script>";
}
?>