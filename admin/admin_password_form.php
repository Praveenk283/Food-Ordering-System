<!DOCTYPE html>
<html>

<?php require("1_metatags.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php require("2_header.php"); ?>
<?php require("3_sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="admin_password_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Old Password</label>
                <input type="password" id="old_password" name="old_password" class="form-control">
                <span id="old_password_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control">
                <span id="new_password_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password"  class="form-control">
                <span id="confirm_password_error" class="text-danger font-weight-bold"></span>
            </div>

            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &ensp;
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='index.php';">Cancel</button>
              </div>
            </form>
            <br>
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

  <?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts.php"); ?>

<script type="text/javascript">
        function ValidateForm()
        {
            var old_password = document.getElementById('old_password').value;
            var new_password = document.getElementById('new_password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            
             if(old_password =="" ){

          document.getElementById('old_password_error').innerHTML = "  Please Enter Old Password ";
          return false;
       
            }
             if(new_password =="" ){

          document.getElementById('new_password_error').innerHTML = "  Please Enter New Password ";
          return false;
       
            }
             if(confirm_password =="" ){

          document.getElementById('confirm_password_error').innerHTML = "  Please Enter Confirm Password ";
          return false;
       
            }
        }
    </script>

