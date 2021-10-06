<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from flatable.phoenixcoded.net/default/dt-ext-select.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:12:54 GMT -->

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

<!-- <div class="page-header">
<div class="page-header-title">
<h4>Select Datatable</h4>
<span>Selection capabilities to a DataTable</span>
</div>
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="index-2.html">
<i class="icofont icofont-home"></i>
</a>
</li>
<li class="breadcrumb-item"><a href="#!">Data Table Extensions</a>
</li>
<li class="breadcrumb-item"><a href="#!">Select Table</a>
</li>
</ul>
</div>
</div> -->


<div class="page-body">

<div class="card">
<div class="card-header">
<h5>Product Category</h5>

<div class="card-header-right">
<i class="icofont icofont-rounded-down"></i>
<i class="icofont icofont-refresh"></i>
<i class="icofont icofont-close-circled"></i>
</div>
</div>
<div class="card-block">
<div class="dt-responsive table-responsive">
<table id="single-select" class="table table-striped table-bordered nowrap">
<thead>
<tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Date</th>
                 <!--  <th>Edit</th>
                  <th>Delete</th> -->
                </tr>
</thead>
<tbody>
<?PHP
  require("database_connectivity.php");
      $sql=$conn->prepare("SELECT * FROM product_category");
      $sql->execute();
      $result=$sql->get_result();
      $sno=1;
      while($row=$result->fetch_assoc())
    {
?>
  <tr>
    <td><?php echo $sno++;?></td>
    <td><?php echo $row["pc_name"];?></td>
    <td><?php echo $row["pc_date"];?></td>
        
    <!--        
        <img src="photos/<?php //echo $row["pd_image1"];?>" alt="" height="100" width="100"></td>  
        
          <td> 
        <img src="photos/<?php // echo $row["pd_image2"];?>"alt=""
        height="100" width="100"></td>  
    -->
  
    <!-- <td>
      <form method="post" action="product_category_edit_form.php" enctype="multipart/form-data">
            <input type="hidden" name="pc_id" id="pc_id" value="<?php echo $row["pc_id"];?>">
            <input type="submit" value="Edit"  class="btn btn-block bg-gradient-primary btn-sm">
      </form>
    </td>   

    <td>
      <form method="post" action="product_category_delete.php" enctype="multipart/form-data">
            <input type="hidden" name="pc_id" id="pc_id" value="<?php echo $row["pc_id"];?>">
            <input type="submit" value="Delete"  class="btn btn-block bg-gradient-danger btn-sm">  
      </form>   
    </td>   --> 
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

<!-- Mirrored from flatable.phoenixcoded.net/default/dt-ext-select.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:13:04 GMT -->
</html>
