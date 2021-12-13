<base href="../../">
<?php
$open = "user";
$title = "Sửa User";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/user.php';
$email = '';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = new User();
    $u = $user->getUserById($id);
    foreach ($u as $key => $value) {
        $fullname = $value['fullname'];
        $username = $value['username'];
        $password = $value['password'];
        $phone = $value['phone'];
        $email = $value['email'];
        $address = $value['address'];
        $level = $value['level'];
    }
}
if(isset($_POST['sua'])){
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $level = $_POST['level'];
    $pass_hash= password_hash($password,PASSWORD_DEFAULT);
    
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }
    $sql ="UPDATE user SET 
    fullname='$fullname',phone='$phone',email='$email',address='$address',level='$level' WHERE id='$id'";
    $db = new Db();
    $db->SIUD($sql);
    header('location:index.php');
  
}
require '../../layout/header.php';
?>
<div class="row">
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
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="" method="post">
            <label>Fullname: </label>
            <input value="<?php if(isset($fullname)) echo $fullname ?>" required type="text" name="fullname" class="form-control">
            <label>Username: </label>
            <input disabled value="<?php if(isset($username)) echo $username ?>" required type="text" name="user" class="form-control">
            <div class="error">
                <?php if(isset($error)) echo $error ?>
            </div>
            <label>Password: </label>
            <input disabled value="<?php if(isset($password)) echo $password ?>" required type="password" name="pass" class="form-control">
            <label>phone: </label>
            <input value="<?php if(isset($phone)) echo $phone ?>" required type="text" name="phone" class="form-control">
            <label>email: </label>
            <input value="<?php if(isset($email)) echo $email ?>" type="email" name="email" class="form-control">
            <label>level: </label>
            <input value="<?php if(isset($level)) echo $level ?>" required type="number" min="1" max="2" name="level" class="form-control">
            <label>address: </label>
            <textarea required name="address" id="" class="form-control" rows="5"><?php if(isset($address)) echo $address ?></textarea><br>
            <center><input type="submit" name="sua" class="btn btn-success" value="Sửa Thành Viên"></center>
            
        </form>
    </div>
</div>
<?php
require '../../layout/footer.php';