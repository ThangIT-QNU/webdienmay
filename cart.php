<?php
require './layout/autoload.php';
require './layout/header.php';
$product = new Product();
if(isset($_GET['id_product'])){
    $id_product = $_GET['id_product'];
    if(!isset($_POST['qty'])){
        if(isset($_SESSION['cart'][$id_product])){
            $_SESSION['cart'][$id_product] += 1;
        }else{
            $_SESSION['cart'][$id_product] = 1;
        }
    }else{
        $num = $_POST['qty'];
        if(isset($_SESSION['cart'][$id_product])){
            $_SESSION['cart'][$id_product] += $num;
        }else{
            $_SESSION['cart'][$id_product] = $num;
        }
    }
}

?>
<div class="san-pham">
    <center><span>GIỎ HÀNG</span></center>
</div>
<?php 
if(isset($_SESSION['cart'])){
?>
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
                    <th class="text-center">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tong = 0;
                $_SESSION['num_product_cart'] = 0;
                foreach ($_SESSION['cart'] as $key => $value) {
        
                    $product_cart = $product->getProductById($key);
                    // var_dump($product_cart);
                    foreach ($product_cart as $key_cart => $value_cart) {
                    ?>

                <tr>
                    <td> <a href="detail.php?id_product=<?php echo $key ?>"><img width="50" height="50"
                                src="./public/image/<?php echo $value_cart['image']; ?>" alt=""></a> </td>
                    <td><?php echo $value_cart['name']; ?></td>
                    <td><?php echo number_format($value_cart['price']) ; ?> đ</td>
                    <td><?php echo $_SESSION['cart'][$key]; ?></td>
                    <td><?php echo number_format($t = $value_cart['price'] * $_SESSION['cart'][$key])  ?> đ</td>
                    <td><a style="color:red" href="delete_cart.php?id_product=<?php echo $key?>"><i
                                class="fas fa-trash-alt"></i></a></td>

                </tr>
                <?php
                $_SESSION['num_product_cart'] += $_SESSION['cart'][$key];
                $tong += $t ;
                    }
                    //end Foreach
                }//end-foreach
                ?>
                <?php
                ?>
                <div class="cart-top">
                    <h4>Tổng Tiền: <?php if(isset($tong)) echo number_format($tong)  ?> VNĐ <a class="btn btn-danger"
                            style="float:right" href="delete_cart.php?delete=1">Xóa Giỏ Hàng</a> </h4><br>
                </div>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <form action="checkout.php" method="get">
        <?php
        if(isset($_SESSION['user'])){
            $username = $_SESSION['user'];
            $user = new User();
            $userr = $user->getUserByUsername($username);
            foreach ($userr as $key_user => $value_user) {
                $fullname_user = $value_user['fullname'];
                $phone_user = $value_user['phone'];
                $address_user = $value_user['address'];
                $email_user = $value_user['email'];
            }
        }
        ?>
        <div class="col-md-12">
            <div class="error">
                Lưu ý: những trường có dấu (*) đều bắt buộc nhập!!! <br><br>
            </div>
        </div>
        <div class="col-md-4">
            <label>Họ Tên<span class="error"> *</span></label>
            <input value="<?php if(isset($fullname_user)) echo $fullname_user ?>" required type="text"
                class="form-control" name="fullname">
        </div>
        <div class="col-md-4">
            <label>Số Điện Thoại<span class="error"> *</span></label>
            <input value="<?php if(isset($phone_user)) echo $phone_user ?>" required class="form-control" type="text"
                name="phone">
        </div>
        <div class="col-md-4">
            <label>Email (tùy chọn)</label>
            <input value="<?php if(isset($email_user)) echo $email_user ?>" class="form-control" name="email"
                type="email">
        </div>
        <div class="col-md-6">
            <label>Địa Chỉ <span class="error"> *</span></label>
            <textarea required name="address" rows="5" class="form-control"
                placeholder="Vui lòng nhập chính xác địa chỉ để giao hàng ..."><?php if(isset($address_user)) echo $address_user?></textarea>
        </div>
        <div class="col-md-6">
            <label>Ghi Chú</label>
            <textarea name="ghichu" rows="5" class="form-control" placeholder="nhập ghi chú ..."></textarea> <br>
        </div>
        <div class="col-md-9">
            <a class="btn btn-info" href="index.php">Tiếp Tục Mua Hàng</a> <br><br>
        </div>
        <div class="col-md-3">
            <input type="submit" class="btn btn-success" value="Xác Nhận Thanh Toán">
        </div>
    </form>
</div>
<?php
}//end if
if(!isset($_SESSION['cart'])){
    ?>
<div class="error">
    <center>
        <h4>Giỏ Hàng Trống</h4>
    </center>
</div>
<?php
}
?>
<?php
require './layout/close.php';
require './layout/footer.php';