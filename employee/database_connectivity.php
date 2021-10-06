<?php
     $servername="localhost";
     $username="root";
     $password="";
     $database="aminos";
     $conn=new
         mysqli($servername,$username,$password,$database);
if  ($conn->connect_errno)
{
  echo"failed to contact".$conn->connect_errno;
}
?>
         
    
