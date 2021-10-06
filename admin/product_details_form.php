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
            <h1>Add Product</h1>
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
            <form role="form" action="product_details_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Product Category</label>
                   <select name="pc_id" id="pc_id" class="form-control" >
           	<option value="">--Select--</option>
           	<?php
			   require('database_connectivity.php');
			   $sql1=$conn->prepare("select * from product_category");
			   $sql1->execute();
			   $result1=$sql1->get_result();
			   while($row1=$result1->fetch_assoc())
			   {
				?>
				   <option value="<?php echo $row1["pc_id"]; ?>">
				   <?php echo $row1["pc_name"];?>
				   </option>
			<?php  
			   }
			   ?>
           </select>
                <span id="pc_id_error" class="text-danger font-weight-bold"></span>
            </div>
              
                  
            <div class="form-group" >
                <label for="inputName1" class="control-label" >Product Sub Category</label>
                   <select name="psc_id" id="psc_id" class="form-control" >
           	<option value="">--Select--</option>
           	<?php
			   require('database_connectivity.php');
			   $sql1=$conn->prepare("select * from product_sub_category");
			   $sql1->execute();
			   $result1=$sql1->get_result();
			   while($row1=$result1->fetch_assoc())
			   {
				?>
				   <option value="<?php echo $row1["psc_id"]; ?>" >
				   <?php echo $row1["psc_name"];?>
				   </option>
			<?php  
			   }
			   ?>
           </select>
                <span id="psc_id_error" class="text-danger font-weight-bold"></span>
            </div>
                  

            <div class="form-group">
                <label for="inputEmail" class="control-label">Name</label>
                 <input type="text" id="pd_name" name="pd_name" class="form-control" >
                <span id="pd_name_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Description</label>
                <textarea type="text" id="pd_description" name="pd_description"  class="form-control" ></textarea>
                <span id="pd_description_error" class="text-danger font-weight-bold"></span>
            </div>
                  
            <div class="form-group">
                <label for="inputEmail" class="control-label">Price</label>
                 <input type="number" id="pd_price" name="pd_price" class="form-control" >
                <span id="pd_price_error" class="text-danger font-weight-bold"></span>
            </div>      

            
            <div class="form-group">
                <label for="inputEmail" class="control-label">Image</label>
                <input type="file" id="pd_image1" name="pd_image1" class="form-control" >
                <span id="pd_image1_error" class="text-danger font-weight-bold"></span>
            </div>
    <!--        <div class="form-group">
                <label for="inputEmail" class="control-label">IMAGE</label>
                <input type="file" id="pd_image2" name="pd_image2" class="form-control">
                <span id="pd_image2_error"></span>
            </div>
    -->

              <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="pd_date" name="pd_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                
            </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                &ensp;
                <button type="button" class="btn btn-primary" onclick="window.location.href='product_details_view.php';">Cancel</button>
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

<?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts.php"); ?>

 <script type="text/javascript">
        function ValidateForm()
        {
            var pc_id = document.getElementById('pc_id').value;
            var psc_id =  document.getElementById('psc_id').value;
            var pd_name =  document.getElementById('pd_name').value;
            var pd_description = document.getElementById('pd_description').value;
            var pd_price =  document.getElementById('pd_price').value;
            var pd_image1 =  document.getElementById('pd_image1').value;



            if(pc_id =="" ){

          document.getElementById('pc_id_error').innerHTML = "  Please Select The  Option ";
          return false;

         
            }
              
               if(psc_id =="" ){

          document.getElementById('psc_id_error').innerHTML = "  Please Select The  Option ";
          return false;
          }
             if(pd_name =="" ){

          document.getElementById('pd_name_error').innerHTML = "  Please Enter Product Name ";
          return false;
          }
            if(pd_description =="" ){

          document.getElementById('pd_description_error').innerHTML = "  Please Enter Product Description ";
          return false;
          }
           if(pd_price =="" ){

          document.getElementById('pd_price_error').innerHTML = "  Please Enter Product Price ";
          return false;
          }
          if(pd_image1 =="" ){

          document.getElementById('pd_image1_error').innerHTML = "  Please Upload Image ";
          return false;
          }

        }
    </script>
</body>
</html>