<!DOCTYPE html>
<html>

<?php require("1_metatags.php"); ?>

<body class="goto-here">

<?php require("2_header.php"); ?>

	  <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">

<?php  
require('database_connectivity.php');
if(isset($_REQUEST["pc_id"]) && isset($_REQUEST["pd_id"])) {
$pc_id=$_REQUEST["pc_id"];
$pd_id=$_REQUEST["pd_id"];
$sql2=$conn->prepare("SELECT * FROM product_category pc,product_details pd WHERE pc.pc_id=? AND pd.pd_id=?");
$sql2->bind_param("ii",$pc_id,$pd_id);
} 
$sql2->execute();
$result2=$sql2->get_result();
$row2=$result2->fetch_assoc()
?>

          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="shop.php">Menu</a></span> <span class="mr-2"><a href="products.php?pc_id=<?php echo $row2['pc_id']; ?>" style="font-size: 12px;"><?php echo $row2['pc_name']; ?></a></span></p>
            <h1 class="mb-0 bread"><?php echo $row2['pd_name']; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">

<?php  
require('database_connectivity.php');
if(isset($_REQUEST["pc_id"]) && isset($_REQUEST["psc_id"]) && isset($_REQUEST["pd_id"]) && isset($_REQUEST["sd_id"])) {
$pc_id=$_REQUEST["pc_id"];
$psc_id=$_REQUEST["psc_id"];
$pd_id=$_REQUEST["pd_id"];
$sd_id=$_REQUEST["sd_id"];
$sql1=$conn->prepare("SELECT * FROM product_category pc,product_sub_category psc,product_details pd,stock_details sd WHERE pc.pc_id=? AND psc.psc_id=? AND pd.pd_id=? AND sd.sd_id=? AND pc.pc_id=pd.pc_id AND psc.psc_id=pd.psc_id AND pd.pd_id=sd.pd_id");
$sql1->bind_param("iiii",$pc_id,$psc_id,$pd_id,$sd_id);
}
$sql1->execute();
$result1=$sql1->get_result();
$row1=$result1->fetch_assoc();
?>

    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="./admin/photos/<?php echo $row1['pd_image1']; ?>" class="image-popup">
    					<img src="./admin/photos/<?php echo $row1['pd_image1']; ?>" class="img-fluid" alt="<?php echo $row1['pd_name']; ?>">



    				</a>
    			</div>

    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $row1['pd_name']; ?></h3>

<?php  
if ($psc_id==1) 
  {
?>

            <div>
              <p><a href="#" class="btn btn-success py-2 px-5">Veg</a></p>
            </div>

<?php
  }
elseif ($psc_id==2)
  {
?>

            <div>
              <p><a href="#" class="btn btn-danger py-2 px-5">Non Veg</a></p>
            </div>

<?php
  }
?>

<br>

<?php  
$discount=$row1['sd_discount'];
if ($discount!=0) {
?>
							
              <p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #82ae46; font-size: 20px;"><?php echo $discount; ?>%<span style="color: #b3b3b3;">&ensp;Off</span></a>
							</p>

<?php
}
?>

    				<p class="price">
    				
<?php  
if ($discount!=0) {
?>

  <span class="mr-2 price-dc"><s style="color: #b3b3b3;">&#8377;</i><?php echo $row1['sd_unit_price']; ?></s></span>

<?php  
}
?>
                      <span class="price-sale">&#8377; <?php echo $row1['sd_sale_price']; ?></span>

    				</p>
    				<p><?php echo $row1['pd_description']; ?></p>

						<div class="row mt-4">

							<div class="w-100"></div>
              <div class="input-group col-md-6 d-flex mb-3">
                <span class="input-group-btn mr-2">
                    <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                     <i class="ion-ios-remove"></i>
                    </button>
                  </span>
                <input type="text" id="pcd_qty" name="pcd_qty" class="form-control input-number" value="1" min="1" max="100">
                <span class="input-group-btn ml-2">
                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                       <i class="ion-ios-add"></i>
                   </button>
                </span>
              </div>

							<!-- <div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
              <div>
                <label>Quantity</label>
	             	<input type="number" id="sd_qty<?php echo $row['pd_id'];?>" name="quantity" class="form-control input-number" value="1" min="1" style="width:60%">
               </div>
	          	</div> -->

	          	<div class="w-100"></div>

