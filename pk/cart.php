<!DOCTYPE html>
<html>

<?php require("1_metatags.php"); ?>

<body class="goto-here">

<?php require("2_header.php"); ?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="#" style="font-size: 12px;">Cart</a></span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
		<div class="container">

			<div class="row">
    			<div class="col-md-12 ftco-animate">

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
// $row1=$result->fetch_assoc();
if($result->num_rows>0) {
?>

    				<div class="cart-list">
	    				<table class="table">
	    					
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
<!--						        <th>&nbsp;</th>-->
						        <th>Image</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>

<?php
	// $total_amount=0; 
	$subtotal=0;   
	$tax=0;
	$total_discount=0;
    $sl=1; 
    $grand_total=0;
    while($row=$result->fetch_assoc()) {
    	$unit_price=$row['sd_unit_price'];
    	$product_qty=$row['pcd_qty'];
    	$discount_price=$row['sd_discount_price'];

    	$price=$unit_price-$discount_price;
    	$total_price=$price*$product_qty;

    	$discount=$discount_price*$product_qty;

  //   	$temp1=$unit_price/100;
		// $tax_unit=$temp1*18;
  //   	$unit_price_bt=$unit_price-$tax_unit;

    	// $total_unit_price_bt=$unit_price_bt*$product_qty;

    	$subtotal=$subtotal+$total_price;
		$total_discount=$total_discount+$discount;

		$temp=$subtotal/100;
		$tax=$temp*18;

		$grand_total=$subtotal+$tax;

    	// $tax_unit1=$tax_unit1+$tax_unit;

  //   	$temp2=$subtotal/100;
		// $tax=$temp2*18;
  //       $grand_total=$subtotal+$tax+$tax_unit1;
?>

						    <tbody>
						      <tr class="text-center">

						        <td class="product-remove">
						        	<form method="post" action="cart_delete.php">
						        		<input type="hidden" name="pcd_id" id="pcd_id" value="<?php echo $row['pcd_id']; ?>">
						        		<button type="submit">
						        			<i class="ion-ios-close"></i>
						        		</button>
						        	</form>
						        </td>
						        
<!--
						        <form method="post" action="cart_delete.php">
						        	<input type="hidden" name="pcd_id" id="pcd_id" value="<?php echo $row['pcd_id']; ?>">
						        <td class="product-remove">
						        	<a href="#"><span class="ion-ios-close"></span></a></td>
						    	</form>
-->
						        
						        <td class="image-prod"><div class="img" style="background-image:url(./admin/photos/<?php echo $row['pd_image1']; ?>);"></div>
						        </td>
						        
						        <td class="product-name">
						        	<h3><?php echo $row['pd_name']; ?></h3>
						        	<p><?php echo $row['pd_description']; ?></p>
						        </td>
						        
						        <td class="price">&#8377; <?php echo $price; ?></td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input  id="pcd_qty" type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">&#8377; <?php echo $total_price; ?></td>

						      </tr><!-- END TR-->
						    </tbody>

<?php
	}
?>

						  </table>
					  </div>

    			</div>
    		</div>

    		<div class="row justify-content-end">

    			<!-- <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Coupon Code</h3>
    					<p>Enter your coupon code if you have one</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Coupon code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
    			</div>

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Estimate shipping and tax</h3>
    					<p>Enter your destination to get a shipping estimate</p>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Country</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">State/Province</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Zip/Postal Code</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
    			</div> -->

    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Total</h3>
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


<form method="post" action="checkout.php">
<!-- <input type="hidden" name="ci_city" id="ci_city" value="<?php echo $row1['ci_city']; ?>">
<input type="hidden" name="ci_pin" id="ci_pin" value="<?php echo $row1['ci_pin']; ?>">
<input type="hidden" name="ci_state" id="ci_state" value="<?php echo $row1['ci_state']; ?>">
<input type="hidden" name="ci_country" id="ci_country" value="<?php echo $row1['ci_country']; ?>"> -->
<input type="hidden" name="ci_subtotal" id="ci_subtotal" value="<?php echo $subtotal; ?>">
<input type="hidden" name="ci_tax" id="ci_tax" value="<?php echo $tax; ?>">
<input type="hidden" name="ci_total_discount" id="ci_total_discount" value="<?php echo $total_discount; ?>">
<input type="hidden" name="ci_grand_total" id="ci_grand_total" value="<?php echo $grand_total; ?>">
    				<button type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
    				<p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
</form>
    				
    			</div>
    		</div>

<?php
	} else {
?>

		<h2><b>Your Cart is Empty!</b></h2>

<?php
	}
?>

		</div>
	</section>

<?php require("3_newsletter.php"); ?>
<?php require("4_footer.php"); ?>
<?php require("5_footerscripts.php"); ?>

</body>
</html>