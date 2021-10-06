<!DOCTYPE html>
<html>

<?php require("1_metatags_table.php"); ?>

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
            <h1>Order Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <div class="text-right">
              <button class="btn btn-default" onclick="window.location.href='emp_form.php'; "><i class="fas fa-plus"></i>&ensp;<th>New Record</th></button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Sl No.</th>
                  <th>Customer Name</th>
                  <!-- <th>Branch</th> -->
                  <th>Order Date</th>
                  <th>Order No.<br>Amount<br>Payment Mode</th>
                  <th>Order Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

<?php
  require("database_connectivity.php");
           $sql=$conn->prepare("SELECT * FROM customer_invoice,customer WHERE customer_invoice.cus_id=customer.cus_id ORDER BY customer_invoice.ci_id DESC");
           $sql->execute();
           $result=$sql->get_result();
           $sno=1;
           while($row=$result->fetch_assoc())
    {
?>
  <tr>
    <td><?php echo $sno++;?> </td>
    <td><?php echo $row['cus_name']?></td>
    <td><?php //echo $row['b_location']; ?><br><?php echo date("d-m-Y");?></td>

    <td>
      <b>Order No.: </b>
      <?php echo $row['ci_order_no'];?>
      <br>
      <b>Amount: </b>
      <?php echo $row['ci_grand_total'];?>
      <br>
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
      </td>

      <td>
        <?php if($row['ci_status'] == 'ORDER PENDING')
          {
        ?>
        <button class="btn btn-block bg-gradient-danger btn-sm" style="width:100%;">Pending</button>
        <br><br>
        <form action="customer_order_confirm.php" method="post">
          <input type="hidden" name="ci_id" value="<?php echo $row['ci_id']?>">
            <input type="hidden" name="cus_id" value="<?php echo $row['cus_id']?>">
            <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
            <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
            <input type="hidden" name="ci_grand_total" value="<?php echo $row['ci_grand_total']?>">
            
              <button type="submit" class="btn btn-block bg-gradient-success btn-sm" style="width:100%;">Confirm</button>
        </form>
        <?php
          }
        ?>
        <?php if($row['ci_status'] == 'ORDER CONFIRMED')
          {
        ?>
        <button class="btn btn-block bg-gradient-success btn-sm" style="width:100%;">Confirmed</button>
        <br><br>
        <form action="customer_order_deliver.php" method="post">
            <input type="hidden" name="ci_id" value="<?php echo $row['ci_id']?>">
            <input type="hidden" name="cus_id" value="<?php echo $row['cus_id']?>">
            <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
            <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
               <button type="submit" class="btn btn-block bg-gradient-warning btn-sm" style="width:100%;">Delivered</button>
        </form>
        <?php
          }
        ?>
        <?php if($row['ci_status'] == 'ORDER DELIVERED')
          {
        ?>
        <button class="btn btn-block bg-gradient-success btn-sm" style="width:100%;">Delivered</button> <br><br>
        <?php
          }
        ?>
        <?php if($row['ci_status'] == 'ORDER CANCELLED')
          {
        ?>
        <button class="btn btn-block bg-gradient-danger btn-sm" style="width:100%;">Cancelled</button> <br><br>
        <?php
          }
        ?>
      </td>

      <td>
            <form action="customer_order_details.php" method="post">
                    <input type="hidden" name="cus_id" value="<?php echo $row['cus_id']?>">
                    <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
                    <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
                    <button type="submit" class="btn btn-block bg-gradient-primary btn-sm" style="width:100%;">Order Details</button> 
            </form>
            <br>
            <form action="customer_bill_generate.php" method="post">
                    <input type="hidden" name="cus_id" value="<?php echo $row['cus_id']?>">
                    <input type="hidden" name="ci_date" value="<?php echo $row['ci_date']?>">
                    <input type="hidden" name="ci_order_no" value="<?php echo $row['ci_order_no']?>">
                    <button type="submit" class="btn btn-block bg-gradient-primary btn-sm" style="width:100%;">Generate Bill</button>
            </form>
      </td>

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
</section>
</div>

<?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts_table.php"); ?>
    
</body>
</html>