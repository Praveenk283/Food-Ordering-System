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




<div class="card">
<div class="card-header">
<h5>Customer Details</h5>

<div class="card-header-right">
<i class="icofont icofont-rounded-down"></i>
<i class="icofont icofont-refresh"></i>
<i class="icofont icofont-close-circled"></i>
</div>
</div>
<div class="card-block">
<div class="dt-responsive table-responsive">
<table id="example1" class="table table-striped table-bordered nowrap table-responsive">
<thead>
<tr>
     <th>ID</th>    
     <th>NAME</th>    
     <th>CONTACT</th>
     <th>EMAIL</th>
     <th>ADDRESS</th>
     <th>USERNAME</th>
     <th>PASSWORD</th>
     <th>DATE</th>
</tr>
</thead>
<tbody>
 <?php
      require("database_connectivity.php");
      $sql=$conn->prepare("SELECT * FROM customer");
      $sql->execute();
      $result=$sql->get_result();
      $sno=1;
      while($row=$result->fetch_assoc())
      {
       ?>
       <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $row["cus_name"];?></td>
        <td><?php echo $row["cus_contact"];?></td>
        <td><?php echo $row["cus_email"];?></td>
        <td><?php echo $row["cus_address"];?></td>
        <td><?php echo $row["cus_username"];?></td>
        <td><?php echo $row["cus_password"];?></td>
        <td><?php echo $row["cus_date"];?></td>
        <!-- <td>
            <form method="post" action="customer_edit_form.php" enctype="multipart/form-data">
            <input type="hidden" name="cus_id" id="cus_id" value="<?php echo $row["cus_id"];?>">
            <input type="submit" value="EDIT" class="btn btn-sm btn-primary">
        </form> 
        
        </td>  
        <td>
             <form method="post" action="customer_delete.php" enctype="multipart/form-data">
            <input type="hidden" name="cus_id" id="cus_id" value="<?php echo $row["cus_id"];?>">
            <input type="submit" value="DELETE" class="btn btn-sm btn-danger">
        </form>   
         
            
            
        </td>   --> 
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



<div id="styleSelector">
</div>
</div>

</div>

<?php require("footer.php"); ?>
</div>
</div>
</div>



<?php require("footerscript.php"); ?>

<!-- <script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="../bower_components/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<script type="text/javascript" src="../bower_components/modernizr/modernizr.js"></script>
<script type="text/javascript" src="../bower_components/modernizr/feature-detects/css-scrollbars.js"></script>

<script type="text/javascript" src="../bower_components/classie/classie.js"></script>

<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/pages/data-table/js/jszip.min.js"></script>
<script src="assets/pages/data-table/js/pdfmake.min.js"></script>
<script src="assets/pages/data-table/js/vfs_fonts.js"></script>
<script src="assets/pages/data-table/extensions/select/js/dataTables.select.min.js"></script>
<script src="../bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript" src="../bower_components/i18next/i18next.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../bower_components/jquery-i18next/jquery-i18next.min.js"></script>

<script src="assets/pages/data-table/extensions/select/js/select-custom.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/jquery.mousewheel.min.js"></script>
 -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  </script>

  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</body>

<!-- Mirrored from flatable.phoenixcoded.net/default/dt-ext-select.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:13:04 GMT -->
</html>
