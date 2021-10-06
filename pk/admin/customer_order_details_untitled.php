<!DOCTYPE html>
<html>
<head>
   <?php require("1_metatags.php"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php require("2_header.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require("3_sidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>CUSTOMER ORDER DETAILS</h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><button class="btn btn-primary" onclick="window.location.href='customer_order_placed.php'; ">BACK</button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <?php
        require("database_connectivity.php");
        $customer_id=$_POST['cd_id'];
        $order_date=$_POST['ci_date'];
    $order_no=$_POST['ci_order_no'];
                                    
       $sql=$conn->prepare("SELECT * FROM customer_invoice,customer WHERE customer_invoice.cus_id=? AND customer_invoice.ci_date=? AND customer_invoice.ci_order_no=? AND customer_invoice.cus_id=customer.cus_id ");
       $sql->bind_param("iss",$customer_id,$order_date,$order_no);
       $sql->execute();
       $result=$sql->get_result();
        $row=$result->fetch_assoc();
        ?>
              <table id="example144" class="table table-bordered table-striped">
                <thead>
                                        <tr>
                    <td colspan="6" align="center"><b>Customer Details</b></td>
                </tr>
                <tr>
                    <td><b>Name</b></td>
                    <td colspan="2"><?php echo $row['cus_name'];?></td>
                    <td><b>Contact No.</b></td>
                    <td colspan="2"><?php echo $row['cus_contact'];?></td>
                </tr>
                <tr>
                    <td><b>Shipping Address</b></td>
                    <td colspan="2"><?php echo $row['ci_shipping_address'];?>
                    </td>
                    <td><b>Email ID</b></td>
                    <td colspan="2"><?php echo $row['cus_email'];?></td>
                </tr>
                <tr>
                    <td><b>Landmark</b></td>
                    <td colspan="5"><?php echo $row['ci_landmark'];?>
                    </td>
                </tr>

                <tr><td colspan="6" align="center"><b>Product Order Details</b></td></tr>

                <tr>
                <td><b>Sl No.</b></td>
                <td><b>Product Name</b></td>
                <td align="right"><b>Unit Price</b></td>
                 <td align="right"><b>Discount</b></td>
                <td align="right"><b>Quantity</b></td>
                <td align="right"><b>Total</b></td>
                </tr>
                                    </thead>
                                    <tbody>
                                        <?php    

                $sql1=$conn->prepare("SELECT * FROM product_cart_details,stock_details WHERE product_cart_details.cus_id=? AND product_cart_details.pcd_order_no=? AND product_cart_details.pcd_date=? AND product_cart_details.pd_id=stock_details.pd_id");
                $sql1->bind_param("iss",$customer_id,$order_no,$order_date);
               $sql1->execute();
               $result1=$sql1->get_result();
                $total=0;                               
                $sl=1;
                while($row1=$result1->fetch_assoc())
                {
                $total+=$row1['pcd_total_amount'];
                ?>
                <tr>
                <td>
                <?php echo $sl++//$row['customer_id'];?>
                </td>

                <td>
                <?php echo $row1['pcd_name'];?>
                </td>
                <td align="right">
                <?php echo $row1['pcd_price'];?>
                </td>
                <td align="right">
                <?php echo $row1['sd_discount'];?>
                </td>
                <td align="right">
                <?php echo $row1['pcd_qty'];?>
                </td>
                


                <td align="right">
                <?php echo $row1['pcd_total_amount'];?>
                </td>


                </tr>

                <?php
                }

                ?>
                <tr><td colspan="5" align="right">Sub Total</td>
                <td align="right"><b><?php echo $total;?></b></td></tr>

                <tr><td colspan="5" align="right">CGST( <?php echo $row['ci_cgst_percent'];?> %)</td>
                <td align="right"><?php echo $row['ci_cgst'];?></td></tr>

                <tr><td colspan="5" align="right">SGST( <?php echo $row['ci_sgst_percent'];?> %)</td>
                <td align="right"><?php echo $row['ci_sgst'];?></td></tr>
                 <tr><td colspan="5" align="right">Delivery Charge</td>
                <td align="right"><b><?php echo $row['ci_delivery_charges'];?></b></td></tr>
                <tr><td colspan="5" align="right">Grnad Total</td>
                <td align="right"><b><?php echo $row['ci_total_price'];?></b></td></tr>
                                    </tbody>
                                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php require("4_footer_name.php"); ?>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
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
</html>


