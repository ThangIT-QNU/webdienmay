<base href="../../">
<?php
    $open = "order";
    $star = 0;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $title = "Đơn Hàng";
    require '../../../config/database.php';
    require '../../../modules/db.php';
    require '../../../modules/category.php';
    require '../../../modules/customer.php';
    require '../../../modules/bill.php';

    require '../../layout/header.php';

    ?>
<div class="value">
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
</div>

<div class="col-md-12">
    <table class="table table-bordered text-center">
        <thead>
            <tr class="bg-primary">
                <th class="text-center">Khách Hàng</th>
                <th class="text-center">Địa Chỉ Giao Hàng</th>
                <th class="text-center">Tổng Tiền</th>
                <th class="text-center">Trạng Thái</th>
                <th class="text-center">Tùy Chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    $bill = new Db();
                    $sql = "SELECT * FROM bill ORDER BY id_bill DESC";
                    $bill = $bill->pagination($sql,$page,10);
                    foreach ($bill as $key => $value) {
                        $chitiet = $value['bill_detail'];
                        $Tong = explode('===',$chitiet);
                        $str =  $Tong[0];
                        $product = explode('????',$str);
                        $id_customer = $value['id_customer'];
                        $customer = new Customer();
                        $cus = $customer->getCustomerById($id_customer);
                        foreach ($cus as $key_cus => $value_cus) {
                            $fullname_cus = $value_cus['fullname'];
                            $address = $value_cus['address'];
                        }
                        
                    ?>
            <tr>
                <td><?php echo $fullname_cus ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo number_format($Tong[1]); ?></td>
                <td><?php 
                    if($value['status'] == 0){
                        ?>
                    <a href="modules/order/update.php?id=<?php echo $value['id_bill'] ?>" class="btn btn-warning"><span
                            class="fas fa-edit"></span> Xác Nhận Đơn</a>
                    <?php 
                    }else echo "Đã Xác Nhận"?>
                </td>
                <td>
                    <a href="modules/order/detail.php?id=<?php echo $value['id_bill'] ?>" class="btn btn-info btn-xs"><i
                            class="fas fa-trash-alt"></i> Xem Chi Tiết</a>
                    <a href="modules/order/delete.php?id=<?php echo $value['id_bill'] ?>"
                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger btn-xs"><i
                            class="fas fa-trash-alt"></i> Xóa</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <center>
        <?php 
            $bill = new Db();
            $sql = "SELECT * FROM bill ORDER BY id_bill DESC";
            $bill = $bill->numPagination('order',$sql,$page,10);
            ?></center>

</div>
<form action="http://localhost/webdienmay/mobile-admin/modules/order/export.php" method="post">
    <button name="btnexport" class="btn btn-success" style='padding:1rem;float:right;margin-right:5rem;'
        type="submit">XUẤT FILE EXCEL</button>
</form>
<?php require '../../layout/footer.php'; ?>