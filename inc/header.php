<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/1506a15508.js" crossorigin="anonymous"></script>
<?php

include 'lib/session.php';
Session::init();
?>
<?php
ob_start();
include 'lib/database.php';
include 'helpers/format.php';

spl_autoload_register(function ($class) {
	include_once "classes/" . $class . ".php";
});


$db = new Database();
$fm = new Format();
$ct = new cart();
$us = new user();
$cat = new category();
$cs = new customer();
$product = new product();


?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>

<head>
	<link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/1198/1198307.png">

	<title>Ron Fashion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquerymain.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		$(document).ready(function ($) {
			$('#dc_mega-menu-orange').dcMegaMenu({ rowItems: '4', speed: 'fast', effect: 'fade' });
		});
	</script>
</head>

<body>
	<style>
		.logo img {
			width: 150px;
		}
	</style>
	<div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img style="width: 430px;height: 160px;"
						src="https://incucdep.com/wp-content/uploads/2014/12/logo-thoi-trang.jpg" alt=""></a>
			</div>
			<div class="imagesheader">
				<img style="width: 430px;height: 160px;"
					src="https://pubcdn.ivymoda.com/files/news/2023/04/05/7249e100ac1616a3fa09a35ad4dd41e7.jpg" alt="">
				<img style="width: 430px;height: 160px;"
					src="https://pubcdn.ivymoda.com/files/news/2023/04/05/b717849772c04fb5501656aeb5b5bae9.jpg" alt="">
				<img style="width: 430px;height: 160px;"
					src="https://pubcdn.ivymoda.com/files/news/2023/04/05/22dc6847d3f44398d87ce2e5eb841560.jpg" alt="">

			</div>

			<div class="sale">
				<div class="sale70"><a href=""><span>SALE 70%</span></a></div>
				<div class="sale80"><a href=""><span>SALE 80%</span></a></div>
				<div class="sale90"> <a href=""><span>SALE 90%</span></a></div>



			</div>
			<div class="header_top_right">
				<div class="search_box">
					<form action="search.php" method="post">
						<input type="text" placeholder="TÌM KIẾM " name="tukhoa">
						<input type="submit" name="search_product" value="Tìm kiếm">
						<i class="fa fa-search"></i>
					</form>
				</div>

				<!--  cart -->
				<div style="position: relative;" class="shopping_cart">
					<div style="height: 44.7px;padding: 0 0 0 1px; width: 220px;" class="cart">
						<img style="height: 40px; width: 50px; "
							src="https://png.pngtree.com/png-vector/20191124/ourlarge/pngtree-shopping-cart-icon-simple-png-image_2028930.jpg"
							alt="">

						<a style="height: 42.7px ;" href="cart.php" title="" rel="nofollow">
							<span style="    width: 100%;margin-top: 12px;font-size: 13px;font-weight: bold;color: orchid;position: absolute;" class="no_product">

								<?php
								$check_cart = $ct->check_cart();
								if ($check_cart) {
									$sum = Session::get("sum");
									$qty = Session::get("qty");
									echo $fm->format_currency($sum) . ' ' . 'Đ' . '-' . 'Mặt hàng:' . $qty;
								} else {
									echo 'Trống';
								}

								?>

							</span>
						</a>
					</div>
				</div>
				<?php
				if (isset($_GET['customer_id'])) {
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					$delCompare = $ct->del_compare($customer_id);
					Session::destroy();
				}
				?>
				<div class="login">
					<?php
					$login_check = Session::get('customer_login');
					if ($login_check == false) {
						echo '<a href="dangnhap.php"> <i class="fa-solid fa-user"></i>

					Đăng nhập </a> </div>';








					} else {
						echo '<a href="?customer_id=' . Session::get('customer_id') . '"><i class="fa-solid fa-user"></i> Đăng xuất</a></div>';
					}
					?>

					<!-- đăng ký -->
					<div class="dangky">
						<?php
						$login_check = Session::get('customer_login');
						if ($login_check == false) {
							echo '<a href="dangky.php" style="color: lightcoral;"  > 

						&#9997 Đăng ký </a> </div>';








						} else {
							echo '<button style= ><i class="	fa fa-bell" style="font-size:35px;color:purple"></i></button>';

						}

						?>

					</div>


					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>

			<!-- phần menu dưới !!! -->
			<div class="menu">
				<ul id="dc_mega-menu-orange" class="dc_mm-orange">
					<li><a href="index.php">Trang chủ <i class="fa fa-home"></i>
						</a></li>
					<!-- <li><a href="products.php">Sản phẩm</a> </li> -->
					<li><a href="map.php">Địa điểm <i class="fa fa-map"></i>
						</a></li>
					<!-- <li><a href="login.php">Giỏ Hàng</a></li> -->





					<?php
					$check_cart = $ct->check_cart();
					if ($check_cart == true) {
						echo '<li><a href="cart.php">Giỏ Hàng <i class="fa fa-shopping-cart"></i>
						</a></li>';
					} else {
						echo '';
					}
					?>

					<?php
					$customer_id = Session::get('customer_id');
					$check_order = $ct->check_order($customer_id);
					if ($check_order == true) {
						echo '<li><a href="orderdetails.php">Lịch sử đơn hàng <i class="fa fa-history"></i>
						</a></li>';
					} else {
						echo '';
					}
					?>

					<?php
					$login_check = Session::get('customer_login');
					if ($login_check == false) {
						echo '';
					} else {
						echo '<li><a href="profile.php">Tài Khoản <i class="fa fa-user-circle"></i>
						</a> </li>';
					}
					?>
					<?php

					$login_check = Session::get('customer_login');
					if ($login_check) {
						echo '<li><a href="compare.php">So Sánh <i class="fa fa-balance-scale"></i>
						</a> </li>';
					}

					?>
					<?php

					$login_check = Session::get('customer_login');
					if ($login_check) {
						echo '<li><a href="wishlist.php">Danh sách yêu thích <i class="fa fa-heart"></i>
						</a> </li>';
					}

					?>


					<li><a href="contact.php">Liên hệ <i class="fa fa-mobile"></i>
						</a> </li>
						<li><a href="about.php">Về chúng tôi <i class="fa fa-info-circle"></i>
						</a> </li>
					<div class="clear"></div>
				</ul>
			</div>