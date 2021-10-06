<!DOCTYPE html>
<html>

<!-- <?php require("1_validation.php"); ?> -->
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
            <h1>Add Employee</h1>
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

            <form role="form" action="emp_insert.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
              <div class="box-body">
              
                  
            <div class="form-group" >
                <label for="inputName1" class="control-label" required>Branch</label>
                   <select name="b_id" id="b_id" class="form-control" required>
           	<option value="">--Select--</option>
           	<?php
			   require('database_connectivity.php');
			   $sql1=$conn->prepare("select * from branch");
			   $sql1->execute();
			   $result1=$sql1->get_result();
			   while($row1=$result1->fetch_assoc())
			   {
				?>
        
				   <option value="<?php echo $row1["b_id"]; ?>"><?php echo $row1["b_name"];?></option>
            
			<?php  
			   }
			   ?>
           </select>
                <span id="b_id_error" class="text-danger font-weight-bold"></span>
            </div>      
                                    
                  
                  <div class="form-group" >
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="e_name" name="e_name" class="form-control">
                <span id="e_name_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="Number" class="control-label">Contact</label>
                <input type="tel" id="e_contact" name="e_contact" class="form-control"    >
                <span id="e_contact_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                    <textarea type="text" id="e_address" name="e_address" class="form-control" >
                </textarea>
                    <span id="e_address_error" class="text-danger font-weight-bold"></span>
            </div>


            <div class="form-group">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="e_email" name="e_email"  class="form-control" >
            
               <span id="e_email_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Username</label>
               <input type="text" id="e_username" name="e_username" class="form-control" >
                <span id="e_username_error" class="text-danger font-weight-bold"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Password</label>
                <input type="text" id="e_password" name="e_password" class="form-control">
                <span id="e_password_error" class="text-danger font-weight-bold"></span>
            </div>
            
            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="e_date" name="e_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                
            </div>
            

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <!-- <span id="form_error" style="color:#ff3a00;"></span> <br>  -->
                <button  type="submit" name="submit" value="submit"  class="btn bg-gradient-primary" >Submit</button>
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








