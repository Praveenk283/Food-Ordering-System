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
            <h1>Edit Poduct Category</h1>
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
           if(isset($_POST['pc_id']))$pc_id = $_POST['pc_id'];
           // $pc_id=$_POST['pc_id'];
           $sql=$conn->prepare("SELECT * FROM product_category WHERE pc_id=?");
          $sql->bind_param("i",$pc_id);
          $sql->execute();
          $result=$sql->get_result();
          $row=$result->fetch_assoc();
          ?>
 
            <form role="form" action="product_category_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
             <input type="hidden" name="pc_id" id="pc_id" value="<?php echo $row['pc_id'];?>">
              <div class="box-body">

            <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="pc_name" name="pc_name" class="form-control" required value="<?php echo $row['pc_name'];?>"> 
                <span id="pc_name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Image</label>
                
                <img src="photos/<?php echo $row['pc_image']; ?>" alt="NO IMAGE" width="100" height="100"><br><br>
           <input type="hidden" name="old_pc_image" id="old_pc_image" required  value="<?php echo $row['pc_image']; ?>">
               
                <input type="file" id="pc_image" name="pc_image" class="form-control" >
                <span id="pc_image_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
                <input type="text" id="pc_date" name="pc_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                <span id="pc_date_error"></span>
            </div>

           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &ensp;
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='product_category_view.php';">Cancel</button>
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
            var pc_name = '';
            var pc_image = '';
                   
            pc_name = alphabets('pc_name', 'pc_name_error', 'pc_name');

            if(document.getElementById('pc_image').value=="")
        {
          pc_image=1;
        }
      else
        {
          pc_image = imagename('pc_image', 'pc_image_error', 'pc_image');
        }

            if (pc_name == 1 && pc_image == 1) 
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




