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
            <h1>Customer Details</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <!-- <div class="card-header">
              <div class="text-right">
              <button class="btn btn-default" onclick="window.location.href='customer_form.php'; "><i class="fas fa-plus"></i>&ensp;<th>New Record</th></button>
            </div>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Date</th>
                 <!--  <th>Edit</th>
                  <th>Delete</th> -->
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
    <td><?php echo $row["cus_address"];?></td>
    <td><?php echo $row["cus_email"];?></td>
    <td><?php echo $row["cus_username"];?></td>
    <td><?php echo $row["cus_password"];?></td>
    <td><?php echo $row["cus_date"];?></td>
    <!-- <td>
      <form method="post" action="customer_edit_form.php" enctype="multipart/form-data">
        <input type="hidden" name="cus_id" id="cus_id" value="<?php //echo $row["cus_id"];?>">
        <input type="submit" value="Edit" class="btn btn-block bg-gradient-primary btn-sm">
      </form>
    </td>  
    <td>
      <form method="post" action="customer_delete.php" enctype="multipart/form-data">
        <input type="hidden" name="cus_id" id="cus_id" value="<?php //echo $row["cus_id"];?>">
        <input type="submit" value="Delete" class="btn btn-block bg-gradient-danger btn-sm">
      </form>   
    </td>    -->
  </tr> 

<?php
    }
?>

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts_table.php"); ?>

</body>
</html>