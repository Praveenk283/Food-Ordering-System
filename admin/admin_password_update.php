<?php
    session_start();
    require("database_connectivity.php");

    $ad_user_name=$_SESSION['admin_username'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];
    $c_new_password=$_POST['confirm_password'];
    $ad_date=date("d-m-Y");

    if($new_password == $c_new_password)
    {
       $new_password_encode=base64_encode($new_password);
          // $new_password_encode=($new_password);
        $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username = ?");
        $sql->bind_param("s",$ad_user_name);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();

      if($old_password == base64_decode($row['ad_password']))
//        if($old_password == ($row['ad_password']))
        {
            $sql1=$conn->prepare("UPDATE admin SET ad_password=?,ad_date=? WHERE ad_username=?");
            $sql1->bind_param("sss",$new_password_encode,$ad_date,$ad_user_name);
            if($sql1->execute())
            {
                echo "<script type='text/javascript'>
                    alert('Password Successfully Updated!');
                    window.location='index.php';
                </script>";

            }
            else
            {
                echo "<script type='text/javascript'>
                    alert('Password Not Updated!');
                   window.location='admin_password_form.php';
                </script>";
            }
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Old Password is Invalid!');
               window.location='admin_password_form.php';
            </script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('New Password & Confirm Password Does NOt Match!');
                window.location='admin_password_form.php';
            </script>";
    }
?>