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
            <h1>Table</h1>
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
            <form role="form" action="form_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="name" name="name" class="form-control">
                <span id="name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                <textarea type="text" id="address" name="address" class="form-control"></textarea>
                <span id="address_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="contact" name="contact"  class="form-control">
                <span id="contact_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="email" name="email"class="form-control">
                <span id="email_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Image</label>
                <input type="file" id="image" name="image" class="form-control">
                <span id="image_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Username</label>

                <input type="text" id="username" name="username" class="form-control">
                <span id="username_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Password</label>

                <input type="text" id="password" name="password" class="form-control">
                <span id="password_error"></span>
            </div>
            <div class="form-group item">
                <label for="inputEmail" class="control-label">Gender</label>

                <select name="gender" id="gender" class="form-control">
                    <option value="">--select--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <span id="gender_error"></span>
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
            var fullname = '';
            var address = '';
            var contact = '';
            var email = '';
            var image = '';
            var username = '';
            var password = '';
            var gender = '';

            fullname = alphabets('name', 'name_error', 'Name');
            address = fieldrequired('address', 'address_error', 'Address');
            contact = phoneno('contact', 'contact_error', 'Contact No.');
            email = emailid('email', 'email_error', 'Email Id');
            image = imagename('image', 'image_error', 'Image');
            username = fieldrequired('username', 'username_error', 'Username');
            password = pasword('password', 'password_error', 'Password');
            gender = fieldrequired('gender', 'gender_error', 'Gender');

            if (fullname == 1 && address == 1 && contact == 1 && email == 1 && image == 1 && username == 1 && password == 1 && gender == 1 ) 
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
