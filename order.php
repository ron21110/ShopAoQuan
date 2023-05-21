<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	
		$login_check = Session::get('customer_login'); 
		if($login_check==false){
			header('Location:login.php');
		}

?>
<style>
	
	.order_page {
    font-size: 30px;
    font-weight: bold;
    color: red;
}
.order_page a {
	color: red;
	text-decoration: none;
	transition:0.3s all ease ;

}
.order_page a:hover {
	transform: scale(1.2);
	color: purple;
	text-decoration: none;
}
</style>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    <div class="order_page">
			    	<a href="cart.php">TIẾP TỤC MUA SẮM</a>
			    </div>
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'inc/footer.php';
	
 ?>
