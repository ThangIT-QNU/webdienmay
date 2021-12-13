
<base href="../../">
<?php
$open = "order";

$title = "Chi Tiết Đơn Hàng";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/category.php';
require '../../../modules/customer.php';
require '../../../modules/bill.php';
require '../../layout/header.php';

$id_bill = $_GET['id'];
$bill = new Bill();
$b = $bill->getBillById($id_bill);
foreach ($b as $key_bill => $value_bill) {
    $id_customer = $value_bill['id_customer'];
    $status = $value_bill['status'];
    $bill_detail = $value_bill['bill_detail'];
    $ghichu = $value_bill['ghichu'];
    $time = $value_bill['created_at'];
}
?>
<div class="col-lg-12">
    <h1 class="page-header">
        <?php echo $title ?>
    </h1>
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> <?php echo $title ?>
        </li>
    </ol>
</div>
<div class="row">
    <?php
    $customer = new Customer();
    $cus = $customer->getCustomerById($id_customer);
    foreach ($cus as $key_cus => $value_cus) {
        $fullname = $value_cus['fullname'];
        $phone = $value_cus['phone'];
        $email = $value_cus['email'];
        $address = $value_cus['address'];
    }
    ?>
    <div class="col-md-4">
        Tên Khách Hàng:  <?php echo $fullname ?>
    </div>
    <div class="col-md-4">
        Số Điện Thoại: <?php echo $phone ?>
    </div>
    <div class="col-md-4">
        Email: <?php echo $email ?>
    </div>
    <div class="col-md-12">
        Địa Chỉ: <?php echo $address ?>
    </div>
    <div class="col-md-12">
        Ngày Đặt: <?php echo $time ?>
    </div>
    <div class="col-md-12">
        Ghi Chú: <?php echo $ghichu ?>
    </div>
</div>
<?php 
 $detail_bill = explode('===',$bill_detail);
 $total = $detail_bill[1];
 $product = $detail_bill[0];
 $product = explode('????',$product);
?>
    <div class="col-md-12">
        <h3>Chi Tiết Đơn Hàng - <?php echo number_format($total) ?> VNĐ</h3>
    </div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-primary">
                    <th class="text-center">Hình</th>
                    <th class="text-center">Tên</th>                     
                    <th class="text-center">Giá</th>                     
                    <th class="text-center">Số Lượng</th>                     
                    <th class="text-center">Thành Tiền</th>                     
                </tr>
            </thead>
            <tbody>
                
            
    <?php
   
    // var_dump($product);
    foreach ($product as $key ) {
       $h = explode(',',$key);
       $hinh = $h[0];
       $name = $h[1];
       $price = number_format($h[2]);
       $qty = $h[3];
       $thanhtien = number_format($h[4]);
       ?>
       <tr>
           <td><img width="40px" height="40px" src="../public/image/<?php echo $hinh ?>" alt=""></td>
           <td><?php echo $name ?></td>
           <td><?php echo $price ?></td>
           <td><?php echo $qty ?></td>
           <td><?php echo $thanhtien ?></td>
       </tr>
       <?php
   }
    ?>
            </tbody>
        </table>

</div>
<?php
require '../../layout/footer.php';