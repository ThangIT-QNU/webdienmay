<?php
    require 'layout/autoload.php';
    require 'layout/header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="san-pham">
            <center><span>Change PassWord </span></center>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label>Tên tài khoản: </label>
            <input type="text" id="txtPassWord" name="txtUserName" value="<?php echo $_SESSION['user'] ?>"
                class="form-control rounded-0" placeholder="Nhập tên tài khoản" required><br>
            <label>Mật khẩu cũ: </label>
            <input type="password" id="txtPassWord" name="txtPassWord" value="<?php echo $_SESSION['pass'] ?>"
                class="form-control rounded-0" placeholder="Nhập mật khẩu mới" required><br>
            <label>Mật khẩu mới: </label>
            <input type="password" name="txtRePassWord" class="form-control rounded-0"
                placeholder="Nhập mật lại khẩu mới" required><br>
            <div class="d-flex">
                <a class="bg-secondary btn btn-outline-secondary" href="http://localhost/webdienmay/index.php">Thoát</a>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input class="btn btn-success" type="submit" name="btnChange" value="Đổi mật khẩu">
        </form>
    </div>
</div>
<?php
require 'layout/close.php';
require 'layout/footer.php';
?>

<?php
    include "/xampp/htdocs/webdienmay/config/Connect.php"; 
    if (isset($_POST['btnChange'])) {
    $txtUserName = $_POST['txtUserName'];
    $txtPass = $_POST['txtPassWord'];
    $txtPassNew = $_POST['txtRePassWord'];
    //
    $sql ="SELECT * FROM user WHERE username='$txtUserName' AND password='$txtPass' LIMIT 1";
    $query = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($query);
    if ($count > 0){
        $password_hash = password_hash($txtPassNew,PASSWORD_DEFAULT);
        // var_dump($password_hash);
        // var_dump($txtPass);
        // exit();
        $sqlUpdate = mysqli_query($conn,"UPDATE username SET password='".$password_hash."'  WHERE username='$txtUserName' ");
        echo    "<script>
                    alert('Chúc mừng bạn đã đổi mật khẩu thành công!');
                    location.href='http://localhost/webdienmay/index.php';
                </script>";
        }
    else{
        echo "<script>
                alert('Tài khoản or mật khẩu không đúng, vui lòng nhập lại.');
                location.href='http://localhost/webdienmay/changePass.php';
            </script>";
        }
    }
?>