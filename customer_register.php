<!DOCTYPE html>
<html>

<?php require("1_metatags.php"); ?>

<body class="goto-here">

<?php require("2_header.php"); ?>

  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="#" style="font-size: 12px;">Register</a></span></p>
            <h1 class="mb-0 bread">Register</h1>
          </div>
        </div>
      </div>
    </div>

    <br>

<section style="background-image: url('images/bg_3edit.jpg'); height: 100%;">

<br><br><br>

<form class="container" style="width: 500px; position: absolute; right: 0%;" action="./admin/customer_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateRegisterForm()">

<!--           <span class="login100-form-title">
            Register
          </span> -->

          <div class="wrap-input100 validate-input" data-validate = "First Name is required">
            <input class="input100" type="text" name="cus_fname" id="cus_fname" placeholder="First Name" minlength="3" maxlength="15" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-user-circle" aria-hidden="true"></i>
              <span id="cus_fname_error"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Last Name is required">
            <input class="input100" type="alphabets" name="cus_lname" id="cus_lname" placeholder="Last Name" minlength="1" maxlength="15" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-user-circle" aria-hidden="true"></i>
              <span id="cus_lname_error"></span>
            </span>
          </div>

            <div class="wrap-input100 validate-input" data-validate = "Contact is required">
            <input class="input100" type="number" name="cus_contact" id="cus_contact" placeholder="Contact" pattern="[6-9]{1}[0-9]{9}" minlength="10" maxlength="10" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-phone-alt" aria-hidden="true"></i>
              <span id="cus_contact_error"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Email is required">
            <input class="input100" type="text" name="cus_email" id="cus_email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter valid email" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-envelope" aria-hidden="true"></i>
              <span id="cus_email_error"></span>
            </span>
          </div> 

           <div class="wrap-input100 validate-input" data-validate = "Address is required">
            <input class="input100" type="text" name="cus_address" id="cus_address" placeholder="Address" minlength="10" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-address-book" aria-hidden="true"></i>
              <span id="cus_address_error"></span>
            </span>
          </div> 

           <div class="wrap-input100 validate-input" data-validate = "Username is required">
            <input class="input100" type="text" name="cus_username" id="cus_username" placeholder="Username" minlength="6" maxlength="15" pattern="[A-Za-z0-9_]{1,15}" title="Only letters (either case), numbers, and the underscore; no more than 15 characters" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-user" aria-hidden="true"></i>
              <span id="cus_username_error"></span>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="cus_password" id="cus_password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" minlength="6" maxlength="15" required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
              <span id="cus_password_error"></span>
            </span>
          </div>
          
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Sign Up
            </button>
          </div>

          <!-- <div class="text-center p-t-20">
            <span class="txt1">
              Already have an account?
            </span>
            <a class="txt2" href="index.php">
              Login
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div> -->
        </form>
        <br>
      </section>

<?php require("3_newsletter.php"); ?>
<?php require("4_footer.php"); ?>
<?php require("5_footerscripts.php"); ?>

<script type="text/javascript">
function ValidateRegisterForm() {
    var cus_name = '';
    var cus_contact = '';
    var cus_email = '';
    var cus_address = '';
    var cus_username = '';
    var cus_password = '';
              
    cus_name =alphabets('cus_name','cus_name_error','Name');
    cus_contact = phoneno('cus_contact','cus_contact_error','Contact.No');
    cus_email = emailid('cus_email','cus_email_error','Email');
    cus_address =fieldrequired('cus_address','cus_address_error','Address');
    cus_username =fieldrequired('cus_username','cus_username_error','Username');
    cus_password =pasword('cus_password','cus_password_error','Password');
                
    if(cus_name==1 && cus_contact==1 && cus_email==1 && cus_address==1 && cus_username==1 && cus_password==1 ) {
        return true;
    } else {
        return false;
    }
}
</script>

</body>
</html>