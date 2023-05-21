<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>HỖ TRỢ TRỰC TUYẾN</h3>
  				<p><span>Sẵn lòng hỗ trợ | Mọi lúc mọi nơi | Nhiệt tình và vui vẻ </br> </br> Hãy liên lạc với chúng tôi nhé !</span></p>
  				<p> RON FASHION là thương hiệu thời trang Việt Nam với mong muốn đem lại vẻ đẹp hiện đại và sự tự tin cho khách hàng, thông qua các dòng sản phẩm thời trang thể hiện cá tính và xu hướng. Một trong những “tôn chỉ” về thiết kế của RON FASHION chính là sự đa dạng, với mong muốn mang đến cho người mặc những sản phẩm phù hợp nhất với ngoại hình và quan trọng hơn cả là cá tính của chính mình.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Liên lạc với chúng tôi</h2>
					    <form>
					    	<div>
						    	<span><label>TÊN</label></span>
						    	<span><input type="text" value="" required></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value=""required></span>
						    </div>
						    <div>
						     	<span><label>SỐ ĐIỆN THOẠI</label></span>
						    	<span><input type="text" value=""required></span>
						    </div>
						    <div>
						    	<span><label>TIN NHẮN</label></span>
						    	<span><textarea > </textarea ></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="GỬI"></span>
						  </div>
						  
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Thông tin công ty :</h2>
						 <p>Tên công ty : Ron Fashion</p>   	
					
				   		<p>Số điện thoại: +84 0777547889</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>phucchuong21@gmai.com</span></p>
				   		<p>Theo dõi chúng tôi : <span>Facebook</span>, <span>Twitter</span></p>
						<div class="list_social">
						<a href=""><img src="https://pubcdn.ivymoda.com/ivy2/images/ic_fb.svg" alt=""></a>
						<img src="https://pubcdn.ivymoda.com/ivy2/images/ic_gg.svg" alt="">
						<img height="26px" src="https://pubcdn.ivymoda.com/ivy2/images/ic_instagram.svg" alt="">
						</div>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
 <script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
 <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('reCAPTCHA_site_key', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script>

<?php 
	include 'inc/footer.php';
	
 ?>
