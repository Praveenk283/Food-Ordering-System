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
            <h1>Add Branch</h1>
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
            <form role="form" action="hotel_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="b_name" name="b_name" class="form-control">
                <span id="b_name_error" class="text-danger font-weight-bold "></span>
            </div>
                  
            <div class="form-group">
                <label for="inputEmail" class="control-label">Location</label>
                <input type="text" id="b_location" name="b_location" class="form-control">
                <span id="b_location_error" class="text-danger font-weight-bold "></span>
            </div>
                  
                <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="Number" id="b_contact" name="b_contact" class="form-control">
                <span id="b_contact_error" class="text-danger font-weight-bold "></span>
            </div>  
                  
             <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
				<textarea type="text" id="b_address" name="b_address"  class="form-control"></textarea>
                <span id="b_address_error" class="text-danger font-weight-bold "></span>
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
                &ensp;
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='hotel_view.php';">Cancel</button>
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
            var b_name =document.getElementById('b_name').value;
            var b_location = document.getElementById('b_location').value;
            var b_contact = document.getElementById('b_contact').value;
            var b_address = document.getElementById('b_address').value;
            
             if(b_name =="" ){

          document.getElementById('b_name_error').innerHTML = "  Please Enter The Branch Name ";
          return false;
         
            }
              if(b_location =="" ){

          document.getElementById('b_location_error').innerHTML = "  Please Enter The Branch Location ";
          return false;
         
            }
             if(b_contact =="" ){

          document.getElementById('b_contact_error').innerHTML = "  Please Enter The Branch Contact No ";
          return false;
         
            }
             if(b_address =="" ){

          document.getElementById('b_address_error').innerHTML = "  Please Enter The Branch Address ";
          return false;
         
            }
           
        }
    </script>
</body>
</html>




