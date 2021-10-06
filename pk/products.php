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
if(isset($_REQUEST["pc_id"])) {
$pc_id=$_REQUEST["pc_id"];
$sql2=$conn->prepare("SELECT * FROM product_category WHERE pc_id=?");
$sql2->bind_param("i",$pc_id);
}  
$sql2->execute();
$result2=$sql2->get_result();
$row2=$result2->fetch_assoc()
?>

          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="shop.php" style="font-size: 12px;">Menu</a></span></p>
            <h1 class="mb-0 bread"><?php echo $row2['pc_name']; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">

    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>

<?php
require('database_connectivity.php');
if(isset($_REQUEST["pc_id"])) {
$pc_id=$_REQUEST["pc_id"];
$sql=$conn->prepare("SELECT * FROM product_category pc,product_sub_category psc WHERE pc.pc_id=? ORDER BY psc.psc_id ASC");  
$sql->bind_param("i",$pc_id);
}
$sql->execute();
$result=$sql->get_result();  
while ($row=$result->fetch_assoc()) {
?>

    					<li><a href="products_sub.php?pc_id=<?php echo $pc_id; ?>&psc_id=<?php echo $row['psc_id']; ?>"><?php echo $row['psc_name']; ?></a></li>

<?php 
    }
?>                        

    				</ul>
    			</div>
    		</div>

    		<div class="row">

<?php  
if(isset($_REQUEST["pc_id"])) {
$pc_id=$_REQUEST["pc_id"];
$sql1=$conn->prepare("SELECT * FROM product_category pc,product_details pd,stock_details sd WHERE pc.pc_id=? AND pc.pc_id=pd.pc_id AND pd.pd_id=sd.pd_id");
$sql1->bind_param("i",$pc_id);
}
$sql1->execute();
$result1=$sql1->get_result();
while($row1=$result1->fetch_assoc()) {
// $pc_name=$row11["pc_name"];
?>

    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product" style="border-color: rgb(130,174,70); border-width: 2px;">
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
if ($discount!=0) {
?>

	<span class="mr-2 price-dc">&#8377; <?php echo $row1['sd_unit_price']; ?></span>

<?php  
}
?>
		    							<span class="price-sale">&#8377; <?php echo $row1['sd_sale_price']; ?></span>
		    						</p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="products_desc.php?pc_id=<?php echo $row1['pc_id']; ?>&psc_id=<?php echo $row1['psc_id']; ?>&pd_id=<?php echo $row1['pd_id']; ?>&sd_id=<?php echo $row1['sd_id']; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
                                    
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">

<form method="post" action="cart_add.php">
<input type="hidden" name="pd_id" id="pd_id" value="<?php echo $row1['pd_id']; ?>">
<input type="hidden" name="pd_name" id="pd_name" value="<?php echo $row1['pd_name']; ?>">
<input type="hidden" name="pcd_qty" id="pcd_qty" value="1">
<input type="hidden" name="sd_unit_price" id="sd_unit_price" value="<?php echo $row1['sd_unit_price']; ?>">
<input type="hidden" name="sd_discount" id="sd_discount" value="<?php echo $row1['sd_discount']; ?>">
<input type="hidden" name="sd_discount_price" id="sd_discount_price" value="<?php echo $row1['sd_discount_price']; ?>">
<input type="hidden" name="sd_sale_price" id="sd_sale_price" value="<?php echo $row1['sd_sale_price']; ?>">
<input type="hidden" name="cart_page" id="cart_page" value="1">

	    								<button type="submit"><span><i class="ion-ios-cart"></i></span></button>

</form>

	    							</a>
	    							<!-- <a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a> -->
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>

<?php 
	}
?>

    		</div>
    		<!-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> -->
    	</div>
    </section>

<?php require("3_newsletter.php"); ?>
<?php require("4_footer.php"); ?>
<?php require("5_footerscripts.php"); ?>

</body>
</html>