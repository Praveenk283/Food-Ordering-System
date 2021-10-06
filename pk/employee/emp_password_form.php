<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/ready-registration-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:06:27 GMT -->

<?php require("metatags.php"); ?>
<body>
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<!-- Start navbar -->
<?php require("header.php"); ?>
<!-- End navbar -->
    <div class="pcoded-main-container">
<div class="pcoded-wrapper">

<?php require("sidebar.php"); ?>

<div class="theme-loader">
<div class="ball-scale">
<div></div>
</div>
</div>


<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="page-header-title">
<h4>Change Password</h4>

</div>
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index-2.html">
<i class="icofont icofont-home"></i>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Ready To Use</a>
</li>
<li class="breadcrumb-item"><a href="#!">Registration Form</a>
</li>
</ul>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Change Password</h5>
<div class="card-header-right">
<i class="icofont icofont-rounded-down"></i>
<i class="icofont icofont-refresh"></i>
<i class="icofont icofont-close-circled"></i>
</div>
</div>
<div class="card-block">
<div class="j-wrapper j-wrapper-640">
<form role="form"  method="post" class="j-pro" id="j-pro" novalidate  action="emp_password_update.php" enctype="multipart/form-data" onsubmit="return ValidateForm()">
<div class="j-content">

<div class="form-group">
<label class="j-label" for="inputName1">OLD PASSWORD</label>
<!-- <div class="j-unit">
<div class="j-input">
<label class="j-icon-right" for="name">
<i class="icofont icofont-ui-user"></i>
</label> -->

<input type="password" id="old_password" name="old_password" class="form-control">
                <span id="old_password_error"></span>
<!-- </div>
</div> -->
</div>


<div class="form-group">

<label  for="inputEmail" class="j-label">NEW PASSWORD</label>

<!-- <div class="j-unit">
<div class="j-input">
<label class="j-icon-right" for="email">
<i class="icofont icofont-envelope"></i>
</label> -->
<input type="password" id="new_password" name="new_password" class="form-control">
                <span id="new_password_error"></span>
<!-- </div>
</div> -->
</div>


<div class="form-group">

<label for="inputEmail" class="j-label ">CONFIRM PASSWORD</label>

<!-- <div class="j-unit">
<div class="j-input">
<label class="j-icon-right" for="login">
<i class="icofont icofont-ui-check"></i>
</label>
 --><input type="password" id="confirm_password" name="confirm_password"  class="form-control">
                <span id="confirm_password_error"></span>
<!-- </div>
</div> -->
</div>


<!-- <div>
<div>
<label class="j-label ">Password</label>
</div>
<div class="j-unit">
<div class="j-input">
<label class="j-icon-right" for="password">
<i class="icofont icofont-lock"></i>
</label>
<input type="password" id="password" name="password">
</div>
</div>
</div> -->


<div class="j-response"></div>

</div>

<div class="j-footer">
<!-- <button type="submit" class="btn btn-primary">Register</button> -->

<!-- <span id="form_error" style="color:#ff3a00;"></span> <br> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='index.php';">CANCEL</button>
</div>

</form>
</div>
</div>
</div>

</div>
</div>
</div>

</div>
</div>

<div id="styleSelector">
</div>
</div>
</div>

</div>

<?php require("footer.php"); ?>
</div>
</div>
</div>



<?php require("footerscript.php"); ?>

</body>

<!-- Mirrored from flatable.phoenixcoded.net/default/ready-registration-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:08:29 GMT -->
</html>
