<?php 
session_start();
include('../database_connectivity.php');
$otp_generated=$_SESSION['otp_generated'];
$username=$_SESSION['username'];
$contact=$_SESSION['contact_no'];
$otp=$_POST['otp'];
$new_password=$_POST['new_password'];
$confirm_password=$_POST['confirm_password'];
$enc_password=base64_encode($confirm_password);

if($otp==$otp_generated){

    if($new_password==$confirm_password)
    {
        $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");   
        $sql->bind_param("s",$username);
        $sql->execute();
        $result=$sql->get_result();
        $row=$result->fetch_assoc();
        $ad_id=$row['ad_id'];               	
        $sql1=$conn->prepare("UPDATE admin SET ad_password=? WHERE ad_id=?");
        $sql1->bind_param("si",$enc_password,$ad_id);
        if($sql1->execute())
        {            
            echo '<script type="text/javascript">
	        alert("Password Changed Successfully!");
	        window.location="index.php";
	        </script>';  
            unset($_SESSION['otp_generated']);
            unset($_SESSION['username']);
            unset($_SESSION['contact_no']);
        }
        else
        {
            echo '<script type="text/javascript">
	        alert("Error, Try Again!");
	        window.location="index.php";
	        </script>';                
        }

    }
    else{

        echo '<script type="text/javascript">
	alert("New Password & Confirm Password Does Not Match!");
	window.location="admin_forgotpassword_otp.php";
	</script>';

    }
}
else{
    echo '<script type="text/javascript">
	alert("Invalid OTP!");
	window.location="admin_forgotpassword_otp.php";
	</script>';
}
?>