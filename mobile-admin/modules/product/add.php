<base href="../../">
<?php
$open = "product";
$title = "Thêm Sản Phẩm";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/category.php';
require '../../../modules/manufactures.php';
require '../../../modules/product.php';

if(isset($_POST['add_product']) && isset($_POST['name_product']) && isset($_POST['price_product']) && isset($_POST['desc_product'])){
    $name_product = $_POST['name_product']; 
    $price_product = $_POST['price_product'];
    $price_sale = $_POST['price_sale'];
    $manu_product = $_POST['manu'];
    $cate_product = $_POST['cate'];
    $desc_product = $_POST['desc_product'];

    $product = new Product();
    $product->AddProduct('img_product',$name_product,$price_product,$price_sale,$desc_product,$manu_product,$cate_product);  
}
require '../../layout/header.php';
?>
<script src="ckeditor/ckeditor.js"></script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $title ?>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Sản Phẩm / <?php echo $title ?>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h3><?php echo $title ?></h3>
            </div>

            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" name="name_product" class="form-control" placeholder="Tên Sản Phẩm"
                                    value="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" name="img_product" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá </label>
                                <input type="text" name="price_product" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá Khuyến Mãi </label>
                                <input type="text" name="price_sale" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hãng SX </label>
                                <?php 
                                
                                ?>
                                <select name="manu" id="" class="form-control" required>
                                    <?php 
                                    $manufactures = new Mamufactures();
                                    $manu = $manufactures->getAllManu();
                                    foreach ($manu as $key_manu => $value_manu) {
                                        # code...
                                    ?>
                                    <option value="<?php echo $value_manu['manu_id'] ?>">
                                        <?php echo $value_manu['manu_name'] ?></option>
                                    <?php 
                                }  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Danh Mục </label>
                                <select name="cate" id="" class="form-control" required>
                                    <?php 
                                    $category = new Category();
                                    $cate = $category->getAllCate();
                                    foreach ($cate as $key_cate => $value_cate) {
                                    ?>
                                    <option value="<?php echo $value_cate['cate_id'] ?>">
                                        <?php echo $value_cate['cate_name'] ?></option>
                                    <?php }
                                     ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả: </label>
                        <textarea name="desc_product" id="" class="form-control" rows="10"></textarea>
                        <script>
                        CKEDITOR.replace('desc_product');
                        </script>

                    </div>
                    <input type="submit" name="add_product" value="<?php echo $title ?>"
                        class="form-control btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require '../../layout/footer.php';