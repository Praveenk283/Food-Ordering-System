<!DOCTYPE html>
<html>

<?php
session_start();
?>

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
            <h1>Admin Profile</h1>
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
            
    <?php
    require('database_connectivity.php');
    $ad_username=$_SESSION['admin_username'];
    $sql=$conn->prepare("SELECT * FROM admin WHERE ad_username=?");
    $sql->bind_param("s",$ad_username);
    $sql->execute();
    $result=$sql->get_result();
    $row=$result->fetch_assoc();
    ?>
  
            <form role="form" action="admin_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
             <input type="hidden" name="ad_id" id="ad_id" value="<?php echo $row['ad_id'];?>">

             
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="ad_name" name="ad_name" class="form-control" value="<?php echo $row['ad_name'];?>">
                <span id="ad_name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="ad_contact" name="ad_contact"  class="form-control" value="<?php echo $row['ad_contact'];?>">
                <span id="ad_contact_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                <textarea type="text" id="ad_address" name="ad_address" class="form-control"><?php echo $row['ad_address'];?></textarea>
                <span id="ad_address_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="ad_email" name="ad_email"class="form-control" value="<?php echo $row['ad_email'];?>">
                <span id="ad_email_error"></span>
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
  <!-- /.content-wrapper -->

  <?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts.php"); ?>

 <script type="text/javascript">
        function ValidateForm()
        {
            var ad_name = '';
            var ad_address = '';
            var ad_contact = '';
            var ad_email = '';
           
            ad_name = alphabets('ad_name', 'ad_name_error', 'ad_name');
            ad_address = fieldrequired('ad_address', 'ad_address_error', 'ad_address');
            ad_contact = phoneno('ad_contact', 'ad_contact_error', 'ad_contact No.');
            ad_email = emailid('ad_email', 'ad_email_error', 'ad_email Id');
           
            if (ad_name == 1 && ad_address == 1 && ad_contact == 1 &&  ad_email== 1) 
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

