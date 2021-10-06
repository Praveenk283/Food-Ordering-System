  <!DOCTYPE html>
<html>



<?php require("1_metatags.php"); ?>

<body class="goto-here">

<?php require("2_header.php"); ?>

<style>


input[type=submit] {
  
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div [class = row] {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style><style>


input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div [class=row]{
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">Register</h1>
          </div>
        </div>
      </div>
    </div>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->

            <!-- form start -->

              <div>
  <form role="form" action="admin/customer_insert.php" method="post"  enctype="multipart/form-data" onsubmit="return ValidateForm()" >
    <div 
    <label for="fname">First Name</label>
    <input   type="text" id="cus_fname" name="cus_fname" class="form-control" required="" placeholder="Your name.." >
     <span id="cus_name_error"></span>

    <label for="lname">Last Name</label>
    <input type="text" id="cus_lname" name="cus_lname" class="form-control" required="" placeholder="Your last name.."  >
     <span id="cus_name_error"></span>
   
     <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="cus_contact" name="cus_contact" class="form-control"  placeholder="Contact no." required="">
                <span id="cus_contact_error"></span>
  
    <label for="inputEmail" class="control-label">Address</label>
                <textarea type="text" id="cus_address" name="cus_address" class="form-control"  placeholder="Your Address." required=""></textarea>
                <span id="cus_address_error"></span>

    <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="cus_email" name="cus_email"  class="form-control" placeholder="Your Email." required="">
                <span id="cus_email_error"></span>

         <label for="inputEmail" class="control-label">Username</label>
               <input type="text" id="cus_username" name="cus_username" class="form-control" placeholder="Username.." required="">
                <span id="cus_username_error"></span>

                <label for="inputEmail" class="control-label">Password</label>
                <input type="text" id="cus_password" name="cus_password" class="form-control" placeholder="Password.." required="">
                <span id="cus_password_error"></span>

                 <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="cus_date" name="cus_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
             

              <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Sign Up
            </button>
          </div>

          <div class="text-center p-t-50">
            <span class="txt1">
              Already have an account?
            </span>
            <a class="txt2" href="#" data-toggle="modal" data-target="#Modal1" data-dismiss="modal">
              Login
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>

   <!--  <input type="submit" value="Submit"> -->
  </form>
</div>

        
          <!--   <form role="form" action="admin/customer_insert.php" method="post"  enctype="multipart/form-data" onsubmit="return ValidateForm()">
              <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">Name</label>
                <input type="text" id="cus_fname" name="cus_fname" class="form-control" required="">
                <span id="cus_name_error"></span>
            </div>
            
            <div class="box-body">
                 <div class="form-group">
                <label for="inputName1" class="control-label">lastName</label>
                <input type="text" id="cus_lname" name="cus_lname" class="form-control" required="">
                <span id="cus_name_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Contact</label>
                <input type="text" id="cus_contact" name="cus_contact" class="form-control" required="">
                <span id="cus_contact_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Address</label>
                <textarea type="text" id="cus_address" name="cus_address" class="form-control" required=""></textarea>
                <span id="cus_address_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Email</label>
                <input type="text" id="cus_email" name="cus_email"  class="form-control" required="">
                <span id="cus_email_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Username</label>
               <input type="text" id="cus_username" name="cus_username" class="form-control">
                <span id="cus_username_error"></span>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="control-label">Password</label>
                <input type="text" id="cus_password" name="cus_password" class="form-control" required="">
                <span id="cus_password_error"></span>
            </div>
            
            <div class="form-group">
                <label for="inputEmail" class="control-label">Date</label>
            <input type="text" id="cus_date" name="cus_date" class="form-control" readonly value="<?php echo date('d-m-Y');?>">
                
            </div>
            

              </div>
            <--   /.box-body -->
             <!--  <div class="container-login100-form-btn">
            <button class="login100-form-btn">
              Sign Up
            </button>
          </div>

          <div class="text-center p-t-50">
            <span class="txt1">
              Already have an account?
            </span>
            <a class="txt2" href="#" data-toggle="modal" data-target="#Modal1" data-dismiss="modal">
              Login
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div> -->

             <!--  <div class="box-footer">
                <span id="form_error" style="color:#ff3a00;"></span> <br>
                <button type="submit" class="btn bg-gradient-primary">Submit</button>
                &ensp;  
                <button type="button" class="btn bg-gradient-primary" onclick="window.location.href='index.php';">Cancel</button>
              </div> -->
           <!--  </form> --> -->
          
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
 
<?php require("3_newsletter.php"); ?>
<?php require("4_footer.php"); ?>
<?php require("5_footerscripts.php"); ?>

 <script type="text/javascript">
        function ValidateForm()
        {
            var cus_name = '';
            var cus_contact = '';
            var cus_email = '';
            var cus_address = '';
            var cus_username = '';
            var cus_password = '';
           
            cus_name = alphabets('cus_name', 'cus_name_error', 'Name');
             cus_contact=  phoneno('cus_contact', 'cus_contact_error', 'Contact');
             cus_email = emailid('cus_email', 'cus_email_error', 'Email');
            cus_address = fieldrequired('cus_address', 'cus_address_error', 'Address');
            cus_username = fieldrequired('cus_username', 'cus_username_error', 'Username');
            cus_password = pasword('cus_password', 'cus_password_error', 'Password');
			
        if (cus_name == 1 && cus_contact == 1 && cus_email == 1 && ecus_address == 1 && cus_username == 1 && cus_password == 1) 
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
    </script>


  
</body>
</html>
