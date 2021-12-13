
<?php
require 'layout/autoload.php';
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
if(!isset($_GET['name_cate'])){
    header('location:index.php');
}else{
    require 'layout/header.php';
    if(isset($_GET['name_manu'])){
        $manu_name = $_GET['name_manu'];
        $cate_name = $_GET['name_cate'];
        $sql_products_search = "SELECT * FROM products,manufactures,category 
        WHERE (products.manu_id=manufactures.manu_id AND products.cate_id=category.cate_id 
        AND manufactures.manu_name='$manu_name' AND category.cate_name='$cate_name')";
    }else{
        $cate_name = $_GET['name_cate'];
        $sql_products_search = "SELECT * FROM products,manufactures,category 
        WHERE (products.manu_id=manufactures.manu_id AND products.cate_id=category.cate_id 
        AND category.cate_name='$cate_name')";
    }

    $product = new Product();
    $num_result = $product->num_result($sql_products_search);

    ?>
        
    <div class="col-md-12">
        <div class="san-pham">
            <span><?php echo $_GET['name_cate'] ;if(isset($_GET['name_manu'])) echo " - ". $_GET['name_manu']?> - Tìm Thấy <?php echo $num_result; ?> Sản Phẩm</span>
        </div>
    </div>
    <?php
    $name_cate = $_GET['name_cate'];
    if(isset($_GET['name_manu'])){
        $product = new Db();
        $p = $product->Pagination($sql_products_search,$page,3);
        if(count($p) > 0){
            foreach ($p as $key => $value_cate_manu) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="product">
                        <center>
                            <div class="product-image">
                                <a href="detail.php?id_product=<?php echo $value_cate_manu['id'] ?>"><img
                                        style="height:180px;width:180px" src="public/image/<?php echo $value_cate_manu['image'] ?>"
                                        alt="image-product"></a>
                            </div>
                        </center>
                        <div class="info-product">
                            <div class="product-name">
                                <a href="detail.php?id_product=<?php echo $value_cate_manu['id'] ?>">
                                    <b>
                                        <marquee><?php echo $value_cate_manu['name'] ?></marquee>
                                    </b>
                                </a>
                            </div>
                            <div class="product-price">
                                <div><b>Giá Bán:</b> <s><?php echo $value_cate_manu['price'] ?>đ</s></div>
                                <div><b>Giá KM:</b> <b style="color: #FF5622;"><?php echo $value_cate_manu['sale'] ?>đ</b></div>
                            </div>
                            <center>
                                <div class="product-btn">
                                    <a class="btn btn-info btn-sm" href="cart.php?id_product=<?php echo $value_cate_manu['id'] ?>">Mua
                                        Hàng</a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="col-md-12">
                <center>
                <?php 
                $product->numPagination1($sql_products_search,$page,3);
                ?>
                </center>
                </div>
            <?php
        }
    }else
        {
            
            $product = new Db();
            $p = $product->Pagination($sql_products_search,$page,3);
            if(count($p) > 0){
                foreach ($p as $key => $value_cate) {
                ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="product">
                        <center>
                            <div class="product-image">
                                <a href="detail.php?id_product=<?php echo $value_cate['id'] ?>"><img
                                        style="height:180px;width:180px" src="public/image/<?php echo $value_cate['image'] ?>"
                                        alt="image-product"></a>
                            </div>
                        </center>
                        <div class="info-product">
                            <div class="product-name">
                                <a href="detail.php?id_product=<?php echo $value_cate['id'] ?>">
                                    <b>
                                        <marquee><?php echo $value_cate['name'] ?></marquee>
                                    </b>
                                </a>
                            </div>
                            <div class="product-price">
                                <div><b>Giá Bán:</b> <s><?php echo $value_cate['price'] ?>đ</s></div>
                                <div><b>Giá KM:</b> <b style="color: #FF5622;"><?php echo $value_cate['sale'] ?>đ</b></div>
                            </div>
                            <center>
                                <div class="product-btn">
                                    <a class="btn btn-info btn-sm" href="cart.php?id_product=<?php echo $value_cate['id'] ?>">Mua
                                        Hàng</a>
                                </div>
                            </center>
                        </div>
                    </div>
                    
                </div>
                <?php
                }
                ?>
                <div class="col-md-12">
                <center>
                <?php 
                $product->numPagination1($sql_products_search,$page,3);
                ?>
                </center>
                </div>
            <?php
            }else{
            ?>
            <center><div class="error">
                Không Có Sản Phẩm Trong Danh Mục Này!!!
            </div></center>
            <?php
            }
            
        }
    }
require 'layout/close.php';
require 'layout/footer.php';
?>