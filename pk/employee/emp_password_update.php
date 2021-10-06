<?php
    session_start();
    require("database_connectivity.php");

    $e_user_name=$_SESSION['e_username'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $c_new_password=$_POST['confirm_password'];
    $ad_date=date("Y-m-d");

    if($new_password == $c_new_password)
    {
        $new_password_encode=base64_encode($new_password);
        $sql=$conn->prepare("SELECT * FROM employee WHERE e_name = ?");
        $sql->bind_param("s",$e_name);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();

        if($old_password == base64_decode($row['e_password']))
        {
            $sql1=$conn->prepare("UPDATE employee SET e_password=?,e_date=? WHERE e_name=?");
            $sql1->bind_param("sss",$new_password_encode,$e_date,$e_user_name);
            if($sql1->execute())
            {
                echo "<script type='text/javascript'>
                    alert('Password Updated');
                    window.location='index.php';
                </script>";

            }
            else
            {
                echo "<script type='text/javascript'>
                    alert('Password Not Updated');
                   // window.location='emp_password_form.php';
                </script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Old Password Is Invalid');
               // window.location='emp_password_form.php';
            </script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('NEW AND CONFIRM PASSWORD DOES NOT MATCH');
                //window.location='emp_password_form.php';
            </script>";
    }
?>