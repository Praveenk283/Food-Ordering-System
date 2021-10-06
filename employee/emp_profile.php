<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 11:43:04 GMT -->

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

<div class="main-body user-profile">
<div class="page-wrapper">

<div class="page-header">
<div class="page-header-title">
<h4>User Profile</h4>
</div>
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index-2.html">
<i class="icofont icofont-home"></i>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">User Profile</a>
</li>
<li class="breadcrumb-item"><a href="#!">User Profile</a>
</li>
</ul>
</div>
</div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
<!--
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
-->
            <!-- /.box-header -->
            <!-- form start -->
            
    <?php
    require('database_connectivity.php');
    $e_username=$_SESSION['e_username'];
    $sql=$conn->prepare("SELECT * FROM employee WHERE e_username=?");
    $sql->bind_param("s",$e_username);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
    ?>
  
            <form role="form" action="emp_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
             <input type="hidden" name="e_id" id="e_id" value="<?php echo $row['e_id'];?>">

             
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">NAME</label>
                <input type="text" id="e_name" name="e_name" class="form-control" value="<?php echo $row['e_name'];?>">
                <span id="e_name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">ADDRESS</label>
                <textarea type="text" id="e_address" name="e_address" class="form-control"><?php echo $row['e_address'];?></textarea>
                <span id="e_address_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">CONTACT</label>
                <input type="text" id="e_contact" name="e_contact"  class="form-control" value="<?php echo $row['e_contact'];?>">
                <span id="e_contact_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">EMAIL</label>
                <input type="text" id="e_email" name="e_email"class="form-control" value="<?php echo $row['e_email'];?>">
                <span id="e_email_error"></span>
            </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='index.php';">CANCEL</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
</div>
</div>
</div>
</div>
</div>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php require("footerscript.php"); ?>
 <script type="text/javascript">
        function ValidateForm()
        {
            var e_name = '';
            var e_address = '';
            var e_contact = '';
            var e_email = '';
           
            e_name = alphabets('e_name', 'e_name_error', 'e_name');
            e_address = fieldrequired('e_address', 'e_address_error', 'e_address');
            e_contact = phoneno('e_contact', 'e_contact_error', 'e_contact No.');
            e_email = emailid('e_email', 'e_email_error', 'e_email Id');
           
            if (e_name == 1 && e_address == 1 && e_contact == 1 &&  e_email== 1) 
            {
                document.getElementById('form_error').innerHTML="";
                return true;
            }
            else
            {
                document.getElementById('form_error').innerHTML="* Fields Are Mandatory";
                return false;
            }
        }
    </script>
</body>
</html>

