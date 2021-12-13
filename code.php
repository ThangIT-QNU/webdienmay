<?php
    require 'layout/autoload.php';
    require 'layout/header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="san-pham">
            <center><span>Confirm</span></center>
        </div>
        <form action="" method="POST">
            <label>Mã xác nhận: </label>
            <input placeholder="Nhập mã xác nhận ..." required class="form-control" type="password"
                name="txtVerify"><br>
            <div class="d-flex">
                <a class="bg-secondary btn btn-outline-secondary" href="http://localhost/webdienmay/index.php">Thoát</a>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

                <input type="submit" name="btnVerify" class="btn btn-primary" value="Xác nhận"> </input>
        </form>

    </div>
</div>


<?php
require 'layout/close.php';
require 'layout/footer.php';

include "/xampp/htdocs/webdienmay/config/Connect.php"; 
if(isset($_GET['email']))
{
    $email = $_GET['email'];
    $_SESSION['email'] = $email;
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $verifyQuery = mysqli_query($conn,$sql) or die("Lỗi");
    $row = mysqli_fetch_array($verifyQuery);
    if(isset($_POST['btnVerify']))
    {
        $otp = $_POST['txtVerify'];
        $_SESSION['txtVerify'] = $otp;
        if($otp == $row['OTP'])
        {              
            echo    "<script> 
                    alert('Xác thực đúng. Xin vui lòng đổi mật khẩu!');
                            location.href = 'http://localhost/webdienmay/changePassword.php';
                </script>";
        }
        else
        {
            echo "<script>
                    alert('Mã xác nhận của bạn không đúng. Xin vui lòng nhập lại!.');
                    window.location.href='http://localhost/webdienmay/code.php?email=$email';
                </script>";
        }
    }
}
?>