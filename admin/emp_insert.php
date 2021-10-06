<?php
require('database_connectivity.php');
$b_id=$_POST["b_id"];
$e_name=$_POST["e_name"];
$e_contact=$_POST["e_contact"];
$e_address=$_POST["e_address"];
$e_email=$_POST["e_email"];
$e_username=$_POST["e_username"];
$e_password=base64_encode($_POST["e_password"]);
$e_date=date('d-m-Y');

$sql1=$conn->prepare("select * from employee where e_contact=?");
$sql1->bind_param("i",$e_contact);
$sql1->execute();
$result1=$sql1->get_result();

$sql2=$conn->prepare("select * from employee where e_email=?");
$sql2->bind_param("s",$e_email);
$sql2->execute();
$result2=$sql2->get_result();


$sql3=$conn->prepare("select * from employee where e_username=?");
$sql3->bind_param("s",$e_username);
$sql3->execute();
$result3=$sql3->get_result();

if($result1->num_rows > 0)
{
    echo"<script type='text/javascript'>
 alert('Contact Already Exists!');
window.history.back();
 </script>";
}
else if($result2->num_rows > 0)
{
     echo"<script type='text/javascript'>
 alert('Email Already Exists!');
window.history.back();
 </script>";
}
else if($result3->num_rows > 0)
{
     echo"<script type='text/javascript'>
 alert('Username is taken. Try a different one!');
window.history.back();
 </script>";   
}
else
{
    $sql=$conn->prepare("INSERT INTO employee(b_id,e_name,e_contact,e_address,e_email,e_username,e_password,e_date)VALUES(?,?,?,?,?,?,?,?)");
$sql->bind_param("isisssss",$b_id,$e_name,$e_contact,$e_address,$e_email,$e_username,$e_password,$e_date);
if($sql->execute())
{
 echo"<script type='text/javascript'>
 alert('Successfully Registered!');
window.location='emp_view.php';
 </script>";
}

    else
 {
  echo"<script type='text/javascript'>
 alert('Not Registered!');
window.location='emp_form.php';

 </script>";       
 }
    
}

?>
