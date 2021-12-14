<?php
    require 'layout/autoload.php';
    require 'layout/header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="san-pham">
            <center><span>Forgot Password</span></center>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label>Email: </label>
            <input placeholder="Nhập email đăng ký của bạn ..." required class="form-control" type="email"
                name="txtEmail"><br>
            <div class="d-flex">
                <a class="bg-secondary btn btn-outline-secondary" href="http://localhost/webdienmay/index.php">Thoát</a>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <button type="submit" name="btnGuiMa" class="btn btn-success btn-lg active float-right">Gửi
                    mã</button>
        </form>
    </div>
</div>
<?php
require 'layout/close.php';
require 'layout/footer.php';

if(isset($_POST['btnGuiMa'])) {
    $email = $_POST['txtEmail'];
}
else {
    exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'thangitqnu@gmail.com';                     // SMTP username
    $mail->Password   = 'thangitqnu@123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('thangitqnu@gmail.com', 'Admin');
    $mail->addAddress($email);     // Add a recipient

    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,6);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verification Code';
    $mail->Body    = 'Mã xác nhận tài khoản web điện máy của bạn là:<strong>'.$code.'</strong>.
    Để đảm bảo an toàn cho tài khoản Travel,Quý khách vui lòng không cung cấp mã này cho người khác.' ;

    include "/xampp/htdocs/webdienmay/config/Connect.php"; 
    if($conn->connect_error) {
        die('Không thể kết nối tới CSDL.');
    }
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $verifyQuery = mysqli_query($conn,$sql);
    

    if(mysqli_num_rows($verifyQuery)) {
        $sqlUpdate = "UPDATE user SET OTP = '$code' WHERE email = '$email'";
        $codeQuery = mysqli_query($conn ,$sqlUpdate);
        $mail->send()
        echo "<script>
                    alert('Mã xác nhận đã gửi đến E-mail của bạn vui lòng xác nhận.');
                    window.location.href='http://localhost/webdienmay/code.php?email=$email';
            </script>";
    }
    else {
        echo "<script>
                alert('E-mail chưa được đăng ký. Xin vui lòng kiểm tra lại!');
                window.location.href='http://localhost/webdienmay/forgotPassword.php';
            </script>";
    }
    $conn->close();

} catch (Exception $e) {
    echo "Tin nhắn không gửi được. Mailer Error: {$mail->ErrorInfo}";
}    
?>