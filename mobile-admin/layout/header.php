<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:login.php');
}
?>
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
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