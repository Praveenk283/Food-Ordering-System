<!DOCTYPE html>
<html>

<?php require("1_metatags.php"); ?>

<body class="goto-here">

<?php require("2_header.php"); ?>

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>


<?php 
require('database_connectivity.php');

$subtotal=$_POST['ci_subtotal'];
$tax=$_POST['ci_tax'];
$total_discount=$_POST['ci_total_discount'];
$grand_total=$_POST['ci_grand_total'];
?>


<form action="product_order_confirmation.php" method="post" enctype="multipart/form-data" onsubmit="return ValidateForm()">

<!-- <input type="hidden" name="ci_city" id="ci_city" value="<?php echo ci_city; ?>"> -->
<!-- <input type="hidden" name="ci_pin" id="ci_pin" value="<?php echo $row1['ci_pin']; ?>">
<input type="hidden" name="ci_state" id="ci_state" value="<?php echo $row1['ci_state']; ?>">
<input type="hidden" name="ci_country" id="ci_country" value="<?php echo $row1['ci_country']; ?>"> -->

<input type="hidden" name="ci_subtotal" id="ci_subtotal" value="<?php echo $subtotal; ?>">
<input type="hidden" name="ci_tax" id="ci_tax" value="<?php echo $tax; ?>">
<input type="hidden" name="ci_total_discount" id="ci_total_discount" value="<?php echo $total_discount; ?>">
<input type="hidden" name="ci_grand_total" id="ci_grand_total" value="<?php echo $grand_total; ?>">

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">

						<form action="#" class="billing-form" >
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">

	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" class="form-control" id="cus_fname" name="cus_fname" value="<?php echo $cus_fname;?>" readonly>
	                </div>
	              </div>

	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" class="form-control" id="cus_lname" name="cus_lname" value="<?php echo $cus_lname;?>" readonly>
	                </div>
                </div>

		            <div class="w-100"></div>

		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" id="cus_contact" name="cus_contact" value="<?php echo $cus_contact;?>" readonly>
	                </div>
	              </div>

	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" id="cus_email" name="cus_email" value="<?php echo $cus_email;?>" readonly>
	                </div>
                </div>

                <div class="w-100"></div>
                <br>
                <h3 class="mb-4 billing-heading">Shipping Details</h3>

                <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country" >Store </label>
		            		<div class="select-wrap" >
		                  <!-- <div class="icon"><span class="ion-ios-arrow-down"></span></div> -->
		                  <select name="ci_branch" id="ci_branch" class="form-control" required="">
		                  	<option value="">--Select--</option>
		                  	
<?php  
require('database_connectivity.php');
$sql1=$conn->prepare("SELECT * FROM branch");
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
		                  <span id="ci_branch_error"></span>
		                </div>

		            	</div>
		            </div>

		            <div class="w-100"></div>

		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="street">Street Address</label>
	                  <input type="text" class="form-control" placeholder="House number, Appartment and Street" name="ci_shipping_address" id="ci_shipping_address" required="">
	                  <span id="ci_shipping_address_error"></span>
	                </div>
		            </div>

		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" class="form-control" placeholder="Area, Sector, Landmark etc" name="ci_landmark" id="ci_landmark" required="">
	                  <span id="ci_landmark_error"></span>
	                </div>
		            </div>

		            <div class="w-100"></div>

		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="city">Town / City</label>
	                  <input type="text" class="form-control" placeholder="" name="ci_city" id="ci_city" required="" >
	                  <span id="ci_city_error"></span>
	                </div>
		            </div>

		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="pin">Pin Code</label>
	                  <input type="text" class="form-control" placeholder="" name="ci_pin" id="ci_pin" required="">
	                  <span id="ci_pin_error"></span>
	                </div>
		            </div>

		            <div class="w-100"></div>

		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="state">State</label>
		            		<div class="select-wrap">
		                  <!-- <div class="icon"><span class="ion-ios-arrow-down"></span></div> -->
		                  <select name="ci_state" id="ci_state" class="form-control" required="">
		                  	<option value="">--Select--</option>
		                  	<option value="Karnataka">Karnataka</option>
		                  </select>
		                  <span id="ci_state_error"></span>
		                </div>
		            	</div>
		            </div>

		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="country">Country</label>
	                  <input type="text" class="form-control" placeholder="" name="ci_country" id="ci_country" value="India" readonly>
	                  <span id="ci_country_error"></span>
	                </div>
		            </div>

	            </div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">

<?php 
require("database_connectivity.php");    
require("4_customer_session_data.php"); 

// $sql4=$conn->prepare("SELECT * FROM extra_charges");
// $sql4->execute();
// $result4=$sql4->get_result();
// $row4=$result4->fetch_assoc();
// $max_stock_qty=$row4["max_stock_qty"];

