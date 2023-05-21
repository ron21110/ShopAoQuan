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
<?php

	
?>
<style>
	h3.payment {
    text-align: center;
    font-size: 25px;
    font-weight: bold;
	}
	.wrapper_method {
	text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    /* margin: 20px; */
    background: honeydew;
	}
	.wrapper_method a {
    padding: 10px;
  
    background: red;
    color: #fff;
	text-decoration: none;
    
	}
	.wrapper_method a:hover{
		background-color: violet;
	}
	.wrapper_method h3 {
   	 margin-bottom: 20px;
	}
	.wrapper_method a:hover{
		background-color: violet;
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3 style="font-size: 35px;" >Phương thức thanh toán</h3>
	    		</div>
	    		
	    		<div class="clear"></div>
	    		<div class="wrapper_method">
		    		<h3 class="payment">Hãy chọn phương thức thanh toán</h3>
		    		<a href="offlinepayment.php">Thanh toán trực tiếp</a><br> <br> <br>
					<a href="onlinepayment.php">Thanh toán qua APP</a><br> <br> <br>
		    		<a style="background:grey" href="cart.php"> << Quay lại</a>
		    	</div>
    		</div>
		
 		</div>
 	</div>
<?php 
	include 'inc/footer.php';
	
 ?>
