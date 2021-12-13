<?php
require 'layout/autoload.php';
require 'layout/header.php';
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
if(isset($_GET['search'])){
    $_SESSION['search'] = $_GET['search'];
    $search = $_SESSION['search'];
}
$products_search = new Db();
$sql_products_search = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY id DESC";
$product = new Product();

$num_result = $product->num_result($sql_products_search);
?>
<div class="san-pham">
    <center><span> Đã Tìm Thấy <?php echo $num_result ?> Sản Phẩm Với Từ khóa '<?php echo $search ?>'</span></center>
</div>
<?php
if($num_result > 0){

$product = new Db();
$p = $product->Pagination($sql_products_search,$page,3);
foreach ($p as $key_products_search => $value_products_search) {
?>
<div class="col-xs-12 col-sm-6 col-md-4">
    <div class="product">
        <center>
            <div class="product-image">
                <a href="detail.php?id_product=<?php echo $value_products_search['id'] ?>"><img
                        style="height:180px;width:180px" src="public/image/<?php echo $value_products_search['image'] ?>"
                        alt="image-product"></a>
            </div>
        </center>
        <div class="info-product">
            <div class="product-name">
                <a href="detail.php?id_product=<?php echo $value_products_search['id'] ?>">
                    <b>
                        <marquee><?php echo $value_products_search['name'] ?></marquee>
                    </b>
                </a>
            </div>
            <div class="product-price">
                <div><b>Giá Bán:</b> <s><?php echo $value_products_search['price'] ?>đ</s></div>
                <div><b>Giá KM:</b> <b style="color: #FF5622;"><?php echo $value_products_search['sale'] ?>đ</b></div>
            </div>
            <center>
                <div class="product-btn">
                    <a class="btn btn-info btn-sm" href="cart.php?id_product=<?php echo $value_products_search['id'] ?>">Mua
                        Hàng</a>
                </div>
            </center>
        </div>
    </div>
</div>
<?php
}
?>
<?php
$sql_products_search = "SELECT * FROM products WHERE name LIKE '%$search%' ORDER BY id DESC";
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
require 'layout/close.php';
require 'layout/footer.php';
?>