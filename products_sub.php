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
if(isset($_REQUEST["pc_id"]) && isset($_REQUEST["psc_id"])) {
$pc_id=$_REQUEST["pc_id"];
$psc_id=$_REQUEST["psc_id"];
$sql2=$conn->prepare("SELECT * FROM product_category pc,product_sub_category psc WHERE pc.pc_id=? AND psc.psc_id=?");
$sql2->bind_param("ii",$pc_id,$psc_id);
} 
$sql2->execute();
$result2=$sql2->get_result();
$row2=$result2->fetch_assoc()
?>

          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="shop.php">Menu</a></span> <span class="mr-2"><a href="products.php?pc_id=<?php echo $row2['pc_id']; ?>" style="font-size: 12px;"><?php echo $row2['pc_name']; ?></a></span></p>
            <h1 class="mb-0 bread"><?php echo $row2['psc_name']; ?></h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-10 mb-5 text-center">
            <ul class="product-category">

<?php  
require('database_connectivity.php');
if(isset($_REQUEST["pc_id"]) && isset($_REQUEST["psc_id"])) {
$pc_id=$_REQUEST["pc_id"];
$psc_id=$_REQUEST["psc_id"];
$sql=$conn->prepare("SELECT * FROM product_category pc,product_sub_category psc WHERE pc.pc_id=? AND psc.psc_id=?");
$sql->bind_param("ii",$pc_id,$psc_id);
}
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();

if ($psc_id==1) {
?>

              <li><a href="products.php?pc_id=<?php echo $row['pc_id']; ?>">All</a></li>
              <li><a href="#" class="active">Veg</a></li>
              <li><a href="products_sub.php?pc_id=<?php echo $pc_id; ?>&psc_id=2">Non Veg</a></li>

<?php              
} elseif ($psc_id==2) {
?>

              <li><a href="products.php?pc_id=<?php echo $row['pc_id']; ?>">All</a></li>
              <li><a href="products_sub.php?pc_id=<?php echo $pc_id; ?>&psc_id=1">Veg</a></li>
              <li><a href="#" class="active">Non Veg</a></li>

<?php
}
?>
  
            </ul>
          </div>
        </div>

        <div class="row">

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