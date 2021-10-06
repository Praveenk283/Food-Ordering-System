<?php
session_start();
require("../database_connectivity.php");
    
    $ad_username=$_POST["ad_username"];
    $ad_password=$_POST["ad_password"];

    $sql=$conn->prepare("SELECT * FROM admin where ad_username=?");
    $sql->bind_param("s",$ad_username);
    $sql->execute();
    $result=$sql->get_result();
    if($result->num_rows > 0)
    {
        $row=$result->fetch_assoc();

         if($ad_password == base64_decode($row["ad_password"]))
        {
            $_SESSION["admin_username"]=$ad_username;
            header("Location:../admin/");
        }
        else
        {
            echo "<script>
alert('Invalid Password!');
    window.location='index.php';
</script>";
        }
    }
    else
    {
        echo "<script>
alert('Invalid Username or Password!');
    window.location='index.php';
</script>";
    }
?>
