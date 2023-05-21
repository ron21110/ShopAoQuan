<?php
include 'inc/header.php';

?>
<?php
$login_check = Session::get('customer_login');
if ($login_check) {
    header('Location:order.php');
}
?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $insertCustomers = $cs->insert_customers($_POST);

}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

    $login_Customers = $cs->login_customers($_POST);

}
?>
<div class="dangkycontainer">

<div class="register_account">
            <h3>Đăng ký thành viên mới</h3>
            <?php
            if (isset($insertCustomers)) {
                echo $insertCustomers;
            }
            ?>

            <!-- Đăng ký -->
            <form action="" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="name" placeholder="Tên tài khoản...">
                                </div>

                                <div>
                                    <input type="text" name="city" placeholder="Đất nước...">
                                </div>

                                <div>
                                    <input type="text" name="zipcode" placeholder="Mã số thuế...">
                                </div>
                                <div>
                                    <input type="text" name="email" placeholder="Email...">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="address" placeholder="Địa chỉ...">
                                </div>
                                <div>
                                    <select id="country" name="country" onchange="change_country(this.value)"
                                        class="frm-field required">
                                        <option value="null">Chọn thành phố</option>
                                        <option value="dn">Huế</option>
                                        <option value="hcm">TPHCM</option>
                                        <option value="hn">Hà Nội</option>
                                        <option value="dn">Đà Nẳng</option>
                                        <option value="dn">Cần Thơ</option>
                                        <option value="dn">Quảng Bình</option>
                                        <option value="dn">Quảng Trị</option>
                                        <option value="dn">Khác</option>







                                    </select>
                                </div>

                                <div>
                                    <input type="text" name="phone" placeholder="Số điện thoại...">
                                </div>

                                <div>
                                    <input type="text" name="password" placeholder="Mật khẩu...">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div><input type="submit" name="submit" class="grey" value="Đăng ký mới"></div>
                </div>
                <p class="terms">Bằng cách nhấp vào ' Nút Đăng ký mới ', bạn đồng ý với <a href="#">Điều khoản &amp;
                        Điều kiện</a>.</p>
                <div class="clear"></div>
            </form>
        </div>
        <div class="anhdangky">
    <img  src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" alt="">
</div>
        
        <div class="clear"></div>
    </div>
</div>

<?php
include 'inc/footer.php';

?>