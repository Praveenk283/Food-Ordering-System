<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:15:52 GMT -->
<head>
<title>Amino's-The Protien House| Log in</title>


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
<body class="hold-transition login-page">



<section class="login p-fixed d-flex text-center bg-primary common-img-bg">

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="login-box">
  <div class="login-logo">
    <a href="employee/index.php" style="font-size:25px;"><b>Amino's-The Protien House</b></a>
  </div>


<div class="login-card card-block auth-body">
<form action="emp_login_check.php" method="post" autocomplete="off" onsubmit="return ValidateForm()">
<!-- <div class="text-center">
<img src="assets/images/auth/logo.png" alt="logo.png">
</div> -->
<div class="auth-box">
<div class="row m-b-20">
<div class="col-md-12">
<h3 class="text-left txt-primary">Sign In</h3>
</div>
</div>
<hr />
<div class="input-group">
<input type="text" class="form-control" placeholder="USERNAME" name="e_username" id="e_username">
<span class="md-line"></span>
<!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
</div>
<!-- <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="USERNAME" name="e_username" id="e_username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div> -->

<div class="input-group">
<input type="password" class="form-control" placeholder="Password" name="e_password" id="e_password">
<span class="md-line"></span>
<!--  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
 --></div>

<!-- <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="e_password" id="e_password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
 -->
<div class="row m-t-25 text-left">
<div class="col-sm-7 col-xs-12">
<div class="checkbox-fade fade-in-primary">
<label>
<input type="checkbox" value="">
<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
<span class="text-inverse">Remember me</span>
</label>
</div>
</div>
<div class="col-sm-5 col-xs-12 forgot-phone text-right">
<a href="emp_forgotpassword.php" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
</div>
</div>
<div class="row m-t-30">
<div class="col-md-12">
<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>

<!--   <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button> -->

</div>
</div>

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

<script src="admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="admin/plugins/iCheck/icheck.min.js"></script>
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
var e_username = '';
var e_password = '';


e_username = fieldrequired('e_username', 'e_username_error', 'USERNAME');
e_password = fieldrequired('e_password', 'e_password_error', 'PASSWORD');

if ( e_username == 1 && e_password == 1) 
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

<!-- Mirrored from flatable.phoenixcoded.net/default/auth-normal-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:15:56 GMT -->
</html>
