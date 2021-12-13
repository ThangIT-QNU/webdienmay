<base href="../../">
<?php
$id = $_GET['id'];
$open = "product";
$title = "Sửa Sản Phẩm";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/category.php';
require '../../../modules/manufactures.php';
require '../../../modules/product.php';
if(isset($_GET['id'])){
    $id_product = $_GET['id'];
    $products = new Product();
    $getProduct = $products->getProductById($id_product);
    foreach($getProduct as $key_product=>$value_product){
        $img = $value_product['image'];
        $name_product = $value_product['name'];
        $price = $value_product['price'];
        $sale = $value_product['sale'];
        $desc = $value_product['description'];
        $manu_id = $value_product['manu_id'];
        $cate_id = $value_product['cate_id'];
    }
}else{
    header('location:index.php');
}
if(isset($_POST['edit_product'])){
    $img1 = 'img_product';
    $size_img = $_FILES[$img1]['size'];
    $name1 = $_POST['name_product'];
    $price1 = $_POST['price_product'];
    $sale1 = $_POST['price_sale'];
    $cate_id1 = $_POST['cate'];
    $manu_id1 = $_POST['manu'];
    $desc1 = $_POST['desc_product'];
    $products = new Product();
    $products->updateProductById($id_product,$img1,$size_img,$name1,$price1,$sale1,$desc1,$manu_id1,$cate_id1);
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
                                    value="<?php if(isset($_POST['name_product'])) echo $_POST['name_product'];else echo  $name_product ?>"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Sửa Hình Ảnh</label>
                                <input type="file" name="img_product" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <img width="100%" src="../public/image/<?php echo $img ?>" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá </label>
                                <input type="text"
                                    value="<?php if(isset($_POST['price_product'])) echo $_POST['price_product'];else echo  $price ?>"
                                    name="price_product" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Giá Khuyến Mãi </label>
                                <input type="text"
                                    value="<?php if(isset($_POST['price_sale'])) echo $_POST['price_sale'];else echo  $sale ?>"
                                    name="price_sale" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hãng SX </label>
                                <?php 
                                $manufactures = new Mamufactures();
                                $manu_name = $manufactures->getManuNameById($manu_id);
                                ?>
                                <select name="manu" id="" class="form-control" required>
                                    <option value="<?php echo $manu_id ?>"><?php echo $manu_name ?></option>
                                    <?php
                                        $manu = $manufactures->getAllManu();
                                        foreach ($manu as $key_manu => $value_manu) {
                                    ?>
                                    <option value="<?php echo $value_manu['manu_id'] ?>">
                                        <?php echo $value_manu['manu_name'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Danh Mục </label>
                                <?php 
                                $category = new Category();
                                $cate_name = $category->getCateNameById($cate_id);
                                ?>
                                <select name="cate" id="" class="form-control" required>
                                    <option value="<?php echo $cate_id ?>"><?php echo $cate_name ?></option>
                                    <?php 
                                    $getAllCate = $category->getAllCate();
                                    foreach ($getAllCate as $key_cate => $value_cate) {
                                    ?>
                                    <option value="<?php echo $value_cate['cate_id'] ?>">
                                        <?php echo $value_cate['cate_name'] ?></option>
                                    <?php 
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả: </label>

                        <textarea required name="desc_product" id="" class="form-control"
                            rows="10"><?php if(isset($_POST['desc_product'])) echo $_POST['desc_product'];else echo $desc ?></textarea>
                        <script>
                        CKEDITOR.replace('desc_product');
                        </script>

                    </div>
                    <input type="submit" name="edit_product" value="<?php echo $title ?>"
                        class="form-control btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require '../../layout/footer.php';