<?php  
$status=$row1['sd_status'];
if ($status=="Available") {
?>

	          	<div class="col-md-12">
	          		<p style="color: #009900;"><?php echo $status; ?></p>
	          	</div>

<?php
} elseif ($status=="Currently Unavailable") {
?>

				<div class="col-md-12">
	          		<p style="color: #ff0000;"><?php echo $status; ?></p>
	          	</div>

<?php
}
?>

          	</div>

<?php
$min_stock_qty=5;
if($row1["sd_qty"]>$min_stock_qty && $row1["sd_status"]=="Available")
{
if($customer_session==TRUE)
{
?>

          <form method="post" action="cart_add.php">
            <input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row1['pd_id'];?>">
            <input type="hidden" name="pd_name" id="pd_name" value="<?php echo $row1['pd_name'];?>">
            <input type="hidden" name="pcd_qty" id="pcd_qty" value="<var>pcd_qty</var>">
            <input type="hidden" name="sd_unit_price" id="sd_unit_price" value="<?php echo $row1['sd_unit_price'];?>">
            <input type="hidden" name="sd_discount" id="sd_discount" value="<?php echo $row1['sd_discount']; ?>">
            <input type="hidden" name="sd_discount_price" id="sd_discount_price" value="<?php echo $row1['sd_discount_price'];?>">
            <input type="hidden" name="sd_sale_price" id="sd_sale_price" value="<?php echo $row1['sd_sale_price'];?>">
            <input type="hidden" name="cart_page" id="cart_page" value="1">
            <button type="submit" class="btn btn-primary py-3 px-4">Add to cart</button>
            <p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p>
          </form>

<?php 
}
}
?>
    			
          </div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Bell Pepper</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			
    			<?php  
require('database_connectivity.php');
if(isset($_REQUEST["pc_id"]) && isset($_REQUEST["psc_id"])) {
$pc_id=$_REQUEST["pc_id"];
$psc_id=$_REQUEST["psc_id"];
$sql1=$conn->prepare("SELECT * FROM product_category pc,product_sub_category psc,product_details pd,stock_details sd WHERE pc.pc_id=? AND psc.psc_id=? AND pc.pc_id=pd.pc_id AND psc.psc_id=pd.psc_id AND pd.pd_id=sd.pd_id");
$sql1->bind_param("ii",$pc_id,$psc_id);
}
$sql1->execute();
$result1=$sql1->get_result();
while($row1=$result1->fetch_assoc()) {
// $pc_name=$row11["pc_name"];
?>

          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="product" style="border-color: #82ae46; border-width: 2px;">
              <a href="products_desc.php?pc_id=<?php echo $row1['pc_id']; ?>&psc_id=<?php echo $row1['psc_id']; ?>&pd_id=<?php echo $row1['pd_id']; ?>&sd_id=<?php echo $row1['sd_id']; ?>" class="img-prod">
                <img class="img-fluid" src="./admin/photos/<?php echo $row1['pd_image1']; ?>" alt="<?php echo $row1['pd_name']; ?>">

<?php  
$discount=$row1['sd_discount'];
if ($discount!=0) {
?>
  <span class="status"><?php echo $discount; ?>%</span>
<?php
}
?>

                <div class="overlay"></div>
              </a>
              <div class="text py-3 pb-4 px-3 text-center">
                <h3><a href="#"><?php echo $row1['pd_name']; ?></a></h3>
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price">

<?php  
$discount_price=$row1['sd_discount_price'];
$sale_price=$row1['sd_sale_price'];
if ($discount!=0) {
?>

  <span class="mr-2 price-dc">&#8377; <?php echo $discount_price; ?></span>

<?php  
}
?>
                      <span class="price-sale">&#8377; <?php echo $sale_price; ?></span>
                    </p>
                  </div>
                </div>
                <div class="bottom-area d-flex px-3">
                  <div class="m-auto d-flex">
                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                      <span><i class="ion-ios-menu"></i></span>
                    </a>
                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                      <span><i class="ion-ios-cart"></i></span>
                    </a>
                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                      <span><i class="ion-ios-heart"></i></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

<?php 
  }
?>
    			
    		</div>
    	</div>
    </section>



<?php require("3_newsletter.php"); ?>
<?php require("4_footer.php"); ?>
<?php require("5_footerscripts.php"); ?>

  <script>
    $(document).ready(function(){

    var quantity=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#pcd_qty').val());
            
            // If is not undefined
                
                $('#pcd_qty').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#pcd_qty').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>1){
                $('#pcd_qty').val(quantity - 1);
                }
        });
        
    });
  </script>

</body>
</html>