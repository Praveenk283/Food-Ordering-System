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
            <h1>Invoice</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i>&ensp;Note:</h5>
              Click the print button at the bottom of the invoice to print.
            </div> -->

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">

          <?php
            require("database_connectivity.php");
            $customer_id=$_POST['cus_id'];
            $order_date=$_POST['ci_date'];
            $order_no=$_POST['ci_order_no'];
                                    
            $sql=$conn->prepare("SELECT * FROM customer_invoice,customer WHERE customer_invoice.cus_id=?  AND customer_invoice.ci_date=? AND customer_invoice.ci_order_no=? AND customer_invoice.cus_id=customer.cus_id ");
            $sql->bind_param("iss",$customer_id,$order_date,$order_no);
            $sql->execute();
            $result=$sql->get_result();
            $row=$result->fetch_assoc();
            $ci_id=$row["ci_id"];
            $ci_order_no=$row['ci_order_no'];
            $cus_id=$row['cus_id'];
            $cus_name=$row['cus_name'];
            $cus_address=$row['cus_address'];
            $cus_contact=$row['cus_contact'];
            $cus_email=$row['cus_email'];
            $ci_shipping_address=$row['ci_shipping_address'];
            $ci_landmark=$row['ci_landmark'];
            $ci_city=$row['ci_city'];
            $ci_pin=$row['ci_pin'];
            $ci_state=$row['ci_state'];
            $ci_country=$row['ci_country'];
            $ci_status=$row['ci_status'];
            $ci_date=$row['ci_date'];

            $sql2=$conn->prepare("SELECT * FROM branch");
            $sql2->execute();
            $result2=$sql2->get_result();
            $row2=$result2->fetch_assoc();
            $b_id=$row2['b_id'];
            $b_name=$row2['b_name'];
            $b_address=$row2['b_address'];

          ?>

                  <h4>
                    <img src="../images/amino/2_bg.png" style="width: 50px;"> &ensp;amino's - The Protein House
                    <!-- <small class="float-right">Date: <?php //echo date("d-m-Y",strtotime($row["ci_date"]));?></small> -->
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <br>
              <!-- info row -->
              <div class="row invoice-info">

                <div class="col-sm-8 invoice-col">
                  <!-- From -->
                  <address>
                    <strong><?php echo $b_name; ?></strong><br>
                    <?php echo $b_address; ?><br>
                    Phone: +91 80736 67159<br>
                    Email: aminosindia@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #076-<?php echo $b_id; echo "-"; echo str_pad($ci_id, 4, '0', STR_PAD_LEFT); ?></b><br>
                  <b>Date: </b><?php echo $ci_date; ?><br>
                  <b>Order No.: </b><?php echo $ci_order_no; ?><br>
                  <b>Payment Mode: </b>

      <?php
        if($row['ci_payment_mode'] == "COD")
          {
        ?>
       <?php echo $row['ci_payment_mode'];?>
        <?php
          }
        else
          {
        ?>
        <?php echo $row['ci_payment_mode'];?>
        <br>
        <b>Transaction ID: </b>
        <?php echo $row['ci_transaction_no'];?>
        <?php
          }
        
      ?>
                  <br>
                </div>
                <!-- /.col -->
              </div>

              <hr><br>

              <div class="row invoice-info">
              <div class="col-sm-8 invoice-col">
                  Billing Details
                  <address>
                    <strong><?php echo $cus_name; ?></strong><br>
                    Phone: +91 <?php echo $cus_address; ?><br>
                    Phone: +91 <?php echo $cus_contact; ?><br>
                    Email: <?php echo $cus_email; ?>
                  </address>
                  <br>
                  Order Status: <?php echo $ci_status; ?>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Shipping Details
                  <address>
                    <strong><?php echo $cus_name; ?></strong><br>
                    <?php echo $ci_shipping_address; ?><br>
                    <?php echo $ci_landmark; ?>, 
                    <?php echo $ci_city; ?><br>
                    <?php echo $ci_state; ?>, 
                    <?php echo $ci_country; ?><br> Pin: 
                    <?php echo $ci_pin; ?><br>
                    Phone: +91 <?php echo $cus_contact; ?><br>
                    Email: <?php echo $cus_email; ?>
                  </address>
                </div>
                <!-- /.col -->
              </div>

              <hr><br>

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Sl No.</th>
                      <th>Product</th>
                      <th align="right">Price</th>
                      <th align="right">Quantity</th>
                      <th align="right">Total</th>
                    </tr>
                    </thead>

                    <tbody>
              <?php 

                $sql1=$conn->prepare("SELECT * FROM product_cart_details pcd,product_details pd,stock_details sd WHERE pd.pd_id=sd.pd_id AND pcd.pd_id=pd.pd_id AND pcd.cus_id=?");

                // $sql1=$conn->prepare("SELECT * FROM product_cart_details,stock_details WHERE product_cart_details.cus_id=? AND product_cart_details.pcd_order_no=? AND product_cart_details.pcd_date=? AND product_cart_details.pd_id=stock_details.pd_id");
                $sql1->bind_param("i",$customer_id);
                $sql1->execute();
                $result1=$sql1->get_result();                               
                $sl=1;
                while($row1=$result1->fetch_assoc())
                {
                // $total+=$row1['pcd_total_amount'];
              ?>

              <tr>
                <td><?php echo $sl++;?></td>
                <td><?php echo $row1['pcd_name'];?></td>
                <td><?php echo $row1['pcd_price'];?></td>
                <td><?php echo $row1['pcd_qty'];?></td>
                <td><?php echo $row1['pcd_total_amount'];?></td>
              </tr>

              <?php
                }
              ?>

                <tr>
                  <td colspan="4" align="right"><b>Subtotal: </b></td>
                  <td><b><?php echo $row['ci_subtotal'];?></b></td>
                </tr>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <hr><br>

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-7">
                  <p class="lead">Amino's India</p>
                  <img src="../images/amino/19.png" alt="Facebook" style="width: 50px;">&nbsp;
                  <img src="../images/amino/18.png" alt="Instagram" style="width: 82px;">&emsp;
                  <img src="../images/amino/17.png" alt="Zomato" style="width: 115px;">&nbsp;&emsp;
                  <img src="../images/amino/16.png" alt="Swiggy" style="width: 160px;">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    We aim to provide maximum protein in a meal with less possible calories with all natural hygiene, organic, gluten free healthy food.<br>Your Daily Protein Intake.
                  </p>
                </div>
                <!-- /.col -->

                <div class="col-5">
                  <p class="lead"></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo $row['ci_subtotal'];?></td>
                      </tr>
                      <tr>
                        <th>Tax:</th>
                        <td><?php echo $row['ci_tax'];?></td>
                      </tr>
                      <!-- <tr>
                        <th>SGST (<?php echo $row['ci_sgst_percent'];?> %)</th>
                        <td><?php echo $row['ci_sgst'];?></td>
                      </tr> -->
                      <tr>
                        <th>Discount:</th>
                        <td><?php echo $row['ci_total_discount'];?></td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td><?php echo $row['ci_delivery_charges'];?></td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo $row['ci_grand_total'];?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!-- <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                  <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button> -->
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts.php"); ?>

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>

</body>
</html>