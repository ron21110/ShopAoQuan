<?php
include 'inc/header.php';

include 'inc/slider.php';
?>
<div class="main">

    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Sản phẩm nổi bật</h3>
                <div class="danhmucheader">
                    <ul>
                        <?php
						$getall_category = $cat->show_category_fontend();
						if ($getall_category) {
							while ($result_allcat = $getall_category->fetch_assoc()) {
								?>
                        <li><a
                                href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a>
                        </li>
                        <?php
							}
						}
						?>
                    </ul>

                </div>


                <div class="danhmucsanpham"></div>


            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
			$product_feathered = $product->getproduct_feathered();
			if ($product_feathered) {
				while ($result = $product_feathered->fetch_assoc()) {

					?>
            <div class="grid_1_of_4 images_1_of_4">
                <div class="info-ticket seller">Best Seller</div>

                <a href="details.php?proid=<?php echo $result['productId'] ?>"><img
                        src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                <h2>
                    <?php echo $result['productName'] ?>
                </h2>
                <p>
                    <?php echo $fm->textShorten($result['product_desc'], 50) ?>
                </p>
                <p><span class="price">
                        <?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?>
                    </span></p>
                <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>"
                            class="details">Mua ngay &nbsp<i class="fa fa-shopping-cart"></i></a></span></div>
            </div>
            <?php
				}
			}
			?>
        </div>
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm mới</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php
			$product_new = $product->getproduct_new();
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
</div>
<div class="phantrang">

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Trang chủ </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>


<?php
include 'inc/footer.php';

?>