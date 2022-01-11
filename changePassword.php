<?php
    require 'layout/autoload.php';
    require 'layout/header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="san-pham">
            <center><span>Chane PassWord </span></center>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="password" id="txtPassWord" name="txtPassWord" class="form-control rounded-0"
                placeholder="Nhập mật khẩu mới" required><br>
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
    if(isset($_SESSION['txtVerify']) && isset($_SESSION['email']))
    {
        if(isset($_POST['btnChange']))
        {
            $code1 = $_SESSION['txtVerify'];
            $email = $_SESSION['email'];
            $passWord = $_POST['txtPassWord'];
            $rePassWord = $_POST['txtRePassWord'];
            $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,6);
            if($passWord == $rePassWord)
            {   
                
                $password_hash = password_hash($rePassWord,PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password = '$password_hash' where OTP = '$code1' AND email = '$email'";
                $query = mysqli_query($conn,$sql) or die('Connect Data Fail!');
                if($query)
                {
                    $sqlUpdate = "UPDATE user SET OTP = '$code' WHERE email = '$email'";
                    mysqli_query($conn, $sqlUpdate);
                    echo '<script>
                            alert("Chúc mừng bạn đã đổi mật khẩu thành công! Vui lòng đăng nhập.");
                            window.location.href="http://localhost/webdienmay/login.php"
                        </script>';
                }
                else{
                    echo '<script>
                            alert("Đổi mật khẩu thất bại! Xin vui lòng kiểm tra lại");
                            window.location.href="http://localhost/webdienmay/changePassword.php"
                        </script>';
                }
            }
            else{
                echo '<script>
                        alert("Mật khật khẩu không trùng khớp. Vui lòng nhập lại!!");
                        window.location.href="http://localhost/webdienmay/changePassword.php"
                    </script>';
            }
        }
    }
?>