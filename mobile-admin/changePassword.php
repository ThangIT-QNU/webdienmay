<?php
    $open = 'ChangePass';
    $title = ' Đổi mật khẩu';
    include('layout/header.php');
    include('C:xampp/htdocs/webdienmay/config/Connect.php');
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
<div class="value">

</div>
<div class="row">
    <div class=" col-md-4">
        <form action="" method="post">
            <label>Tài khoản</label>
            <input required class="form-control" type="text" name="userName"><br>
            <label>Mật khẩu cũ</label>
            <input required class="form-control" type="password" name="passWord"><br>
            <label>Mật khẩu mới</label>
            <input required class="form-control" type="password" name="rePassWord"><br>
            <input class="btn btn-info" type="submit" name="btnChange" value="Đổi mật khẩu">
        </form>
    </div>
</div>
<?php
    include 'C:\xampp\htdocs\webdienmay\config\Connect.php';
    if (isset($_POST['btnChange'])) {
    $txtUserName = $_POST['userName'];
    $txtPass = $_POST['passWord'];
    $txtPassNew = $_POST['rePassWord'];
    //
    $sql ="SELECT * FROM user WHERE username ='$txtUserName' AND password='$txtPass' LIMIT 1";
    $query = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($query);
    if ($count > 0){
        $password_hash = password_hash($txtPassNew,PASSWORD_DEFAULT);
        // var_dump($password_hash);
        // var_dump($txtPass);
        // exit();
        $sqlUpdate = mysqli_query($conn,"UPDATE user SET password = '".$password_hash."' where username ='$txtUserName' ");
        echo    "<script>
                    alert('Chúc mừng bạn đã đổi mật khẩu thành công!');
                    location.href='http://localhost/webdienmay/index.php';
                </script>";
        }
    else{
        echo "<script>
                alert('Tài khoản or mật khẩu không đúng, vui lòng nhập lại.');
                location.href='http://localhost/webdienmay/mobile-admin/changePassword.php';
            </script>";
        }
    }
?>


<?php 
    include('layout/footer.php');
?>