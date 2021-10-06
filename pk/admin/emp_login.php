<?php
require('db_connection.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['Email'])){
        // removes backslashes
 $email = stripslashes($_REQUEST['Email']);
        //escapes special characters in a string
 $email = mysqli_real_escape_string($conn,$email);
 $password = stripslashes($_REQUEST['Password']);
 $password = mysqli_real_escape_string($conn,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `employee` WHERE emp_email='$email'
and emp_password='$password'";
 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['emp_email'] = $email;
            // Redirect user to index.php
        echo "<script type='text/javascript'>
      alert('Login Successfull!');
       window.location='mainPage.html';
       </script>";
         }else{
 echo "<script type='text/javascript'>
      alert('Error!');
       window.location='emplogin.html';
       </script>";}
    }
?>
