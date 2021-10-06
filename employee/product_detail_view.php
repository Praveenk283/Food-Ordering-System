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
<h4>Product List</h4>
</div>
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index-2.html">
<i class="icofont icofont-home"></i>
</a>
</li>
<!-- <li class="breadcrumb-item"><a href="#!">E-Commerce</a>
</li>
<li class="breadcrumb-item"><a href="#!">Product List</a>
</li> -->
</ul>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Product Details</h5>
<!-- <button type="button" class="btn btn-primary waves-effect waves-light f-right d-inline-block md-trigger" data-modal="modal-13"> <i class="icofont icofont-plus m-r-5"></i> Add Product
</button> -->
</div>
<div class="card-block">
<div class="table-responsive">
<div class="table-content">
<div class="project-table">
<table id="e-product-list" class="table table-striped dt-responsive nowrap">
<thead>
  <tr>
                  <th>ID</th>
                  <th>Product Category</th>
                  <th>Product Sub Category</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Date</th>
                <!--   <th>Edit</th>
                  <th>Delete</th> -->
                </tr>
</thead>
<tbody>
<?PHP
  require("database_connectivity.php");
       $sql=$conn->prepare("SELECT * FROM product_category,product_sub_category,product_details where product_details.pc_id=product_category.pc_id AND product_details.psc_id=product_sub_category.psc_id");
      $sql->execute();
      $result=$sql->get_result();    
        $sno=1;
      while($row=$result->fetch_assoc())
    {
?>
  <tr>
    <td><?php echo $sno++;?></td>
    <td><?php echo $row["pc_name"];?></td>
    <td> <?php echo $row["psc_name"]; ?> </td>  
    <td><?php echo $row["pd_name"];?></td>    
    <td><?php echo $row["pd_description"];?></td>
    <td><?php echo $row["pd_price"];?></td>
    <td><img src="photos/<?php echo $row["pd_image1"];?>" alt="" height="100" width="100"></td>
    <td><?php echo $row["pd_date"];?></td>
        
    <!--        
        <img src="photos/<?php //echo $row["pd_image1"];?>" alt="" height="100" width="100"></td>  
        
          <td> 
        <img src="photos/<?php // echo $row["pd_image2"];?>"alt=""
        height="100" width="100"></td>  
    -->
  
    <!-- <td>
      <form method="post" action="product_details_edit_form.php" enctype="multipart/form-data">
            <input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row["pd_id"];?>">
            <input type="submit" value="Edit" class="btn btn-block bg-gradient-primary btn-sm">
      </form>
    </td>   

    <td>
      <form method="post" action="product_details_delete.php" enctype="multipart/form-data">
            <input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row["pd_id"];?>">
            <input type="submit" value="Delete" class="btn btn-block bg-gradient-danger btn-sm">  
      </form>   
    </td>  -->  
    </tr> 
    
<?php
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


<div class="md-overlay"></div>

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
