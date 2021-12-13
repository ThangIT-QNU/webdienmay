<?php 
session_start();
require '../config/database.php';
require '../modules/db.php';
require '../modules/user.php';
if(isset($_SESSION['login'])){
    header('location:index.php');
}
if(isset($_POST['user']) && isset($_POST['pass'])){
    $username = $_POST['user'];
    $pass = $_POST['pass'];
    $user_db = new User();
    $user = $user_db->getUserByUsername($username);
    if(count($user) > 0){
        foreach ($user as $key => $value) {
            $pass_hash =  $value['password'];
        }
        if(password_verify($pass,$pass_hash)){
            if(isset($_POST['remember'])){
                setcookie('username',$username,time() + 999999);
                setcookie('password',$pass,time() + 999999);
            }
            $_SESSION['login'] = $username;
            header('location:index.php');
        }else{
            $error_pass =  "Sai Mật Khẩu";
        }
    }else{
        $error_user =  "Sai Tên Đăng Nhập";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../public/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>LOGIN ADMIN</title>
</head>
<body>
    <style>
    .error{
        color: red;
        font-size: 0.9em;
    }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <center><h1>LOGIN</h1></center>
                <form action="" method="post">
                    <label>Username</label>
                    <input value="<?php if(isset($_POST['user'])) echo $_POST['user'];else if(isset($_COOKIE['username'])) echo $_COOKIE['username']?>" type="text" name="user" class="form-control">
                    <div class="error">
                        <?php if(isset($error_user)) echo $error_user ?>
                    </div>
                    <label>Password</label>
                    <input value="<?php if(isset($_POST['pass'])) echo $_POST['pass'];else if(isset($_COOKIE['password'])) echo $_COOKIE['password']?>" type="password" name="pass" class="form-control">
                    <div class="error">
                        <?php if(isset($error_pass)) echo $error_pass ?>
                    </div>
                    <input type="checkbox" <?php if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) echo "checked" ?> name="remember" id=""> Remember <br>
                    <input type="submit" class="btn btn-success" value="Đăng Nhập">
                    
                </form>
            </div>
        </div>
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>