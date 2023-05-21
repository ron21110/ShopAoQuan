<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location ='404.php'</script>";
} else {
	$id = $_GET['proid'];
}
$customer_id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

	$productid = $_POST['productid'];
	$insertCompare = $product->insertCompare($productid, $customer_id);

}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {

	$productid = $_POST['productid'];
	$insertWishlist = $product->insertWishlist($productid, $customer_id);

}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$quantity = $_POST['quantity'];
	$insertCart = $ct->add_to_cart($quantity, $id);

}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php

			$get_product_details = $product->get_details($id);
			if ($get_product_details) {
				while ($result_details = $get_product_details->fetch_assoc()) {


					?>
					<div class="cont-desc span_1_of_2">
						<div class="grid images_3_of_2">
							<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2 style="    font-size: 1.8em;">
								<?php echo $result_details['productName'] ?>
							</h2>
							<p>
								<?php echo $fm->textShorten($result_details['product_desc'], 150) ?>
							</p>
							<div class="price">
								<p>Giá: <span>
										<?php echo $fm->format_currency($result_details['price']) . " " . "VNĐ" ?>
									</span></p>
								<p>Loại sản phẩm: <span>
										<?php echo $result_details['catName'] ?>
									</span></p>
								<p>Loại sản phẩm:<span>
										<?php echo $result_details['brandName'] ?>
									</span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1" min="1" />
									<input type="submit" class="buysubmit" name="submit" value="Mua ngay" />


								</form>

							

								<?php
								
								if (isset($insertCart)) {
									echo $insertCart;
								}
								?>
							</div>
							<div class="add-cart">
								<div class="button_details">
									<form action="" method="POST">

										<input type="hidden" name="productid"
											value="<?php echo $result_details['productId'] ?>" />


										<?php

										$login_check = Session::get('customer_login');
										if ($login_check) {
											echo '<input type="submit" class="buysubmit" name="compare" value="So sánh"/>' . '  ';

										} else {
											echo '';
										}

										?>


									</form>


									<form action="" method="POST">

										<input type="hidden" name="productid"
											value="<?php echo $result_details['productId'] ?>" />


										<?php

										$login_check = Session::get('customer_login');
										if ($login_check) {

											echo '<input type="submit" class="buysubmit" name="wishlist" value="Yêu thích">';
										} else {
											echo '';
										}

										?>



									</form>

								</div>
								<div class="clear"></div>
								<p>
									<?php
									if (isset($insertCompare)) {
										echo $insertCompare;
									}
									?>
									<?php
									if (isset($insertWishlist)) {
										echo $insertWishlist;
									}
									?>


								</p>

							</div>
							<div class="star">
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star"></span>
							<p>Đã có 35 đánh giá tốt cho sản phẩm này</p>
							</div>
						</div>
					
						<div class="product-desc">
							<h2>Thông tin chi tiết sản phẩm</h2>
							<?php echo $fm->textShorten($result_details['product_desc'], 150) ?>
						</div>

					</div>
					<?php
				}
			}
			?>
			<div class="rightsidebar span_3_of_1">
				<h2>Danh Mục</h2>
				<ul>
					<?php
					$getall_category = $cat->show_category_fontend();
					if ($getall_category) {
						while ($result_allcat = $getall_category->fetch_assoc()) {
							?>
							<li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
							<?php
						}
					}
					?>
				</ul>

			</div>
			
		</div>
		<h2 style="text-align: center; font-size: 30px; color: black; " >Sản phẩm tương tự</h2>
		<div class="section group">
			<?php
			$product_new = $product-> getproduct_new_tuongtu();
			if ($product_new) {
				while ($result_new = $product_new->fetch_assoc()) {

					?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?proid=<?php echo $result_new['productId'] ?>"><img
								src="admin/uploads/<?php echo $result_new['image'] ?>" width="280px" alt="" /></a>
						<h2>
							<?php echo $result_new['productName'] ?>
						</h2>
						<p>
							<?php echo $fm->textShorten($result_new['product_desc'], 50) ?>
						</p>
						<p><span class="price">
								<?php echo $fm->format_currency($result_new['price']) . " " . "VNĐ" ?>
							</span></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>"
									class="details">Mua ngay &nbsp<i class="fa fa-shopping-cart"></i></a></span></div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
	<?php
	include 'inc/footer.php';

	?>