<?php
include 'inc/header.php';
// include 'inc/slider.php';
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

<div class="main dangnhapcontainer ">
    <div class="content">
        <div class="login_panel">
            <h1>Đăng nhập </h1>
            <?php
            if (isset($login_Customers)) {
                echo $login_Customers;
            }
            ?>
            <form action="" method="post">
                <input type="text" name="email" class="field" placeholder=" Email....">
                <input type="password" name="password" class="field" placeholder=" Password....">

                <p class="note">Đăng ký tài khoản nhấp vào  <a href="dangky.php">đây</a></p>
                <div class="buttons dangnhap">
                    <div><input type="submit" name="login" class="grey" value="Đăng nhập"></div>
                </div>
            </form>
        </div>
        <?php

        ?>
      
        <div class="clear"></div>
    </div>
</div>

<?php
include 'inc/footer.php';

?>