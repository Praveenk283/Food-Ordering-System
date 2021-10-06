<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/ready-registration-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:06:27 GMT -->

<?php require("metatags.php"); ?>
<body>
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">
<!-- Start navbar -->
<?php require("header.php"); ?>
<!-- End navbar -->
    <div class="pcoded-main-container">
<div class="pcoded-wrapper">

<?php require("sidebar.php"); ?>

<div class="theme-loader">
<div class="ball-scale">
<div></div>
</div>
</div>


<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="page-header-title">
<h4>Enter Stock Details</h4>
</div>
<!-- <div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index-2.html">
<i class="icofont icofont-home"></i>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Ready To Use</a>
</li>
<li class="breadcrumb-item"><a href="#!">Registration Form</a>
</li>
</ul>
</div> -->
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Stock</h5>
<div class="card-header-right">
<i class="icofont icofont-rounded-down"></i>
<i class="icofont icofont-refresh"></i>
<i class="icofont icofont-close-circled"></i>
</div>
</div>
<div class="card-block">
<div class="j-wrapper j-wrapper-640">
<!--  -->

<form role="form" action="stock_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">PRODUCT</label>
                 <select name="pd_id" id="pd_id" class="form-control">

     	<option value="">SELECT</option>
          <?php
			   require('database_connectivity.php');
			   $sql=$conn->prepare("select * from product_details");
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
               
                 <span id="pd_id_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">STOCK QUANTITY</label>
                <input type="text" id="sd_qty" name="sd_qty" class="form-control" onkeyup="sum();">
                <span id="sd_qty_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">UNIT PRICE</label>
                <input type="text" id="sd_unit_price" name="sd_unit_price"  class="form-control" onkeyup="sum();">
                <span id="sd_unit_price_error"></span>
            </div>

          <div class="form-group">
                <label for="inputEmail" class="control-label">STOCK TOTAL PRICE</label>
                <input type="text" id="sd_sale_price" name="sd_sale_price" class="form-control" readonly>
                <span id="sd_sale_price_error"></span>
            </div>
              <div class="form-group">
                <label for="inputEmail" class="control-label">STOCK STATUS</label>
                <select name="sd_status" id="sd_status" class="form-control">
                    <option value="">--SELECT--</option>
                    <option value="IN STOCK">IN STOCK</option>
                    <option value="OUT OF STOCK">OUT OF STOCK</option>
                </select>
                <span id="sd_status_error"></span>
            </div>
              
              <div class="form-group">
                <label for="inputEmail" class="control-label">DATE</label>
                <input type="text" id="sd_date" name="sd_date" class="form-control" readonly value="<?php echo  date('d-m-Y'); ?>">
                <span id="sd_date_error"></span>
            </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <button type="button" class="btn btn-primary" onclick="window.location.href='stock_view.php';">Cancel</button>
              </div>
            </form>

</div>
</div>
</div>

</div>
</div>
</div>

</div>
</div>

<div id="styleSelector">
</div>
</div>
</div>
</div>
<?php require("footer.php"); ?>
</div>
</div>
</div>

<?php require("footerscript.php"); ?>

<script type="text/javascript">
     
     function sum()
     {
         var price=document.getElementById('sd_unit_price').value;
         var qty=document.getElementById('sd_qty').value;
         var total=parseFloat(price)*parseInt(qty);
         /* if both price  qty are zero total is 0*/
         if(price=="" && qty=="")
             {
                document.getElementById('sd_sale_price').value=0;  
             }
         if(!isNaN(total))
            {
               document.getElementById('sd_sale_price').value=total;
            }
     }
        function ValidateForm()
        {
            var pd_id = '';
            var sd_qty = '';
            var sd_unit_price = '';
            var sd_sale_price = '';
            var sd_status = '';
            
            pd_id = fieldrequired('pd_id', 'pd_id_error', 'PD ID');
            sd_status = fieldrequired('sd_status', 'sd_status_error', 'PD ID');
            sd_qty = numbers('sd_qty', 'sd_qty_error', 'STOCK QUANTITY');
            sd_unit_price= amountval('sd_unit_price', 'sd_unit_price_error', 'UNIT PRICE');
            sd_sale_price = numbers('sd_sale_price', 'sd_sale_price', 'STOCK TOTAL PRICE');
            
            if (pd_id == 1 && sd_status == 1 && sd_qty == 1 && sd_unit_price == 1 && sd_sale_price == 1  ) 
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

<!-- Mirrored from flatable.phoenixcoded.net/default/ready-registration-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:08:29 GMT -->
</html>