$cart_status="CART";    
$sql=$conn->prepare("SELECT * FROM product_cart_details pcd,customer c,product_details pd,stock_details sd WHERE pd.pd_id=sd.pd_id AND pcd.cus_id=c.cus_id AND pcd.pd_id=pd.pd_id AND c.cus_id=? AND pcd.pcd_status=?");
$sql->bind_param("is",$cus_id,$cart_status);
$sql->execute();
$result=$sql->get_result();
if($result->num_rows>0) {
?>


  <?php
	// $total_amount=0; 
	// $subtotal=0;   
	// $tax_unit1=0;
	// $total_discount=0;
 //    $sl=1; 
 //    $grand_total=0;
 //    while($row=$result->fetch_assoc()) {
 //    	$unit_price=$row['sd_unit_price'];
 //    	$product_qty=$row['pcd_qty'];
 //    	$discount_price=$row['sd_discount_price'];

  //   	$temp1=$unit_price/100;
		// $tax_unit=$temp1*18;
  //   	$unit_price_bt=$unit_price-$tax_unit;

  //   	$total_unit_price_bt=$unit_price_bt*$product_qty;

  //   	$subtotal=$subtotal+$unit_price_bt;
  //   	$tax_unit1=$tax_unit1+$tax_unit;
  //   	$total_discount=$total_discount+$discount_price;

  //   	$temp2=$subtotal/100;
		// $tax=$temp2*18;
  //       $grand_total= $subtotal+$tax+$tax_unit1+$total_discount;



  //   	$price=$unit_price-$discount_price;
  //   	$total_price=$price*$product_qty;

  //   	$discount=$discount_price*$product_qty;

  //   	$subtotal=$subtotal+$total_price;
		// $total_discount=$total_discount+$discount;

		// $temp=$subtotal/100;
		// $tax=$temp*18;

		// $grand_total=$subtotal+$tax;
?>


<!-- <?php
 }
 ?> -->


	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>&#8377; <?php echo $subtotal; ?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Tax</span>
		    						<span>&#8377; <?php echo $tax; ?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>&#8377; <?php echo $total_discount; ?></span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>&#8377; <?php echo $grand_total; ?></span>
		    					</p>
								</div>
	          	</div>



<?php
   //}
   ?>


<?php

?>


    <div class="col-md-12">
    	<div class="cart-detail p-3 p-md-4">
                <div class="checkout-form-list">
                    <h3 class="billing-heading mb-4">Payment Mode</h3>
                    <select class="form-control" id="payment_mode" name="payment_mode" required="">
                    <option value="">--Select--</option>
                    <option value="COD">Cash On Delivery</option>
                    <option value="PAYTM">Paytm</option>  
                    </select>
                    <span id="payment_mode_error"></span>
                </div>

            <div class="col-md-12">
    <div class="checkout-form-list" id="showTRANID">
        <label>Transaction Number</label>
        <input type="text" name="ci_transaction_no" id="ci_transaction_no" placeholder="Transaction Number" class="form-control" required="">
        <span id="ci_transaction_no_error"></span>
            </div>
    </div>

    <div class="col-md-12">
        <div class="checkout-form-list1">

<!-- <form method="post" action="product_order_confirmation.php"> -->
<!-- <input type="hidden" name="ci_city" id="ci_city" value="<?php echo $_POST['ci_city']; ?>">
<input type="hidden" name="ci_pin" id="ci_pin" value="<?php echo $_POST['ci_pin']; ?>">
<input type="hidden" name="ci_state" id="ci_state" value="<?php echo $_POST['ci_state']; ?>">
<input type="hidden" name="ci_country" id="ci_country" value="<?php echo $_POST['ci_country']; ?>"> -->
<!-- <input type="hidden" name="subtotal" id="subtotal" value="<?php echo $row1['subtotal']; ?>">
<input type="hidden" name="tax" id="tax" value="<?php echo $row1['tax']; ?>">
<input type="hidden" name="grand_total" id="grand_total" value="<?php echo $row1['grand_total']; ?>"> -->



         <label>&nbsp;</label><br>
            <button type="submit" class="btn btn-primary py-3 px-4"><span>Place Order</span></button>
        </div>
    </div>

<div class="col-lg-6 col-12">
    <div class="your-order myDiv" id="showCOD">
<!--                                    <h3>COD</h3>-->
        <img src="images\COD.jpeg" width="100%">   
    </div>
    <div class="your-order myDiv" id="showPAYTM">
<!--                                    <h3>PAYTM</h3>-->
         <img src="images/paytm.jpeg"> 
    </div>

</div>

</div>
</div>
	          <!-- 	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									<p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
								</div>
	          	</div> -->
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
</form>

<?php require("3_newsletter.php"); ?>
<?php require("4_footer.php"); ?>
<?php require("5_footerscripts.php"); ?>


<script>
$(document).ready(function()
{
$("div.myDiv").hide();
$("#showTRANID").hide();
$("#showCOD").show();   
$('#payment_mode').on('change', function(){
var value = $(this).val();                     

if(value=="PAYTM")
{
$("#showPAYTM").show();   
$("#showTRANID").show();
$("#showCOD").hide();   
}
if(value=="COD")
{
$("#showPAYTM").hide();   
$("#showCOD").show();   
$("#showTRANID").hide();
}

});
});


function ValidateForm()
{
var payment_mode = '';
var ci_shipping_address = '';
var ci_landmark = '';                
var ci_transaction_no='';
var ci_contact_no='';
var payment=document.getElementById('payment_mode').value;

if(payment=="COD")
{
ci_transaction_no ="1";    
}
else if(payment=="PAYTM")
{
ci_transaction_no = paytm('ci_transaction_no', 'ci_transaction_no_error', 'Transaction No');    
}

payment_mode = alphabets('payment_mode', 'payment_mode_error', 'Payment Mode');
ci_shipping_address = fieldrequired('ci_shipping_address', 'ci_shipping_address_error', 'Address');
ci_landmark = fieldrequired('ci_landmark', 'ci_area_error', 'Landmark');                
ci_contact_no=phoneno('ci_contact_no', 'ci_contact_no_error', 'Contact');                

if(payment_mode == 1 && ci_shipping_address == 1 && ci_area == 1 && ci_transaction_no == 1 && ci_contact_no == 1) 
{
return true;
}
else
{
return false;
}
}
</script>

</body>
</html>