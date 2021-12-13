<?php
$open = "home";
require '../config/database.php';
require '../modules/db.php';
require '../modules/category.php';
require '../modules/manufactures.php';
require '../modules/product.php';
require '../modules/bill.php';
require '../modules/customer.php';
require '../modules/user.php';
// session_start();
// $title = "Trang Chủ";
// if(!isset($_SESSION['login'])){
//     header('location:login.php');
// }
require './layout/header.php';

?>
<div class="wraper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Trang Chủ
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> trang chủ
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-database fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php 
                            
                            $products = new Product();
                            $num_product = count($products->getAllProduct());
                            ?>
                            <div class="huge"><?php echo $num_product?></div>
                            <div>Sản Phẩm</div>
                        </div>
                    </div>
                </div>
                <a href="./modules/product/index.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem Chi Tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php 
                            $categorys = new Category();
                            $num_category = count($categorys->getAllCate());
                            ?>
                            <div class="huge"><?php echo $num_category ?></div>
                            <div>Danh Mục</div>
                        </div>
                    </div>
                </div>
                <a href="./modules/category/index.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem Chi Tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php 
                            $order = new Bill();
                            $num_order = count($order->getAllBill());
                            ?>
                            <div class="huge"><?php echo $num_order ?></div>
                            <div>Đơn Hàng</div>
                        </div>
                    </div>
                </div>
                <a href="./modules/order/index.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem Chi Tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php 
                            $user = new User();
                            $num_user = count($user->getAllUser());
                            ?>
                            <div class="huge"><?php echo $num_user ?></div>
                            <div>Thành Viên</div>
                        </div>
                    </div>
                </div>
                <a href="./modules/user/index.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem Chi Tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php 
                            $customer = new Customer();
                            $num_customer = count($customer->getAllCustomer());
                            ?>
                            <div class="huge"><?php echo $num_customer ?></div>
                            <div>Khách Hàng</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">Xem Chi Tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-fw fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <?php 
                            $manufactures = new Mamufactures();
                            $num_manufactures = count($manufactures->getAllManu());
                            ?>
                            <div class="huge"><?php echo $num_manufactures ?></div>
                            <div>Hãng Sản Xuất</div>
                        </div>
                    </div>
                </div>
                <a href="./modules/manufactures/index.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem Chi Tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
require './layout/footer.php';