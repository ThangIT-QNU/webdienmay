<?php
require 'layout/autoload.php';
if(isset($_GET['phone'])){
    $fullname = $_GET['fullname'];
    $phone = $_GET['phone'];
    $address = $_GET['address'];
    if(isset($_GET['email'])){
        $email = $_GET['email'];
    }else{
        $email = '';
    }
    if(isset($_GET['ghichu'])){
        $ghichu = $_GET['ghichu'];
    }else{
        $ghichu = '';
    }
    $db = new Db();
    $customer = new Customer();
    $sql = "SELECT * FROM customer WHERE phone=''$phone";
    $num = count($customer->getCustomerByPhone($phone));
    if($num > 0){
        $sql = "UPDATE customer SET fullname='$fullname',phone='$phone',address='$address',email='$email'";
        $db->SIUD($sql);
    }else{
        $sql = "INSERT INTO customer(fullname,phone,address,email) VALUES('$fullname','$phone','$address','$email')";
        $db->SIUD($sql);
    }
    
}else{
    header('location:cart.php');
}

require 'layout/header.php';
if(isset($_SESSION['cart'])){
$checkout = $_SESSION['cart'];
?>
<div class="san-pham">
    <center><span>Thanh Toán</span></center>
</div>
Đơn Hàng Của Bạn Đã Được Xác Nhận
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered text-center">
            <thead>
                <tr class="bg-primary">
                    <th class="text-center">Hình Ảnh</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Số Lượng</th>
                    <th class="text-center">Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $tong = 0;
                    $i = 1;
                    $desc_bill = NULL;
                    foreach ($checkout as $key => $value) {
                        $products = new Product();
                        $product = $products->getProductById($key);
                       
                        foreach ($product as $key_cart => $value_cart) {
                        ?>

                <tr>
                    <td><img width="50" height="50" src="./public/image/<?php echo $value_cart['image']; ?>" alt="">
                    </td>
                    <td><?php echo $value_cart['name']; ?></td>
                    <td><?php echo number_format($value_cart['price']) ; ?> đ</td>
                    <td><?php echo $_SESSION['cart'][$key]; ?></td>
                    <td><?php echo number_format($t = $value_cart['price'] * $_SESSION['cart'][$key])  ?> đ</td>
                    
                </tr>
                <?php
                    if($desc_bill == NULL){
                        $desc_bill = $value_cart['image'].",".$value_cart['name'].",".$value_cart['price'].",".$_SESSION['cart'][$key].",".
                        ($t = $value_cart['price'] * $_SESSION['cart'][$key]);
                    }else{
                        $desc_bill = $desc_bill."????".$value_cart['image'].",".$value_cart['name'].",".$value_cart['price'].",".$_SESSION['cart'][$key].",".
                        ($t = $value_cart['price'] * $_SESSION['cart'][$key]);
                    }    
                    $i++;
                    $tong += $t ;}
                    }
                    $desc_bill = $desc_bill."===".$tong;
                    ?>
                <?php
                    ?>
                <div class="cart-top">
                    <h4>Tổng Tiền Đơn Hàng: <?php if(isset($tong)) echo number_format($tong)  ?> VNĐ</h4>
                </div>
            </tbody>
        </table>
    </div>
</div>

<?php
}
if(isset($desc_bill)){
$customer = new Customer();
    $cus = $customer->getCustomerByPhone($phone);
    foreach ($cus as $key => $value) {
        $id_customer =  $value['id'];
    }
    $sql = "INSERT INTO bill(id_customer,bill_detail,ghichu) VALUES('$id_customer','$desc_bill','$ghichu')";
    $bill = $db->SIUD($sql);
    unset($_SESSION['cart']);
}else{
    echo '<script>alert("Bạn Đã Đặt Hàng Thành Công!!!")</script>';
}
require 'layout/close.php';
require 'layout/footer.php';