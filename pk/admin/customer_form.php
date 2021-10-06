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
            <h1>Add Customer</h1>
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
            <form role="form" action="customer_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="cus_fname" name="cus_fname" class="form-control">
                <span id="cus_name_error"></span>
            </div>
            
            <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">lastName</label>
                <input type="text" id="cus_lname" name="cus_lname" class="form-control">
                <span id="cus_name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="cus_contact" name="cus_contact" class="form-control">
                <span id="cus_contact_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                <textarea type="text" id="cus_address" name="cus_address" class="form-control"></textarea>
                <span id="cus_address_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="cus_email" name="cus_email"  class="form-control">
                <span id="cus_email_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Username</label>
               <input type="text" id="cus_username" name="cus_username" class="form-control">
                <span id="cus_username_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Password</label>
                <input type="text" id="cus_password" name="cus_password" class="form-control">
                <span id="cus_password_error"></span>
            </div>
            
            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="cus_date" name="cus_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                
            </div>
            

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &ensp;  
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='VIEW.php';">Cancel</button>
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
            var cus_name = '';
            var cus_contact = '';
            var cus_email = '';
            var cus_address = '';
            var cus_username = '';
            var cus_password = '';
           
            cus_name = alphabets('cus_name', 'cus_name_error', 'Name');
             cus_contact=  phoneno('cus_contact', 'cus_contact_error', ' Contact');
             cus_email = emailid('cus_email', 'cus_email_error', 'Email');
            cus_address = fieldrequired('cus_address', 'cus_address_error', 'Address');
            cus_username = fieldrequired('cus_username', 'cus_username_error', 'Username');
            cus_password = pasword('cus_password', 'cus_password_error', 'Password');
			
        if (cus_name == 1 && cus_contact == 1 && cus_email == 1 && ecus_address == 1 && cus_username == 1 && cus_password == 1) 
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

