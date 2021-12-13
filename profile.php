<?php
require './layout/autoload.php';
require './layout/header.php';
$username = $_SESSION['user'];
$user = new User();
$user = $user->getUserByUsername($username);
foreach ($user as $key_user => $value_user) {
    $id = $value_user['id'];
    $fullname = $value_user['fullname'];
    $phone = $value_user['phone'];
    $email = $value_user['email'];
    $address = $value_user['address'];
}
if(isset($_POST['update'])){
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "UPDATE user SET fullname='$fullname',phone='$phone',email='$email',address='$address' WHERE id='$id'";
    $db = new Db();
    $db->SIUD($sql);
    echo '<script>alert("Cập Nhật Thông Tin Thành Công!!!")</script>';
}
?>

<div class="san-pham">
    <center><span>Thông Tin Thành Viên</span></center>
</div>

<form action="" method="post">
    <div class="row">
        <div class="col-md-6">
            <label>Username: </label>
            <input class="form-control" type="text" disabled value="<?php echo $username ?>">
        </div>
        <div class="col-md-6">
            <label>Họ Tên: <span class="error"> *</span></label>
            <input name="fullname" required class="form-control" type="text"
                value="<?php if(isset($fullname)) echo $fullname ?>">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-6">
            <label>Email: </label>
            <input name="email" class="form-control" type="text" value="<?php if(isset($email)) echo $email ?>">
        </div>
        <div class="col-md-6">
            <label>Số Điện Thoại: <span class="error"> *</span> </label>
            <input name="phone" required placeholder="Nhập Số Điện Thoại Nhận Hàng...." class="form-control" type="text"
                value="<?php if(isset($phone)) echo $phone ?>">
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12">
            <label>Địa Chỉ: <span class="error"> *</span></label>
            <textarea name="address" placeholder="Nhập Địa Chỉ chính Xác Để Giao Hàng...." class="form-control" name=""
                rows="5"><?php if(isset($address)) echo $address ?></textarea>
        </div>
    </div><br>
    <center><input class="btn btn-success" name="update" value="Cập Nhật thông Tin" type="submit"></center>
</form>

<?php
require './layout/close.php';
require './layout/footer.php';