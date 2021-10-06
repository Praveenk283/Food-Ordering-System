<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>amino's | Forgot Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../index.php"><b>amino's</b><br>The Protein House</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>


<?php 
include('../database_connectivity.php');   
if(isset($_POST['submit']))
{
    $contact_no=$_POST["ad_contact"];
    $sql=$conn->prepare("SELECT * FROM admin WHERE ad_contact=?");   
    $sql->bind_param("i",$contact_no);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
    $fullname=$row['ad_name'];    
    if($result->num_rows==1)
    {
        // $username=$row['ad_username'];    
        // $rndno=rand(1000, 9999);
        // $message = "$fullname Your OTP is $rndno";
        // $data=urlencode($message);
        // $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$contact_no&text=$data&priority=ndnd&stype=normal";
        // $content = file_get_contents($sms_url);
        // $_SESSION['username']=$username;
        // $_SESSION['contact_no']=$contact_no;
        // $_SESSION['otp_generated']=$rndno;   
        echo '<script type="text/javascript"> 
        window.location="admin_forgotpassword_otp.php";
        </script>';
    }
    else
    {
        echo '<script type="text/javascript">
        alert("Incorrect Phone Number!\nEnter Registered Phone No.");
        window.location="admin_forgotpassword.php";
        </script>';
    }  
}
?>


      <form action="admin_forgotpassword.php" method="post" autocomplete="off" onsubmit="return ValidateForm()">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Phone Number" name="ad_contact" id="ad_contact">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile-alt"></span>
              <span id="ad_contact_error"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request OTP</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script type="text/javascript">
function ValidateForm()
{
var ad_contact = '';

ad_contact = phoneno('ad_contact', 'ad_contact_error', 'Contact');

if ( ad_contact == 1) 
{
    return true;
}
else
{
    return false;
}
}
</script>

</body>
</html>
