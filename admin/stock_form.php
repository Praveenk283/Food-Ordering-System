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
            <h1>Add Stock Details</h1>
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
            <form role="form" action="stock_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">

              <div class="form-group">
                <label for="inputName1" class="control-label">Product</label>
                   <select name="pd_id" id="pd_id" class="form-control" >
              <option value="">--Select--</option>
            <?php
         require('database_connectivity.php');
         $sql=$conn->prepare("SELECT * from product_details");
         $sql->execute();
         $result=$sql->get_result();
         while($row=$result->fetch_assoc())
         {
        ?>
           <option value="<?php echo $row["pd_id"]; ?>">
           <?php echo $row["pd_name"]; ?>
           </option>
        <?php  
         }
         ?>
           </select>
                <span id="pd_id_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Unit Price</label>
                 <input type="number" id="sd_unit_price" name="sd_unit_price"  value="<?php echo $row1['pd_price']; ?>" class="form-control" onkeyup="sum();" >
                <span id="sd_unit_price_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Stock Quantity</label>
                 <input type="number" id="sd_qty" name="sd_qty" class="form-control" >
                <span id="sd_qty_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Discount Percentage</label>
                 <input type="number" id="sd_discount" name="sd_discount" class="form-control"  onkeyup="sum();">
                <span id="sd_discount_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Discount Price</label>
                 <input type="number" id="sd_discount_price" name="sd_discount_price" class="form-control" readonly>
                <span id="sd_discount_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Sale Price</label>
                 <input type="number" id="sd_sale_price" name="sd_sale_price" class="form-control" readonly>
                <span id="sd_sale_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Availability</label>
                <select name="sd_status" id="sd_status" class="form-control" >
                    <option value="">--Select--</option>
                    <option value="Available">Available</option>
                    <option value="Currently Unavailable">Currently Unavailable</option>
                </select>
                <span id="sd_status_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="sd_date" name="sd_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                
            </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                &ensp;
                <button type="button" class="btn btn-primary" onclick="window.location.href='stock_view.php';">Cancel</button>
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
function sum()
     {
         var unit_price=Number(document.getElementById('sd_unit_price').value);
         var discount=Number(document.getElementById('sd_discount').value);

         var rate=discount/100;
         var discount_price=rate*unit_price;
         var sale_price=unit_price-discount_price;

         if(discount=="")
             {
                document.getElementById('sd_discount_price').value = 0;
                document.getElementById('sd_sale_price').value = unit_price;    
             }

         if(!isNaN(discount_price))
            {
               document.getElementById('sd_discount_price').value = discount_price.toFixed(2);
            }

         if(!isNaN(sale_price))
            {
               document.getElementById('sd_sale_price').value = sale_price.toFixed(2);
            }
     }
        function ValidateForm()
        {
            var pd_id = document.getElementById('pd_id').value;
            var sd_qty = document.getElementById('sd_qty').value;
            var sd_unit_price = document.getElementById('sd_unit_price').value;
            var sd_discount = document.getElementById('sd_discount').value;
            var sd_discount_price = document.getElementById('sd_discount_price').value;
            var sd_sale_price = document.getElementById('sd_sale_price').value;
            var sd_status = document.getElementById('sd_status').value;
           
          



            if(pd_id =="" ){

          document.getElementById('pd_id_error').innerHTML = "  Please Select The  Option ";
          return false;

         
            }
               if(sd_unit_price =="" ){

          document.getElementById('sd_unit_price_error').innerHTML = "  Please Enter The Unit Price  ";
          return false;
          }
               if(sd_qty =="" ){

          document.getElementById('sd_qty_error').innerHTML = " Please Enter Stock Quantity ";
          return false;
          }
            
            if(sd_discount =="" ){

          document.getElementById('sd_discount_error').innerHTML = "  Please Enter Discount ";
          return false;
          }
          //  if(sd_discount_price =="" ){

          // document.getElementById('sd_discount_price_error').innerHTML = "  Please Enter Product Price ";
          // return false;
          // }
          // if(sd_sale_price =="" ){

          // document.getElementById('sd_sale_price_error').innerHTML = "  Please Upload Image ";
          // return false;
          // }

            if(sd_status =="" ){

          document.getElementById('sd_status_error').innerHTML = "  Please Select The  Option  ";
          return false;
          }
        }
   
        
    </script>
</body>
</html>