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
            <h1>Edit Employee Details</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">

             <?php
       require('database_connectivity.php');
       if(isset($_POST['e_id']))$e_id = $_POST['e_id'];
       // $e_id=$_POST['e_id'];
      $sql=$conn->prepare("SELECT * FROM employee WHERE e_id=?");
       $sql->bind_param("i",$e_id);
       $sql->execute();
       $result=$sql->get_result();
      $row=$result->fetch_assoc();
      ?>
    <form role="form" action="emp_update.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
             <input type="hidden" name="e_id" id="e_id"  value="<?php echo $row['e_id']; ?>">
        
        <div class="form-group">
                <label for="inputName1" class="control-label">Branch</label>
                   <select name="b_id" id="b_id" class="form-control" required >
           	<option value="">--Select--</option>
           	<?php
			   require('database_connectivity.php');
			   $sql1=$conn->prepare("select * from branch");
			   $sql1->execute();
			   $result1=$sql1->get_result();
			   while($row1=$result1->fetch_assoc())
			   {
				?>
				   <option value="<?php echo $row1["b_id"]; ?>">
				   <?php echo $row1["b_name"];?>
				   </option>
			<?php  
			   }
			   ?>
           </select>
                <span id="b_id_error"></span>
            </div>
             
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="e_name" name="e_name" class="form-control"  value="<?php echo $row['e_name']; ?>">
                <span id="e_name_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="e_contact" name="e_contact" class="form-control" value="<?php echo $row['e_contact']; ?>">
                <span id="e_contact_error" class="text-danger font-weight-bold"></span>
            </div>
                  
             <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                <input type="text" id="e_address" name="e_address" class="form-control"  required value="
                    <?php echo $row['e_address']; ?> "></input>
                <span id="e_address_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="e_email" name="e_email"  class="form-control"  value="<?php echo $row['e_email']; ?>">
                <span id="e_email_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Username</label>
               <input type="text" id="e_username" name="e_username" class="form-control"value="<?php echo $row['e_username']; ?>">
                <span id="e_username_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Password</label>
                <input type="text" id="e_password" name="e_password" class="form-control"  value="<?php echo $row['e_password']; ?>">
                <span id="e_password_error" class="text-danger font-weight-bold"></span>
            </div>
            
            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="e_date" name="e_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
            </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &ensp;
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='emp_view.php';">Cancel</button>
              </div>
            </form>
            <br>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
        <!-- right column -->
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php require("4_footer_name.php"); ?>
<?php require("5_footerscripts.php"); ?>

 <!-- <script type="text/javascript">
        function ValidateForm()
        {
            var b_id= '';
            var e_name = '';
            var e_contact = '';
            var e_address = '';
            var e_email = '';
            var e_username = '';
            var e_password = '';
           
            b_id = fieldrequired('b_id', 'b_id_error', 'b_id');
            e_name = alphabets('e_name', 'e_name_error', 'e_name');
             e_contact=  phoneno('e_contact', 'e_contact_error', 'e_contact');
             e_address = fieldrequired('e_address', 'e_address_error', 'e_address');
            e_email = emailid('e_email', 'e_email_error', 'e_email Id');
            e_username = fieldrequired('e_username', 'e_username_error', 'e_Username');
            e_password = pasword('e_password', 'e_password_error', 'e_Password');
			
        if (b_id == 1 && e_name == 1 && e_contact == 1 && e_address == 1 && e_email == 1 && e_username == 1 && e_password == 1) 
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
    </script> -->

 <script type="text/javascript" >
        function validation()
        {
            var b_id = document.getElementById('b_id').value;
            var e_name = document.getElementById('e_name').value;
            var e_contact = document.getElementById('e_contact').value;
            var e_address = document.getElementById('e_address').value;
            var e_email = document.getElementById('e_email').value;
            var e_username = document.getElementById('e_username').value;
            var e_password = document.getElementById('e_password').value;

           
       
         if(e_name == ""){
          document.getElementById('e_name_error').innerHTML = "  Please Enter Name ";
          return false;

         }
         if((e_name.length <=2 ) || (e_name.length >=20)){

           document.getElementById('e_name_error').innerHTML = "  Name length must be between 2 to 20";
          return false;

         }
          
          if(!isNaN(e_name)){
             document.getElementById('e_name_error').innerHTML = "  Name length must be between 2 to 20";
          return false;

         }


         if(e_contact == ""){
          document.getElementById('e_contact_error').innerHTML = "  Please Enter Phone NO ";
          return false;

         }
         if(isNaN(e_contact)){
            document.getElementById('e_contact_error').innerHTML = "  Digits only not characters";
          return false;

         }
          if(e_contact.length!=10){
            document.getElementById('e_contact_error').innerHTML = "  Mobile number should 10 digits";
          return false;

         }


         // if(e_address == ""){
         //  document.getElementById('e_address_error').innerHTML = "  Please Enter Address ";
         //  return false;

         // }
         //   if(e_address.length <10){
         //    document.getElementById('e_address_error').innerHTML = " Address Must BE More Them 10 characters    ";
         //  return false;

         // }
         if(e_email == ""){
          document.getElementById('e_email_error').innerHTML = "  Please Enter Email Id ";
          return false;

         }
         // if(e_email.Indexof('@') <= 0){
         //  document.getElementById('e_email_error').innerHTML = "  @ Invalid Position ";
         //  return false;
         // }
         // if((e_email.charAt(e_email.length-4)!='.') || (e_email.charAt(e_email.length-3)!='.')){
         //    document.getElementById('e_email_error').innerHTML = "  . Invalid Position ";
         //  return false;
         // }

         if(e_username == ""){
          document.getElementById('e_username_error').innerHTML = "  Please Enter Username";
          return false;

         }

         // if((e_username.length <=2 ) || (e_userename.length >= 8)){

         //   document.getElementById('e_username_error').innerHTML = "  Username length must be between 2 to 8";
         //  return false;

         // }


         if(e_password == ""){
          document.getElementById('e_password_error').innerHTML = "  Please Enter Password ";
          return false;
         }

           if((e_password.length < 4)||(e_password.length>20)){
            document.getElementById('e_password_error').innerHTML = " Password length must be between 5 & 20";
          return false;

         }

        }
    </script>

</body>
</html>














