<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:login.php');
}
?> <?php
$open = "product";
$title = "Thêm Sản Phẩm";
require '../config/database.php';
require '../modules/db.php';
require '../modules/category.php';
require '../modules/manufactures.php';
require '../modules/product.php';

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

?>
<script src="ckeditor/ckeditor.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang Admin<?php if(isset($title)) echo " || ". $title ?></title>
    <!-- icon -->
    <link rel="shortcut icon" href="https://v1study.com/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../public/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/styles.css">
    <!-- Morris Charts CSS -->
    <link href="../public/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Xin Chào Admin

                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i>
                        <?php if(isset($_SESSION['login'])) echo $_SESSION['login'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Đăng Xuất</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="<?php if($open == "home") echo "active"?>">
                        <a href="index.php"><i class="fa fa-dashboard"></i> Trang Chủ</a>
                    </li>
                    <li class="<?php if($open == "order") echo "active"?>">
                        <a href="modules/order/index.php"><i class="fa fa-shopping-cart"></i> Đơn Hàng</a>
                    </li>
                    <li class="<?php if($open == "category") echo "active"?>">
                        <a href="modules/category/index.php"><i class="fa fa-book"></i> Danh Mục</a>
                    </li>
                    <li class="<?php if($open == "manufacture") echo "active"?>">
                        <a href="modules/manufactures/index.php"><i class="fa fa-book"></i> Loại Danh Mục</a>
                    </li>

                    <li class="<?php if($open == "product") echo "active"?>">
                        <a href="modules/product/index.php"><i class="fa fa-database"></i> Sản Phẩm</a>
                    </li>
                    <li class="<?php if($open == "user") echo "active"?>">
                        <a href="modules/user/index.php"><i class="fa fa-user"></i> Người Dùng</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">


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
                                                <input type="text" name="name_product" class="form-control"
                                                    placeholder="Tên Sản Phẩm" value="" required>
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
                                                <input type="text" name="price_product" class="form-control" value=""
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Giá Khuyến Mãi </label>
                                                <input type="text" name="price_sale" class="form-control" value=""
                                                    required>
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








                <!-- /.container-fluid -->
            </div>
        </div>
        <!-- End Content -->
        <div class="row">
            <div class="text-center">
                <footer style="background: none; color: #000; padding: 15px 0px;font-size: 1.3em	">
                    &copy; 2019 || Admin-Nhóm 1
                </footer>
            </div>
        </div>
    </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../public/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../public/js/raphael.min.js"></script>
    <script src="../public/js/morris.min.js"></script>
    <script src="../public/js/morris-data.js"></script>

</body>

</html>