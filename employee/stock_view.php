<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:19:14 GMT -->

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
<h4>Stocks</h4>
</div>
<!-- <div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index-2.html">
<i class="icofont icofont-home"></i>
</a>
</li>

</ul>
</div> -->
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Product List</h5>
<button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13" onclick="window.location.href='stock_form.php'; "> <i class="icofont icofont-plus m-r-5"></i> NEW</button>
</div>
<div class="card-block">
<div class="table-responsive">
<div class="table-content">
<div class="project-table">
<table id="e-product-list" class="table table-striped dt-responsive nowrap">
<thead>
<tr>
                  <th>SL.NO</th>
                <th>PRODUCT NAME</th>
                <th>QTY</th>
<!--                <th>DISCOUNT</th>-->
                <th>UNIT PRICE</th>
                <th>TOTAL</th>
                <th>EDIT</th>
                <th>DELETE</th>
                </tr>
</thead>
<tbody>
 <?php
      require("database_connectivity.php");
      $sql=$conn->prepare("SELECT * FROM stock_details ,product_details WHERE stock_details.pd_id=product_details.pd_id ");
      $sql->execute();
      $result=$sql->get_result();
      $sno=1;
      while($row=$result->fetch_assoc())
      {
       ?>
                <tr>
                    <td>
                        <?php echo $sno++;?>
                    </td>
        
                    <td>
                        <?php echo $row["pd_name"];?>
                    </td>
                    <td>
                        <?php echo $row["sd_qty"];?>
                    </td> 
<!--
                       <td>
                        <?php// echo $row["sd_discount"];?>
                    </td>
-->
                    <td>
                        <?php echo $row["sd_unit_price"];?>
                    </td>
                    <td>
                        <?php echo $row["sd_sale_price"];?>
                    </td>
                    <td> 
                     <form method="post" action="stock_ed_form.php" enctype="multipart/form-data">
            <input type="hidden" name="sd_id" id="sd_id" value="<?php echo $row["sd_id"];?>">
            <input type="submit" value="EDIT" class="btn btn-sm btn-primary">
        </form>
                   </td>
                    <td>
                         <form method="post" action="stock_delete.php" enctype="multipart/form-data">
            <input type="hidden" name="sd_id" id="sd_id" value="<?php echo $row["sd_id"];?>">
            <input type="submit" value="DELETE" class="btn btn-sm btn-danger">
        
        </form>   
         
                        
                        
                    </td>
                </tr>
                <?PHP
     }
      ?>
</tbody>
</table>
</div>
</div>
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
</body>

<!-- Mirrored from flatable.phoenixcoded.net/default/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:19:36 GMT -->
</html>
