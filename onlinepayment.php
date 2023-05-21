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
	    		<h3 style="font-size: 35px;" >Thanh toán qua app</h3>
	    		</div>
	    		<br>
	    		<div class="clear"></div>
	    		<div class="wrapper_method">
		    		<h3 class="payment">Hãy chọn cổng thanh toán</h3>
		    		<form action="donhangthanhtoanonline.php?congthanhtoan=vnpay" method="post" >
                        <button class="btn VNPAY"  name="redirect" id="redirect">Thanh toán VNPAY</button> <br>	<br>	
                    </form>
		    		<a style="background:grey" href="cart.php"> << Quay lại</a>
		    	</div>
    		</div>
		
 		</div>
 	</div>
<?php 
	include 'inc/footer.php';
	
 ?>
