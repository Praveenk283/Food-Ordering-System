<?php
session_start();
require("database_connectivity.php");
    
    $e_username=$_POST["e_username"];
    $e_password=$_POST["e_password"];

    $sql=$conn->prepare("SELECT * FROM employee where e_username=?");
    $sql->bind_param("s",$e_username);
    $sql->execute();
    $result=$sql->get_result();
    if($result->num_rows > 0)
    {
        $row=$result->fetch_assoc();
        if($e_password == base64_decode($row["e_password"]))
        {
            $_SESSION["emp_username"]=$e_username;
            header("Location:employee/");
        }
        else
        {
            echo "<script>
alert('INVALID USERNAME AND PASSWORD');
    window.location='emp_login.php';
</script>";
        }
    }
    else
    {
        echo "<script>
alert('INVALID USERNAME AND PASSWORD');
    window.location='emp_login.php';
</script>";
    }
?>


