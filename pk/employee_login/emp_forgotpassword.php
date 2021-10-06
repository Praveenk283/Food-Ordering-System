<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/auth-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:16:03 GMT -->
<head>
 <title>Amino's-The Protien House | Log in</title>


<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Phoenixcoded">
<meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="Phoenixcoded">

<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="assets/css/style.css">

<link rel="stylesheet" type="text/css" href="assets/css/color/color-1.css" id="color" />
</head>
<body class="fix-menu">



<section class="login p-fixed d-flex text-center bg-primary common-img-bg">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

      <div class="login-logo">
    <a href="../index.php" style="font-size:25px;"><b>Amino's-The Protien House</b></a>
  </div>

    <?php 
include('../database_connectivity.php');   
if(isset($_POST['submit']))
{
    $contact_no=$_POST["e_contact"];
    $sql=$conn->prepare("SELECT * FROM employee WHERE e_contact=?");   
    $sql->bind_param("i",$contact_no);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
    $fullname=$row['e_name'];    
    if($result->num_rows==1)
    {
        $username=$row['e_username'];    
        $rndno=rand(1000, 9999);
        $message = "$fullname Your OTP is $rndno";
        $data=urlencode($message);
        $sms_url="http://bhashsms.com/api/sendmsg.php?user=innovics&pass=1234567890&sender=INVSIT&phone=$contact_no&text=$data&priority=ndnd&stype=normal";
        $content = file_get_contents($sms_url);
        $_SESSION['username']=$username;
        $_SESSION['contact_no']=$contact_no;
        $_SESSION['otp_generated']=$rndno;   
        echo '<script type="text/javascript">   
        window.location="emp_forgotpassword_otp.php";
        </script>';
    }
    else
    {
        echo '<script type="text/javascript">
        alert("Mobile Number Not Found");
        window.location="emp_forgotpassword.php";
        </script>';
    }  
}

?>

<div class="login-card card-block auth-body">
<form class="md-float-material" action="emp_forgotpassword.php" method="post" autocomplete="off" onsubmit="return ValidateForm()">
<!-- <div class="text-center">
<img src="assets/images/auth/logo.png" alt="logo.png">
</div> -->
<div class="auth-box">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-left">You forgot your Password? </h3>
<h3 class="text-left">Don't worry.</h3>
</div>
</div>
<p class="text-inverse b-b-default text-right">Back to <a href="index.php">Login.</a></p>
<div class="input-group">
<!-- <input type="text" class="form-control" placeholder="Your Email Address">
<span class="md-line"></span> -->

 <input type="text" class="form-control" placeholder="Enter Registered Contact Number" name="e_contact" id="e_contact">
            <span id="e_contact_error">  </span>
</div>
<div class="row">
<div class="col-md-12">
<!-- <button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset and send me a new Password</button> -->

 <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20"name="submit">SEND OTP</button>
</div>
</div>

<!-- <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Registered Contact Number" name="e_contact" id="e_contact">
            <span id="e_contact_error"></span>
      </div> -->
     


<!-- <div class="row">
<div class="col-md-10">
<p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
<p class="text-inverse text-left"><b>Your Autentification Team</b></p>
</div>
<div class="col-md-2">
<img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
</div>
</div> -->
</div>
</form>

</div>

</div>

</div>

</div>

</section>


<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->


<script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../bower_components/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<script type="text/javascript" src="../bower_components/modernizr/modernizr.js"></script>
<script type="text/javascript" src="../bower_components/modernizr/feature-detects/css-scrollbars.js"></script>

<script type="text/javascript" src="../bower_components/i18next/i18next.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../bower_components/jquery-i18next/jquery-i18next.min.js"></script>

<script type="text/javascript" src="assets/js/script.js"></script>

<script type="text/javascript" src="assets/js/common-pages.js"></script>

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
var e_contact = '';


e_contact = phoneno('e_contact', 'e_contact_error', 'Contact');

if ( e_contact == 1) 
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

<!-- Mirrored from flatable.phoenixcoded.net/default/auth-reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:16:03 GMT -->
</html>
