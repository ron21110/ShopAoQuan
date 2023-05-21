<?php 
	include 'inc/header.php';
?>
<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php


?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3>Thông tin tài khoản</h3>
	    		</div>
	    		<div class="clear"></div>
    		</div>
			
			<table class="tblone">
				<?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
				<tr>
					<td>Tên tài khoản</td>
					<td>:</td>
					<td><?php echo $result['name'] ?></td>
				</tr>
				<tr>
					<td>Đất nước</td>
					<td>:</td>
					<td><?php echo $result['city'] ?></td>
				</tr>
				<tr>
					<td>Điện thoại</td>
					<td>:</td>
					<td><?php echo $result['phone'] ?></td>
				</tr>
			
				<tr>
					<td>Mã số thuế</td>
					<td>:</td>
					<td><?php echo $result['zipcode'] ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email'] ?></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><?php echo $result['address'] ?></td>
				</tr>
				<tr>
					<td colspan="3"><a href="editprofile.php">Cập nhật hồ sơ</a></td>
					
				</tr>
				
				<?php
					}
				}
				?>
			</table>
 		</div>
 	</div>
<?php 
	include 'inc/footer.php';
	
 ?>
