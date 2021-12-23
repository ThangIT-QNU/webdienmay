<?php
if(!isset($_SESSION)) { session_start(); }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Web Bán Hàng</title>
    <!-- icon -->
    <link rel="shortcut icon" href="https://v1study.com/favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/styles.css">
    <link rel="stylesheet" href="public/css/footer.css">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">


</head>

<body>
    <header>
        <div class="banner-top">
            <div id="top">Back to Top</div>
            <img class="img-responsive" src="public/image/1/banner-top.jpg" alt="">
        </div>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="left-header-top">
                            Đồ Án Web Bán Hàng Công Nghệ - Nhóm 6
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right-header-top">
                            <ul>
                                <?php
                                    if(isset($_SESSION['user'])){
                                        
                                        ?>
                                <a href="profile.php" title="User"><span class="account">
                                        <li><i class="fa fa-user"></i> <?php echo $_SESSION['user'] ?></a> -<a
                                    title="Đăng Xuất" href="logout.php" style="font-size:0.9em">Đăng Xuất</a></li>
                                </span>

                                <?php
                                    }else{
                                        ?>
                                <span class="login-logout">
                                    <li><a title="Đăng nhập" href="login.php"><i class="fa fa-user"></i> Đăng nhập</a>
                                    </li>
                                    <li><a title="Đăng kí" href="register.php"><i class="fa fa-lock"></i> Đăng ký</a>
                                    </li>
                                </span>
                                <?php
                                    }
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php" title="logo"><img class="img-responsive" src="public/image/1/logo.png"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <form action="search.php" method="get">
                                <input required value="<?php if(isset($_GET['search'])) echo $_GET['search'] ?>"
                                    class="form-control" name="search" type="text"
                                    placeholder="Tìm kiếm SP... "><span><i class="fas fa-search"></i></span>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="cart">
                            <a href="cart.php" title="Giỏ Hàng">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Giỏ Hàng</span>
                            </a>
                            <div class="cart-product">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="category" id="cate">
                            <i class="fas fa-bars"></i> Danh Mục Sản Phẩm
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="menu">
                            <ul>
                                <?php 
                                    $cate = new Category();
                                    $row_cate = $cate->getAllCate();
                                    
                                    foreach($row_cate as $key=>$value) {
                                ?>
                                <li><a href="category.php?name_cate=<?php echo $value['cate_name'] ?>" class="bb">
                                        <i class="fas fa-dumbbell"></i> <?php echo $value['cate_name'] ?> </a>
                                    <ul class="sub-menu">
                                        <?php 
                                        $manu = new Mamufactures();
                                        $row_manu = $manu->getAllManu();
                                        foreach ($row_manu as $key => $value_manu) {
                                        ?>
                                        <li><a
                                                href="category.php?name_cate=<?php echo $value['cate_name'] ?>&name_manu=<?php echo $value_manu['manu_name'] ?>">
                                                <?php echo $value_manu['manu_name'] ?></a></li> <br>
                                        <?php }?>
                                    </ul>
                                </li>
                                <?php }?>
                                <li><a href="info.php" id="home"><i class="fas fa-home"></i> Giới Thiệu</a></li>
                                <!-- <li><a href="#"><i class="fab fa-hotjar"></i> bán chạy</a></li> -->
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="banner-category">
        <div class="container">
            <div class="row">
                <div class=" col-md-3" id="category">
                    <div class="category-left">
                        <?php 
                                foreach ($row_cate as $key => $value_cate) {
                            ?>
                        <div class="item-category">

                            <a href="category.php?name_cate=<?php echo $value_cate['cate_name'] ?>"><i
                                    class="fa fa-male"></i>
                                <?php echo $value_cate['cate_name'] ?></a>

                        </div><?php }?>
                        <div class="item-category">
                            <a href="info.php"><i class="fas fa-ad"></i> Giới Thiệu </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">