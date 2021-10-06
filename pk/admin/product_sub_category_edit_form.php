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
            <h1>Edit Product Sub Category</h1>
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
           $psc_id=$_POST['psc_id'];
           $sql=$conn->prepare("SELECT * FROM product_sub_category WHERE psc_id=?");
          $sql->bind_param("i",$psc_id);
          $sql->execute();
          $result=$sql->get_result();
          $row=$result->fetch_assoc();
          ?>
 
            <form role="form" action="product_sub_category_update.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
             <input type="hidden" name="psc_id" id="psc_id" value="<?php echo $row['psc_id'];?>">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="psc_name" name="psc_name" class="form-control" required value="<?php echo $row['psc_name'];?>"> 
                <span id="psc_name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
                <input type="text" id="psc_date" name="psc_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                <span id="psc_date_error"></span>
            </div>

           
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &ensp;
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='product_sub_category_view.php';">Cancel</button>
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
            var psc_name = '';
                   
            psc_name = alphabets('psc_name', 'psc_name_error', 'psc_name');
            if (psc_name == 1 ) 
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




