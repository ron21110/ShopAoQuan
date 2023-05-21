<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php
if (isset($_GET['cartid'])) {
	$cartid = $_GET['cartid'];
	$delcart = $ct->del_product_cart($cartid);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
	$update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
	if ($quantity <= 0) {
		$delcart = $ct->del_product_cart($cartId);
	}
}
?>
<?php
// if (!isset($_GET['id'])) {
// 	echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
// }
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
                <?php
                if (isset($_GET['congthanhtoan'])=='vnpay') {

                ?>
				<h2>Thanh toán bằng VNPAY</h2>
                <?php } ?>
				<?php
				if (isset($update_quantity_cart)) {
					echo $update_quantity_cart;
				}
				?>
				<?php
				if (isset($delcart)) {
					echo $delcart;
				}
				?>
				<table class="tblone">
					<tr>

						<th width="20%">Tên sản phẩm</th>
						<th width="10%">Ảnh</th>
						<th width="15%">Tạm tính</th>
						<th width="25%">Số lượng</th>
						<th width="20%">Giá </th>
						<th width="10%"></th>
					</tr>
					<?php
					$get_product_cart = $ct->get_product_cart();
					if ($get_product_cart) {
						$subtotal = 0;
						$qty = 0;
						while ($result = $get_product_cart->fetch_assoc()) {
							?>
							<tr>
								<td>
									<?php echo $result['productName'] ?>
								</td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></td>
								<td>
									<?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?>
								</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>" />
										<input type="number" name="quantity" min="0"
											value="<?php echo $result['quantity'] ?>" />
										<input type="submit" name="submit" value="Cập nhật" />
									</form>
								</td>
								<td>
									<?php
									$total = $result['price'] * $result['quantity'];
									echo $fm->format_currency($total) . " " . "VNĐ";
									?>
								</td>
								<td><a onclick="return confirm('Are you want to delete?');"
										href="?cartid=<?php echo $result['cartId'] ?>">Xóa</a></td>
							</tr>
							<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
						}
					}
					?>

				</table>
				<?php
				$check_cart = $ct->check_cart();
				if ($check_cart) {
					?>
					<table style=" float:right;text-align:left; font-size: 20px;" width="43%">
						<tr>
							<th>Tạm tính : </th>
							<td>
								<?php

								echo $fm->format_currency($subtotal) . " " . "VNĐ";
								Session::set('sum', $subtotal);
								Session::set('qty', $qty);
								?>
							</td>
						</tr>
						<tr>
							<th>Thuế VAT : </th>
							<td>10%</td>
						</tr>
						<tr>
							<th style="font-weight: bold;">Tổng tiền :</th>
							<td style="font-weight:bold">
								<?php

								$vat = $subtotal * 0.1;
								$gtotal = $subtotal + $vat;
								echo $fm->format_currency($gtotal) . " " . "VNĐ";
								?>
							</td>
						</tr>
					</table>
					<?php
				} else {
					echo 'Không có sản phẩm trong giỏ hàng! ';
				}
				?>


			</div>
			<div class="shopping">
				
					<div class="shopleft">
						<form action="index.php">
							<input type="submit" value="Tiếp tục mua sắm" >
						</form>

					</div>
                    <?php
                if (isset($_GET['congthanhtoan'])=='vnpay') {

                ?>
				</div>
				<div class="shopright">
                <form action="congthanhtoan.php" method="post" >
                    <input type="hidden" name="total_congthanhtoan" value="<?php echo $gtotal ?>" >
                        <button class="btn VNPAY"  name="redirect" id="redirect">Thanh toán VNPAY</button> <br>	<br>	
                    </form>
                    <?php } ?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php
include 'inc/footer.php';

?>