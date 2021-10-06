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
            <h1>Edit Branch Details</h1>
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
             <?php
        require('database_connectivity.php');
         $b_id=$_POST['b_id'];
       $sql=$conn->prepare("SELECT * FROM branch WHERE b_id=?");
       $sql->bind_param("i",$b_id);
       $sql->execute();
       $result=$sql->get_result();
      $row=$result->fetch_assoc();
          ?>
  
            
            <form role="form" action="hotel_update.php" 
              method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <input type="hidden"  name="b_id" id="b_id" value="<?php echo $row['b_id']; ?>">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="b_name" name="b_name" class="form-control"  value="<?php echo $row['b_name']; ?>">
                <span id="b_name_error"></span>
            </div>
                  
                  
            <div class="form-group">
                <label for="inputEmail" class="control-label">Location</label>
                <input type="text" id="b_location" name="b_location" class="form-control" value="<?php echo $row['b_location']; ?>">
                <span id="b_location_error"></span>
            </div>      

            <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="b_contact" name="b_contact" class="form-control" value="<?php echo $row['b_contact']; ?>">
                <span id="b_contact_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                <textarea type="text" id="b_address" name="b_address"  class="form-control"><?php echo $row['b_address']; ?></textarea>
                <span id="b_address_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
                <input type="text" id="b_date" name="b_date"class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                <span id="b_date_error"></span>
            </div>

          
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &emsp;
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

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php require("5_footerscripts.php"); ?>
 <script type="text/javascript">
        function ValidateForm()
        {
            var b_name = '';
            var b_location = '';
            var b_contact = '';
            var b_address = '';
            
            b_name = alphabets('b_name', 'b_name_error', 'b_name');
            b_location = alphabets('b_location', 'b_location_error', 'b_location');
            b_contact = phoneno('b_contact', 'b_contact_error', 'b_contact');
            b_address = fieldrequired('b_address', 'b_address_error', 'b_address');
            
			if (b_name == 1 && b_locatioon == 1 && b_contact == 1 && b_address == 1 ) 
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





