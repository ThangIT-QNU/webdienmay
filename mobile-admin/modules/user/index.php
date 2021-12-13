<base href="../../">
<?php
$open = "user";
$title = "User";
require '../../../config/database.php';
require '../../../modules/db.php';
require '../../../modules/user.php';

require '../../layout/header.php';

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $title ?> <a class="btn btn-success" href="./modules/user/add.php">Thêm</a>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> <?php echo $title ?>
            </li>
        </ol>
    </div>
</div>
<div class="col-md-12">
    <table class="table table-bordered text-center">
        <thead>
            <tr class="bg-primary">
                <th class="text-center">STT</th>
                <th class="text-center">Fullname</th>
                <th class="text-center">Username</th>
                <th class="text-center">phone</th>
                <th class="text-center">address</th>
                <th class="text-center">email</th>
                <th class="text-center">level</th>
                <th class="text-center">Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $u = new User();
                $user = $u->getAllUser();
                $i = 1;
                foreach ($user as $key => $value) {
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $value['fullname'] ?></td>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['phone'] ?></td>
                <td><?php echo $value['address'] ?></td>
                <td><?php echo $value['email'] ?></td>
                <td><?php if($value['level'] == 1) echo "user" ;else echo "admin"?></td>
                <td>
                    <a href="modules/user/update.php?id=<?php echo $value['id'] ?>"class="btn btn-warning"><i
                    class="fas fa-trash-alt"></i>Sửa</a>
                    <a href="modules/user/delete.php?id=<?php echo $value['id'] ?>"
                    onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i
                    class="fas fa-trash-alt"></i>Xóa</a>
                </td>
            </tr>
            <?php $i++; }
            ?>
        </tbody>
    </table>
</div>

<?php
require '../../layout/footer.php';