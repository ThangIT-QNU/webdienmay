<?php 
require 'layout/autoload.php';
if(isset($_POST['register'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $repassword = $_POST['repass'];
    $user = new User();
    $getUsername = $user->getUserByUsername($username);
    $num = count($getUsername);
    if($num == 1){
        $error_username = "Tên Đăng Nhập Đã Tồn Tại Mời Nhập Lại!!!<br>";
    }else{
        if($password == $repassword){
            $db = new Db();
            $password_hash = password_hash($repassword,PASSWORD_DEFAULT);
            $query = "INSERT INTO user(username,password) VALUES('$username','$password_hash')";
            $db->SIUD($query);
            setcookie('register',$username,time() + 5);
            header('location:login.php');
        }else{
            $error_pass = "Mật Khẩu Không Trùng Khớp!!!<br>";
        }
    }
}
require 'layout/header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="san-pham">
    <center><span>REGISTER</span></center>  
</div>

        <form action="" method="post">
            <label>Username: </label>
            <input placeholder="Nhập username" required
                value="<?php if(isset($success)){} elseif(isset($username)) echo $username ?>" class="form-control"
                type="text" name="user">
            <div class="error">
                <?php
                    if(isset($error_username)) echo $error_username;
                ?>
            </div>

            <label>Password: </label>
            <input pattern="\w{6,}" placeholder="Pass trên 6 kí tự và không có khoản trắng"
                value="<?php if(isset($success)){} elseif(isset($password)) echo $password; ?>" required
                class="form-control" type="password" name="pass" id="">
            <label>Repassword: </label>
            <input pattern="\w{6,}" required placeholder="Repass trên 6 kí tự và không có khoản trắng"
                class="form-control" type="password" name="repass" id="">
            <div class="error">
                <?php
                    if(isset($error_pass)) echo $error_pass;
                ?>
            </div>
            <br>
            <center><input class="btn btn-success" name="register" type="submit" value="Đăng Kí"></center>
        </form>
    </div>
</div>
<?php
require 'layout/close.php';
require 'layout/footer.php';