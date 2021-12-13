<div class="content">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="new-product">
                    <div class="col-md-12">
                        <div class="san-pham">
                            <span>Sản Phẩm Hot</span>
                        </div>
                    </div>
                    <?php 
                    $product = new Product();
                    $hotProduct = $product->getHotProductByNum(4);
                    foreach ($hotProduct as $key => $value_hot_product) {
                    ?>
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="product">
                            <center>
                                <div class="product-image">
                                    <a href="detail.php?id_product=<?php echo $value_hot_product['id'] ?>"><img
                                            style="height:180px;width:180px"
                                            src="public/image/<?php echo $value_hot_product['image'] ?>"
                                            alt="image-product"></a>
                                </div>
                            </center>
                            <div class="info-product">
                                <div class="product-name">
                                    <a href="detail.php?id_product=<?php echo $value_hot_product['id'] ?>">
                                        <b>
                                            <marquee><?php echo $value_hot_product['name'] ?></marquee>
                                        </b>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <div><b>Giá Bán:</b> <s><?php echo $value_hot_product['price'] ?>đ</s></div>
                                    <div><b>Giá KM:</b> <b
                                            style="color: #FF5622;"><?php echo $value_hot_product['sale'] ?> đ</b></div>
                                </div>
                                <center>
                                    <a class="btn btn-info btn-sm"
                                        href="cart.php?id_product=<?php echo $value_hot_product['id'] ?>">Mua Hàng</a>
                                </center>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="content">
                <div class="new-product">
                    <div class="col-md-12">
                        <div class="san-pham">
                            <span>Sản Phẩm Mới</span>
                        </div>
                    </div>
                    <?php 
                    $product = new Product();
                    $hotProduct = $product->getNewProductByNum(4);
                    foreach ($hotProduct as $key => $value_hot_product) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="product">
                            <center>
                                <div class="product-image">
                                    <a href="detail.php?id_product=<?php echo $value_hot_product['id'] ?>"><img
                                            style="height:180px;width:180px"
                                            src="public/image/<?php echo $value_hot_product['image'] ?>"
                                            alt="image-product"></a>
                                </div>
                            </center>
                            <div class="info-product">
                                <div class="product-name">
                                    <a href="detail.php?id_product=<?php echo $value_hot_product['id'] ?>">
                                        <b>
                                            <marquee><?php echo $value_hot_product['name'] ?></marquee>
                                        </b>
                                    </a>
                                </div>
                                <div class="product-price">
                                    <div><b>Giá Bán:</b> <s><?php echo $value_hot_product['price'] ?>đ</s></div>
                                    <div><b>Giá KM:</b> <b
                                            style="color: #FF5622;"><?php echo $value_hot_product['sale'] ?> đ</b></div>
                                </div>
                                <center>
                                    <a class="btn btn-info btn-sm"
                                        href="cart.php?id_product=<?php echo $value_hot_product['id'] ?>">Mua Hàng</a>
                                </center>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>