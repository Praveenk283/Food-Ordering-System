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
            <h1>Edit Employee Details</h1>
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
       if(isset($_POST['e_id']))$e_id = $_POST['e_id'];
       // $e_id=$_POST['e_id'];
      $sql=$conn->prepare("SELECT * FROM employee WHERE e_id=?");
       $sql->bind_param("i",$e_id);
       $sql->execute();
       $result=$sql->get_result();
      $row=$result->fetch_assoc();
      ?>
    <form role="form" action="emp_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
             <input type="hidden" name="e_id" id="e_id"  value="<?php echo $row['e_id']; ?>">
        
        <div class="form-group">
                <label for="inputName1" class="control-label">Branch</label>
                   <select name="b_id" id="b_id" class="form-control" required>
           	<option value="">--Select--</option>
           	<?php
			   require('database_connectivity.php');
			   $sql1=$conn->prepare("select * from branch");
			   $sql1->execute();
			   $result1=$sql1->get_result();
			   while($row1=$result1->fetch_assoc())
			   {
				?>
				   <option value="<?php echo $row1["b_id"]; ?>">
				   <?php echo $row1["b_name"];?>
				   </option>
			<?php  
			   }
			   ?>
           </select>
                <span id="b_id_error"></span>
            </div>
             
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="e_name" name="e_name" class="form-control" required value="<?php echo $row['e_name']; ?>">
                <span id="e_name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="e_contact" name="e_contact" class="form-control" required value="<?php echo $row['e_contact']; ?>">
                <span id="e_contact_error"></span>
            </div>
                  
             <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                <textarea type="text" id="e_address" name="e_address" class="form-control" required value="
                    <?php echo $row['e_address']; ?> "></textarea>
                <span id="e_address_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="e_email" name="e_email"  class="form-control" required value="<?php echo $row['e_email']; ?>">
                <span id="e_email_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Username</label>
               <input type="text" id="e_username" name="e_username" class="form-control"value="<?php echo $row['e_username']; ?>">
                <span id="e_username_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Password</label>
                <input type="text" id="e_password" name="e_password" class="form-control" required value="<?php echo $row['e_password']; ?>">
                <span id="e_password_error"></span>
            </div>
            
            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="e_date" name="e_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
            </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &ensp;
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='emp_view.php';">Cancel</button>
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
            var b_id= '';
            var e_name = '';
            var e_contact = '';
            var e_address = '';
            var e_email = '';
            var e_username = '';
            var e_password = '';
           
            b_id = fieldrequired('b_id', 'b_id_error', 'b_id');
            e_name = alphabets('e_name', 'e_name_error', 'e_name');
             e_contact=  phoneno('e_contact', 'e_contact_error', 'e_contact');
             e_address = fieldrequired('e_address', 'e_address_error', 'e_address');
            e_email = emailid('e_email', 'e_email_error', 'e_email Id');
            e_username = fieldrequired('e_username', 'e_username_error', 'e_Username');
            e_password = pasword('e_password', 'e_password_error', 'e_Password');
			
        if (b_id == 1 && e_name == 1 && e_contact == 1 && e_address == 1 && e_email == 1 && e_username == 1 && e_password == 1) 
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














