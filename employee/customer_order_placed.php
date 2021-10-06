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
<h5>Customer orders</h5>

<div class="card-header-right">
<i class="icofont icofont-rounded-down"></i>
<i class="icofont icofont-refresh"></i>
<i class="icofont icofont-close-circled"></i>
</div>
</div>
<div class="card-block">
<div class="dt-responsive table-responsive">
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Order Date</th>
                        <th>Amount <br>Order No. <br>Payment Mode</th>
                        <th>Order Status</th>
                        <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php
           require("database_connectivity.php");
           $sql=$conn->prepare("SELECT * FROM customer_invoice,customer WHERE customer_invoice.cus_id=customer.cus_id ORDER BY customer_invoice.ci_id DESC");
           $sql->execute();
           $result=$sql->get_result();
           $sno=1;
           while($row=$result->fetch_assoc()){
           ?>
                <tr>
                    <td><?php echo $sno++;//$row['ad_id'];?> </td>
                    <td><?php echo $row['cus_name']?></td>
                    <td><?php echo $row['ci_date'];?></td>
                    <td><b>AMT : </b><?php echo $row['ci_total_price'];?><br><br><b>ORD NO : </b><?php echo $row['ci_order_no'];?><br><br>
                        <?php if($row['ci_payment_mode'] == "COD")
                               {    ?>
                           <b><?php echo $row['ci_payment_mode'];?></b>
                          <?php }
                                else
                                { ?>
                            <b><?php echo $row['ci_payment_mode'];?></b><br>
                                    <?php echo $row['ci_transaction_no'];?>
                           <?php } ?>
                    </td>                      
                    <td><?php if($row['ci_status'] == 'ORDER PENDING'){
               ?>
               <button class="btn btn-sm btn-danger" style="width:100%;">PENDING</button> <br><br>
               <form action="customer_order_confirm.php" method="post">
           <input type="hidden" name="ci_total_price" value="<?php echo $row['ci_total_price']?>">
           <input type="hidden" name="ci_id" value="<?php echo $row['ci_id']?>">
           <input type="hidden" name="cd_id" value="<?php echo $row['cus_id']?>">
            <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
            <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
               <button type="submit" class="btn btn-sm btn-success" style="width:100%;">CONFIRM</button>
               </form>
           <?php }?>
                   <?php if($row['ci_status'] == 'ORDER CONFIRMED'){
               ?>
               <button class="btn btn-sm btn-success" style="width:100%;">CONFIRMED</button> <br><br>
               <form action="customer_order_deliver.php" method="post">
           <input type="hidden" name="ci_id" value="<?php echo $row['ci_id']?>">
           <input type="hidden" name="cd_id" value="<?php echo $row['cus_id']?>">
            <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
            <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
               <button type="submit" class="btn btn-sm btn-warning" style="width:100%;">DELIVERED</button>
               </form>
           <?php }?>
                  
                  <?php if($row['ci_status'] == 'ORDER DELIVERED'){
               ?>
               <button class="btn btn-sm btn-success" style="width:100%;">DELIVERED</button> <br><br>
           <?php }?>
                  <?php if($row['ci_status'] == 'ORDER CANCELLED'){
               ?>
               <button class="btn btn-sm btn-danger" style="width:100%;">CANCELLED</button> <br><br>
           <?php }?>
                   
                   </td>                   
                    <td>
                    <form action="customer_order_details.php" method="post">
                    <input type="hidden" name="cd_id" value="<?php echo $row['cus_id']?>">
                    <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
                    <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
                    <button type="submit" class="btn btn-sm btn-primary" style="width:100%;">ORDER DETAILS</button> 
                    </form>
                    <br>
                    <form action="customer_bill_generate.php" method="post">
                    <input type="hidden" name="cd_id" value="<?php echo $row['cus_id']?>">
                    <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
                    <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
                    <button type="submit" class="btn btn-sm btn-primary" style="width:100%;">GENERATE BILL</button>
                        </form>
                    </td>                   
               </tr>
                <?php } ?>
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
<script type="text/javascript" src="../bower_components/jquery/dist/jquery.min.js"></script>
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
<script src="assets/pages/data-table/extensions/colreorder/js/dataTables.colReorder.min.js"></script>
<script src="../bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript" src="../bower_components/i18next/i18next.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../bower_components/jquery-i18next/jquery-i18next.min.js"></script>

<script src="assets/pages/data-table/extensions/colreorder/js/colreorder-custom.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/jquery.mousewheel.min.js"></script>

<!-- <this> -->


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
</body>

<!-- Mirrored from flatable.phoenixcoded.net/default/dt-ext-select.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Jan 2019 12:13:04 GMT -->
</html>
