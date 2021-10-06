<!DOCTYPE html>
<html>

<?php require("1_metatags.php"); ?>

<body class="goto-here">

<?php require("2_header.php"); ?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="#" style="font-size: 12px;">Menu</a></span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <br>
    <br>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">

<?php
require('database_connectivity.php');
$sql=$conn->prepare("SELECT * FROM product_category ORDER BY pc_id ASC");  
$sql->execute();
$result=$sql->get_result();
//$count=$result->num_rows;//For Pagination     
while($row=$result->fetch_assoc()){
?>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(./admin/photos/<?php echo $row['pc_image']; ?>);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="products.php?pc_id=<?php echo $row['pc_id']; ?>"><?php echo $row['pc_name']; ?></a></h2>
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

</body>
</html>