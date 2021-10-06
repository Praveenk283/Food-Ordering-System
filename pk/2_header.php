   <?php require('4_customer_session_data.php');?>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Amino's</a>
	      <tr>The Protein House
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="shop.php" class="nav-link">Menu</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>


<?php
$total_amount=0;
$cart_qty=0;
if($customer_session==TRUE)
{
    $prod_cart_status="CART"; 
    $sqlc=$conn->prepare("SELECT * FROM product_cart_details,customer WHERE product_cart_details.cus_id=customer.cus_id AND customer.cus_id=? AND product_cart_details.pcd_status=?");
    $sqlc->bind_param("is",$cus_id,$prod_cart_status);
    $sqlc->execute();
    $resultc=$sqlc->get_result();
    $count=$resultc->num_rows;
    $total_amount=0;    
    if($count<=0)
    {
        $cart_qty=0;
    }
    else
    {
        while($rowc=$resultc->fetch_assoc())
        {
            $total_amount=$total_amount+$rowc['pcd_total_amount'];

        }
        $cart_qty=$count;
    } 
}
else
{
    $cart_qty=0;
    $total_amount=0;
}
?>

<?php
if($customer_session==TRUE) {
?>

<li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $cart_qty; ?>]</a></li>

<?php 
} 
?>

<?php
if($customer_session==TRUE) {
?>

	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>&nbsp;<?php echo $cus_name; ?></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Profile</a>
              	<a class="dropdown-item" href="order.php">Orders</a>
              	<a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Settings</a>
                <a class="dropdown-item" href="./logout.php">Logout</a>
              </div>
            </li>

<?php  
} else {
?>

	          <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#Modal1"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></li>
<!--	           <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#Modal2"><i class="fas fa-sign-in-alt"></i>&nbsp;Register</a></li>-->

<?php  
}
?>

	        </ul>
	      </div>

	    </div>
	  </nav>
    <!-- END nav -->

    <!-- Modal1 -->
	<div class="modal" id="Modal1" tabindex="-1" role="dialog" data-dismiss="modal">
		
		<div class="modal-center" style="position: absolute;  left: 50%;  top: 50%;  transform: translate(-50%, -50%);">
			<div class="wrap-login100" style="margin: auto; padding: 70px 100px 30px 100px;">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/modal.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="customer_login_check.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateLoginForm()">

<?php 
if(isset($_POST["product_details_url"]))
{
?>
<input type="hidden" name="product_details_url" value="<?php echo $_POST['product_details_url'];?>">                                
<?php
}
else
{
?>                                
<input type="hidden" name="product_details_url" value="NAN">                                    
<?php
}
?>
			
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="login_cus_username" id="login_cus_username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user" aria-hidden="true"></i>
							<span id="login_cus_username_error"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="login_cus_password" id="login_cus_password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<span id="login_cus_password_error"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign In
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-30">
						<span class="txt1">
							New to amino's?
						</span>
						<!-- <a class="txt2" href="customer_register.php" >
							Create an Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> -->
						<a class="txt2" href="#" data-toggle="modal" data-target="#Modal2">
							Create an Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>

	</div>
	<!-- END Modal1 -->

	<!-- Modal2 -->
	<!-- <div class="modal" id="Modal2" tabindex="-1" role="dialog" data-dismiss="modal">
		
		<div class="modal-center" style="position: absolute;  left: 50%;  top: 50%;  transform: translate(-50%, -50%);">
			<div class="wrap-login100" style="margin: auto; padding: 35px 100px 20px 100px;">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/modal.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="./admin/customer_insert.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateRegisterForm()">

					<span class="login100-form-title">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Last Name is required">
						<input class="input100" type="text" name="cus_fname" id="cus_fname" placeholder="First Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user-circle" aria-hidden="true"></i>
							<span id="cus_fname_error"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Last Name is required">
						<input class="input100" type="text" name="cus_lname" id="cus_lname" placeholder="Last Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user-circle" aria-hidden="true"></i>
							<span id="cus_lname_error"></span>
						</span>
					</div>

						<div class="wrap-input100 validate-input" data-validate = "Contact is required">
						<input class="input100" type="text" name="cus_contact" id="cus_contact" placeholder="Contact">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-phone-alt" aria-hidden="true"></i>
							<span id="cus_contact_error"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Email is required">
						<input class="input100" type="text" name="cus_email" id="cus_email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-envelope" aria-hidden="true"></i>
							<span id="cus_email_error"></span>
						</span>
					</div> 

					 <div class="wrap-input100 validate-input" data-validate = "Address is required">
						<input class="input100" type="text" name="cus_address" id="cus_address" placeholder="Address">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-address-book" aria-hidden="true"></i>
							<span id="cus_address_error"></span>
						</span>
					</div> 

					 <div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="cus_username" id="cus_username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user" aria-hidden="true"></i>
							<span id="cus_username_error"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="cus_password" id="cus_password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<span id="cus_password_error"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign Up
						</button>
					</div>

					<div class="text-center p-t-20">
						<span class="txt1">
							Already have an account?
						</span>
						<a class="txt2" href="#" data-toggle="modal" data-target="#Modal1" data-dismiss="modal">
							Login
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>

	</div> --> 
	<!-- END Modal2 -->


<script type="text/javascript">
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script type="text/javascript">
function ValidateLoginForm() {
	var login_cus_username = '';
	var login_cus_password = '';

	login_cus_username = fieldrequired('login_cus_username', 'login_cus_username_error', 'Username');
	login_cus_password = fieldrequired('login_cus_password', 'login_cus_password_error', 'Password');

	if (login_cus_username == 1 && login_cus_password == 1) {
	return true;
} else {
	return false;
}
}
</script>

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